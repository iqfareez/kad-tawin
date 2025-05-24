<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KadKahwinController extends Controller
{
    public function sanding()
    {
        // Get the latest 5 ucapan for display on the main page
        $ucapanList = \App\Models\Ucapan::where('from_form', 'najwa-fareez')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($ucapan) {
                return [
                    'nama' => $ucapan->nama,
                    'ucapan' => $ucapan->ucapan,
                    'created_at' => $ucapan->created_at->diffForHumans(),
                ];
            });

        return view('kad-kahwin.kad-kahwin', compact('ucapanList'));
    }

    public function tandang()
    {
        // Get the latest 5 ucapan for display on the main page
        $ucapanList = \App\Models\Ucapan::where('from_form', 'fareez-najwa')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($ucapan) {
                return [
                    'nama' => $ucapan->nama,
                    'ucapan' => $ucapan->ucapan,
                    'created_at' => $ucapan->created_at->diffForHumans(),
                ];
            });

        return view('kad-kahwin.kad-kahwin', compact('ucapanList'));
    }

    /**
     * Display all ucapan submissions
     */
    public function semua_ucapan()
    {
        $ucapanList = \App\Models\Ucapan::where('from_form', 'fareez-najwa')
            ->latest()
            ->get()
            ->map(function ($ucapan) {
                return [
                    'nama' => $ucapan->nama,
                    'ucapan' => $ucapan->ucapan,
                    'created_at' => $ucapan->created_at->diffForHumans(),
                ];
            });

        return view('kad-kahwin.semua-ucapan', compact('ucapanList'));
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
            $ucapan->from_form = $request->input('from_form', 'fareez-najwa');
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
}
