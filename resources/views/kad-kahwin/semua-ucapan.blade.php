@extends('layouts.app')

@section('head')
    <meta property="og:title" content="Semua Ucapan - Fareez & Najwa" />
    <meta property="og:description" content="Lihat semua ucapan perkahwinan untuk Fareez & Najwa" />
    <meta property="og:image" content="https://tawin-og.vercel.app/api/kad-nama?nama=Fareez&pasangan=Najwa&bg=2&font=1" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Fareez & Najwa - tawin.my" />
@endsection

@section('title', 'Semua Ucapan - Fareez & Najwa')

@section('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- DM Serif Text --}}
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
    {{-- Dancing Script, Inter --}}
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Inter:wght@400;600&display=swap"
        rel="stylesheet">
    {{-- Figtree --}}
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    {{-- Aref Ruqaa --}}
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        h1,
        .font-dancing {
            font-family: 'Dancing Script', cursive !important;
        }

        body,
        .font-inter {
            font-family: 'Inter', sans-serif !important;
        }

        .dm-serif-text {
            font-family: "DM Serif Text", serif;
        }

        .dm-serif-text-regular {
            font-family: "DM Serif Text", serif;
            font-weight: 400;
            font-style: normal;
        }

        .figtree-normal {
            font-family: "Figtree", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }

        .aref-ruqaa-regular {
            font-family: "Aref Ruqaa", serif;
            font-weight: 400;
            font-style: normal;
        }

        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #ec4899;
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #db2777;
        }

        /* Fade in animation */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hover effects */
        .ucapan-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .ucapan-card {
            transition: all 0.3s ease;
        }
    </style>
@endsection

@section('content')
    <div
        class="min-h-screen bg-gradient-to-br from-blue-100 to-white bg-fixed font-['Dancing_Script','Inter','sans-serif']">

        <!-- Header Section -->
        <div class="bg-white/90 backdrop-blur-sm shadow-sm sticky top-0 z-50">
            <div class="max-w-4xl mx-auto px-4 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('kenduri.show', $slug) }}"
                            class="inline-flex items-center gap-2 text-pink-600 hover:text-pink-700 transition-colors duration-200">
                            <x-heroicon-o-arrow-left class="w-5 h-5" />
                            <span class="figtree-normal font-medium">Kembali</span>
                        </a>
                        <div class="h-6 w-px bg-gray-300"></div>
                        <h1 class="text-xl font-semibold text-gray-800 dm-serif-text">Semua Ucapan</h1>
                    </div>
                    <div class="text-sm text-gray-600 figtree-normal">
                        {{ $ucapanList->count() }} ucapan
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto px-4 py-8">

            <!-- Hero Section -->
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2 dm-serif-text">Ucapan untuk</h2>
                <h3 class="text-2xl md:text-3xl font-bold text-pink-600 mb-4 dm-serif-text">Fareez & Najwa</h3>
                <p class="text-gray-600 figtree-normal">Terima kasih atas ucapan dan doa dari semua</p>
            </div>

            <!-- Ucapan List -->
            @forelse ($ucapanList as $index => $ucapan)
                <div class="ucapan-card bg-white/80 backdrop-blur-sm rounded-xl shadow-md p-6 fade-in mb-4"
                    style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="flex items-start gap-4">
                        <!-- Avatar -->
                        <div class="flex-shrink-0">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white font-semibold text-lg">
                                {{ strtoupper(substr($ucapan['nama'], 0, 1)) }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-semibold text-pink-800 figtree-normal text-lg">{{ $ucapan['nama'] }}
                                </h4>
                                <span class="text-xs text-gray-500 figtree-normal">{{ $ucapan['created_at'] }}</span>
                            </div>
                            <p class="text-gray-700 figtree-normal leading-relaxed">{{ $ucapan['ucapan'] }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                        <x-heroicon-o-chat-bubble-oval-left-ellipsis class="w-12 h-12 text-gray-400" />
                    </div>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2 dm-serif-text">Belum ada ucapan</h3>
                    <p class="text-gray-500 figtree-normal mb-6">Jadilah yang pertama memberikan ucapan!</p>
                    <a href="{{ route('kenduri.show') }}#ucapan"
                        class="inline-flex items-center gap-2 bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg shadow-md transition-all duration-200 figtree-normal font-medium">
                        <x-heroicon-o-pencil class="w-4 h-4" />
                        Tulis Ucapan
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
