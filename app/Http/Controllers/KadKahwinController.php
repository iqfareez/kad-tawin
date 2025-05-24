<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MajlisDetail;
use Carbon\Carbon;

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
     * Build Open Graph metadata array for a given MajlisDetail.
     *
     * @param \App\Models\MajlisDetail $majlisDetail
     * @return array
     */
    protected function buildOgMetadata($majlisDetail)
    {
        $title = $majlisDetail->title ?: 'Undangan Perkahwinan';
        if ($majlisDetail->pengantin_lelaki_first) {
            $ogTitle = "{$title} {$majlisDetail->pengantin_lelaki_display_name} & {$majlisDetail->pengantin_perempuan_display_name}";
            $ogImage = "https://tawin-og.vercel.app/api/kad-nama?nama={$majlisDetail->pengantin_lelaki_display_name}&pasangan={$majlisDetail->pengantin_perempuan_display_name}&bg=4&font=1";
        } else {
            $ogTitle = "{$title} {$majlisDetail->pengantin_perempuan_display_name} & {$majlisDetail->pengantin_lelaki_display_name}";
            $ogImage = "https://tawin-og.vercel.app/api/kad-nama?nama={$majlisDetail->pengantin_perempuan_display_name}&pasangan={$majlisDetail->pengantin_lelaki_display_name}&bg=3&font=1";
        }

        $ogDescription = $majlisDetail->majlis_date
            ? $majlisDetail->majlis_date->locale('ms')->isoFormat('D MMMM Y')
            : '';
        if ($majlisDetail->venue_address_line_2) {
            $addressParts = explode(',', $majlisDetail->venue_address_line_2);
            $lastAddress = trim(collect($addressParts)->last());

            // Remove trailing dots from both date and address
            $ogDescription = rtrim($ogDescription, '. ');
            // Remove trailing dots and spaces from the last address
            $lastAddress = rtrim($lastAddress, ". \t\n\r\0\x0B");

            $ogDescription .= '. ' . $lastAddress . '.';
            // Add invitation text
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
