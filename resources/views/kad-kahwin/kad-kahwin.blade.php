@extends('layouts.app')

@section('head')
    <meta property="og:title" content="Undangan Perkahwinan Fareez & Najwa" />
    <meta property="og:description" content="5 Julai 2025. Kuala Lumpur." />
    <meta property="og:image" content="https://tawin-og.vercel.app/api/kad-nama?nama=Fareez&pasangan=Najwa&bg=2&font=1" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Kad Kahwin Fareez & Najwa" />
@endsection

@section('title', 'Fareez & Najwa')

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

        .dm-serif-text-regular-italic {
            font-family: "DM Serif Text", serif;
            font-weight: 400;
            font-style: italic;
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

        .aref-ruqaa-bold {
            font-family: "Aref Ruqaa", serif;
            font-weight: 700;
            font-style: normal;
        }
    </style>

@endsection


@section('content')
    <div
        class="min-h-screen flex flex-col items-center drop-shadow-md relative overflow-x-hidden bg-gradient-to-br from-blue-100 to-white bg-fixed font-['Dancing_Script','Inter','sans-serif']">

        <!-- Hero Section -->
        <section
            class="w-full flex flex-col items-center justify-center py-16 px-4 text-center min-h-[60vh] md:min-h-0 md:py-16 md:justify-center relative"
            style="min-height:100svh;">
            <!-- Flower Decorations -->
            <div class="absolute -top-12 -left-12 w-full h-56 md:w-1/2 md:h-32">
                <img src="{{ asset('images/bunga-top.png') }}" alt="Flower Decoration" class="w-full h-full object-contain">
            </div>
            <div class="absolute -bottom-10 -right-10 h-56 w-full md:w-1/2 md:h-32">
                <img src="{{ asset('images/bunga-bottom.png') }}" alt="Flower Decoration"
                    class="w-full h-full object-contain">
            </div>
            <div class="absolute top-[40%] -left-18 -translate-y-1/2 w-40 h-1/2 md:w-56 md:h-56 opacity-45">
                <img src="{{ asset('images/bunga-left.png') }}" alt="Flower Decoration"
                    class="w-full h-full object-contain">
            </div>
            <div class="absolute top-1/2 -right-18 -translate-y-1/3 w-40 h-1/2 md:w-56 md:h-56 opacity-45">
                <img src="{{ asset('images/bunga-right.png') }}" alt="Flower Decoration"
                    class="w-full h-full object-contain">
            </div>
            <!-- Hero Content -->
            <div class="text-sm tracking-widest uppercase text-gray-600 mb-10 dm-serif-text-regular">Undangan Perkahwinan
            </div>
            <h1 class="text-6xl md:text-7xl font-bold text-gray-800 mb-2 dm-serif-text">Fareez</h1>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-600 mb-2 dm-serif-text">&</h1>
            <h1 class="text-6xl md:text-7xl font-bold text-gray-800 mb-4 dm-serif-text">Najwa</h1>
            <div class="text-lg md:text-xl text-gray-700 mt-10 mb-1">05.07.2025</div>
            <div class="text-lg md:text-xl text-gray-500">9 Muharam 1447H</div>
        </section>

        <!-- Parents Invitation Section -->
        <section class="w-full max-w-xl bg-white/80 rounded-xl shadow-lg p-6 mb-8 z-5">
            <div class="text-center aref-ruqaa-regular text-xl text-gray-700 mb-4">السلام عليكم ورحمة الله وبركاته</div>
            <div class="text-center text-xl text-gray-700 mb-2">
                Dengan penuh kesyukuran kehadrat Allah SWT, kami,
            </div>
            <div class="text-center figtree-normal font-semibold text-gray-800 leading-tight text-lg md:text-xl">
                Mohd Sharipuddin bin Mohd Isa
            </div>
            <div class="text-center figtree-normal font-semibold text-gray-800 my-0 leading-tight text-lg md:text-xl">
                &
            </div>
            <div class="text-center figtree-normal font-semibold text-gray-800 leading-tight text-lg md:text-xl">
                Rosnani binti Hasmuni
            </div>
            <div class="text-center text-xl text-gray-700 mt-4 mb-4">
                menjemput Tuan/Puan/Encik/Cik ke majlis perkahwinan Putera kami
            </div>
            <div class="text-center figtree-normal text-lg font-bold text-pink-800 mb-0">Muhammad Fareez Iqmal</div>
            <div class="text-center text-lg text-gray-600 my-0">serta pasangannya</div>
            <div class="text-center figtree-normal text-lg font-bold text-pink-800 mt-0">Nur Farah Najwa binti Mahadzir
            </div>
        </section>

        <!-- Event Details Section -->
        <section class="w-full max-w-xl bg-white/80 rounded-xl shadow-lg p-6 mb-8 flex flex-col items-center">
            <div class="text-2xl font-semibold text-pink-700 mb-2">Tarikh & Masa</div>
            <div class="text-gray-800 figtree-normal mb-1">Sabtu, 5 Julai 2025</div>
            <div class="text-gray-800 figtree-normal mb-3">12:00 tengahari - 4:00 petang</div>
            <div class="text-2xl font-semibold text-pink-700 mb-2">Alamat</div>
            <div class="text-gray-800 figtree-normal mb-3 text-center">
                Kompleks Komuniti Muhibbah,<br>
                76, Jalan 4/155. Bukit OUG,<br>
                58200 W.P. Kuala Lumpur,<br>
            </div>
            <div class="flex gap-4 justify-center">
                <a href="https://maps.app.goo.gl/cxo1PtFGRFUHzNU96" target="_blank"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">Google Maps</a>
                <a href="https://waze.com/ul?ll=2.9936,101.7890&navigate=yes" target="_blank"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">Waze</a>
            </div>
        </section>

        <!-- Countdown & RSVP Section -->
        <section class="w-full max-w-xl bg-white/80 rounded-xl shadow-lg p-6 mb-8 flex flex-col items-center">
            <div class="text-lg font-semibold text-pink-700 mb-2">Countdown</div>
            <div id="countdown" class="text-2xl figtree-normal font-bold text-gray-800 mb-4">Loading...</div>
            <a href="#rsvp" class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded shadow text-lg">RSVP</a>
        </section>

        <!-- Ucapan Section -->
        <section id="ucapan"
            class="w-full max-w-xl bg-white/80 rounded-xl shadow-lg p-6 mb-16 flex flex-col items-center relative z-10">
            <div class="text-lg font-semibold text-pink-700 mb-2">Ucapan</div>
            <form class="w-full flex flex-col gap-3">
                <input type="text" name="nama" placeholder="Nama anda"
                    class="border rounded px-3 py-2 focus:outline-pink-400" required>
                <textarea name="ucapan" placeholder="Ucapan anda" class="border rounded px-3 py-2 focus:outline-pink-400"
                    rows="3" required></textarea>
                <button type="submit"
                    class="bg-pink-500 hover:bg-pink-600 figtree-normal text-white px-4 py-2 rounded shadow">Hantar
                    Ucapan</button>
            </form>
            <!-- Placeholder for ucapan list -->
            <div class="w-full mt-6">
                <div class="text-gray-500 text-sm text-center">Ucapan akan dipaparkan di sini.</div>
            </div>
        </section>
    </div>

    <!-- Countdown Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateCountdown() {
                const eventDate = new Date('2025-06-28T12:00:00+08:00');
                const now = new Date();
                const diff = eventDate - now;
                if (diff <= 0) {
                    document.getElementById('countdown').textContent = 'Majlis sedang berlangsung!';
                    return;
                }
                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                const minutes = Math.floor((diff / (1000 * 60)) % 60);
                const seconds = Math.floor((diff / 1000) % 60);
                document.getElementById('countdown').textContent =
                    `${days} hari ${hours} jam ${minutes} minit`;
            }
            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    </script>
@endsection
