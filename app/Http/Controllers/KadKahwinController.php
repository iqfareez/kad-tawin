<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MajlisDetail;
use Carbon\Carbon;
use App\Models\Rsvp;

class KadKahwinController extends Controller
{
    public function show(string $slug)
    {
        // Set Carbon locale to Malaysian
        Carbon::setLocale('ms');

        // Get majlis details
        $majlisDetail = MajlisDetail::where('slug', $slug)->first();

        if (!$majlisDetail) {
            abort(404, 'Wedding invitation not found');
        }

        // Get the latest 5 ucapan for display on the main page
        $ucapanList = \App\Models\Ucapan::where('from_form', $slug)
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($ucapan) {
                return [
                    'nama' => $ucapan->nama,
                    'ucapan' => $ucapan->ucapan,
                    'created_at' => $ucapan->created_at->locale('ms')->diffForHumans(),
                ];
            });

        $og = $this->buildOgMetadata($majlisDetail);

        return view('kad-kahwin.kad-kahwin', compact('ucapanList', 'majlisDetail', 'og'));
    }

    /**
     * Display all ucapan submissions
     */
    public function semua_ucapan(string $slug)
    {
        // Set Carbon locale to Malaysian
        Carbon::setLocale('ms');

        $ucapanList = \App\Models\Ucapan::where('from_form', $slug)
            ->latest()
            ->get()
            ->map(function ($ucapan) {
                return [
                    'nama' => $ucapan->nama,
                    'ucapan' => $ucapan->ucapan,
                    'created_at' => $ucapan->created_at->locale('ms')->diffForHumans(),
                ];
            });

        return view('kad-kahwin.semua-ucapan', compact('ucapanList', 'slug'));
    }

    /**
     * Hantar ucapan POST request
     */
    public function hantar_ucapan(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'ucapan' => 'required|string|max:1000',
            ]);

            $ucapan = new \App\Models\Ucapan();
            $ucapan->nama = $request->input('nama');
            $ucapan->ucapan = $request->input('ucapan');
            $ucapan->from_form = $request->input('from_form');
            $ucapan->save();

            // Check if request expects JSON (AJAX)
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Ucapan anda telah dihantar! Terima kasih 😄.',
                    'data' => [
                        'nama' => $ucapan->nama,
                        'ucapan' => $ucapan->ucapan,
                    ]
                ]);
            }

            return redirect()->back()->with('success', 'Ucapan anda telah dihantar!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sila isi semua medan yang diperlukan.',
                    'errors' => $e->errors()
                ], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Maaf, terdapat masalah teknikal. Sila cuba lagi.'
                ], 500);
            }

            return redirect()->back()->with('error', 'Terdapat masalah. Sila cuba lagi.')->withInput();
        }
    }

    /**
     * RSVP POST request
     */
    public function hantar_rsvp(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kehadiran' => 'required|in:hadir,tidak_hadir',
            'jumlah' => 'required_if:kehadiran,hadir|nullable|integer|min:1|max:10',
            'slug' => 'required|string',
        ]);

        // Use a hash to identify RSVP (by name+slug)
        $identifier = strtolower(trim($request->input('nama'))) . '|' . $request->input('slug');

        // Check if RSVP already exists
        $existing = Rsvp::where('identifier', $identifier)->first();
        if ($existing) {
            return response()->json([
                'success' => false,
                'already' => true,
                'message' => 'Anda telah RSVP sebelum ini. Maklumat dikemaskini.',
            ]);
        }

        $rsvp = new Rsvp();
        $rsvp->nama = $request->input('nama');
        $rsvp->kehadiran = $request->input('kehadiran') === 'hadir';
        $rsvp->jumlah = $request->input('kehadiran') === 'hadir'
            ? ($request->input('jumlah') ?? 0)
            : 0;
        $rsvp->slug = $request->input('slug');
        $rsvp->identifier = $identifier;
        $rsvp->save();

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih kerana RSVP! Sila tambah ke kalendar anda.',
        ]);
    }

    /**
     * Build Open Graph metadata array for a given MajlisDetail.
     *
     * @param \App\Models\MajlisDetail $majlisDetail
     * @return array
     */
    protected function buildOgMetadata($majlisDetail)
    {
        $title = $majlisDetail->title ?: 'Undangan Perkahwinan';

        // For WhatsApp be able to display Link Preview, make sure the og:image doesn't exceed 600kb.
        // See https://developers.facebook.com/docs/whatsapp/link-previews/ for more details.
        if ($majlisDetail->pengantin_lelaki_first) {
            $ogTitle = "{$title} {$majlisDetail->pengantin_lelaki_display_name} & {$majlisDetail->pengantin_perempuan_display_name}";
            $ogImage = "https://tawin-og.vercel.app/api/kad-nama?nama={$majlisDetail->pengantin_lelaki_display_name}&pasangan={$majlisDetail->pengantin_perempuan_display_name}&bg=4&font=1";
        } else {
            $ogTitle = "{$title} {$majlisDetail->pengantin_perempuan_display_name} & {$majlisDetail->pengantin_lelaki_display_name}";
            $ogImage = "https://tawin-og.vercel.app/api/kad-nama?nama={$majlisDetail->pengantin_perempuan_display_name}&pasangan={$majlisDetail->pengantin_lelaki_display_name}&bg=2&font=1";
        }

        $ogDescription = $majlisDetail->majlis_date
            ? $majlisDetail->majlis_date->locale('ms')->isoFormat('D MMMM Y')
            : '';
        if ($majlisDetail->venue_address_line_2) {
            $addressParts = explode(',', $majlisDetail->venue_address_line_2);
            $lastAddress = trim(collect($addressParts)->last());
            $ogDescription = rtrim($ogDescription, '. ');
            // Remove trailing dots and spaces from the last address
            $lastAddress = rtrim($lastAddress, ". \t\n\r\0\x0B");
            $ogDescription .= '. ' . $lastAddress . '.';
            $ogDescription .= ' Tetamu dijemput hadir';
        }

        $ogSiteName = "{$majlisDetail->pengantin_lelaki_display_name} & {$majlisDetail->pengantin_perempuan_display_name} - " . parse_url(url('/'), PHP_URL_HOST);

        return [
            'title' => $ogTitle,
            'description' => $ogDescription,
            'image' => $ogImage,
            'type' => 'website',
            'site_name' => $ogSiteName,
        ];
    }
}
