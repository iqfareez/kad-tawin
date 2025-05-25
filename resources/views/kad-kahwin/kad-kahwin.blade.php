@extends('layouts.app')

@section('head')
    <meta property="og:title" content="{!! $og['title'] !!}" />
    <meta property="og:description" content="{!! $og['description'] !!}" />
    <meta property="og:image" content="{!! $og['image'] !!}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{!! $og['site_name'] !!}" />
@endsection

@section('title', $majlisDetail->pengantin_lelaki_display_name . ' & ' .
    $majlisDetail->pengantin_perempuan_display_name)

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

        .font-figtree {
            font-family: "Figtree", sans-serif;
            font-optical-sizing: auto;
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

        /* Loading animation for button */
        .button-loading {
            opacity: 0.7;
            cursor: not-allowed;
        }

        /* Pulse animation for loading text */
        .loading-text {
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Form validation styles */
        .form-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        .form-success {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        /* Smooth transitions */
        .transition-all {
            transition: all 0.3s ease;
        }

        .hero-content {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease-out forwards;
        }

        .hero-content.delay-1 {
            animation-delay: 0.2s;
        }

        .hero-content.delay-2 {
            animation-delay: 0.4s;
        }

        .hero-content.delay-3 {
            animation-delay: 0.6s;
        }

        .hero-content.delay-4 {
            animation-delay: 0.8s;
        }

        .hero-content.delay-5 {
            animation-delay: 1s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Flower decorations animation - CSS only */
        .flower-decoration {
            opacity: 0;
            animation: fadeIn 1.5s ease-out forwards;
        }

        .flower-decoration.delay-1 {
            animation-delay: 0.3s;
        }

        .flower-decoration.delay-2 {
            animation-delay: 0.5s;
        }

        .flower-decoration.delay-3 {
            animation-delay: 0.7s;
        }

        .flower-decoration.delay-4 {
            animation-delay: 0.9s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        @@supports (animation-timeline: view()) {
            .card-reveal {
                opacity: 0;
                transform: translateY(50px);
                animation: slideInUp .7s ease-out both;
                animation-timeline: view();
                animation-range: entry 0% entry 30%;
            }

            @keyframes slideInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        }

        /* Fallback for browsers without animation-timeline support */
        @@supports not (animation-timeline: view()) {
            .card-reveal {
                opacity: 0;
                transform: translateY(50px);
                animation: slideInUpFallback 1s ease-out forwards;
            }

            .card-reveal:nth-child(2) {
                animation-delay: 0.2s;
            }

            .card-reveal:nth-child(3) {
                animation-delay: 0.4s;
            }

            .card-reveal:nth-child(4) {
                animation-delay: 0.6s;
            }

            @keyframes slideInUpFallback {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        }
    </style>
@endsection

@section('content')
    <div class="min-h-screen flex flex-col items-center drop-shadow-md relative overflow-x-hidden bg-fixed font-['Dancing_Script','Inter','sans-serif'] 
        @if ($majlisDetail->theme == 1) bg-gradient-to-br from-blue-100 to-white
        @else
            bg-gradient-to-br from-[#f7efe6] to-[#fff8ef] @endif
        "
        <!-- Hero Section -->
        <section
            class="w-full flex flex-col items-center justify-center py-16 px-4 text-center min-h-[60vh] md:min-h-0 md:py-16 md:justify-center relative"
            style="min-height:100svh;">
            @if ($majlisDetail->theme == 1)
                <!-- Flower Decorations Style 1-->
                <div class="absolute -top-12 -left-12 w-full h-56 md:w-1/2 md:h-32 flower-decoration delay-1">
                    <img src="{{ asset('images/bunga-top.png') }}" alt="Flower Decoration"
                        class="w-full h-full object-contain">
                </div>
                <div class="absolute -bottom-10 -right-10 h-56 w-full md:w-1/2 md:h-32 flower-decoration delay-2">
                    <img src="{{ asset('images/bunga-bottom.png') }}" alt="Flower Decoration"
                        class="w-full h-full object-contain">
                </div>
                <div
                    class="absolute top-[40%] -left-18 -translate-y-1/2 w-40 h-1/2 md:w-56 md:h-56 opacity-45 flower-decoration delay-3">
                    <img src="{{ asset('images/bunga-left.png') }}" alt="Flower Decoration"
                        class="w-full h-full object-contain">
                </div>
                <div
                    class="absolute top-1/2 -right-18 -translate-y-1/3 w-40 h-1/2 md:w-56 md:h-56 opacity-45 flower-decoration delay-4">
                    <img src="{{ asset('images/bunga-right.png') }}" alt="Flower Decoration"
                        class="w-full h-full object-contain">
                </div>
            @else
                <!-- Flower Decorations Style 2-->
                <div class="absolute -top-25 -left-50 w-full h-1/3 md:w-1/2 flower-decoration delay-1">
                    <img src="{{ asset('images/bunga_theme_2.png') }}" alt="Flower Decoration"
                        class="w-full h-full object-contain">
                </div>
                <div class="absolute bottom-[25%] -right-18 w-40 md:w-56 md:h-1/3 flower-decoration delay-2 rotate-180">
                    <img src="{{ asset('images/bunga_panjang_theme_2.png') }}" alt="Flower Decoration"
                        class="w-full h-full object-contain">
                </div>
                <div class="absolute top-[35%] -left-18 w-40 h-1/2 md:w-56 md:h-1/3 flower-decoration delay-3">
                    <img src="{{ asset('images/bunga_panjang_theme_2.png') }}" alt="Flower Decoration"
                        class="w-full h-full object-contain">
                </div>
                <div class="absolute -bottom-25 -right-50 h-1/3 w-full md:w-1/2 md:h-68 flower-decoration delay-4">
                    <img src="{{ asset('images/bunga_theme_2.png') }}" alt="Flower Decoration"
                        class="w-full h-full object-contain">
                </div>
            @endif

            <!-- Hero Content -->
            <div
                class="text-sm md:text-xl tracking-widest uppercase text-gray-600 mb-10 dm-serif-text-regular hero-content">
                {{ $majlisDetail->title ?: 'Undangan Perkahwinan' }}
            </div>
            @if ($majlisDetail->pengantin_lelaki_first)
                <h1 class="text-6xl md:text-7xl font-bold text-gray-800 mb-2 dm-serif-text hero-content delay-1">
                    {{ $majlisDetail->pengantin_lelaki_display_name }}</h1>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-600 mb-2 dm-serif-text hero-content delay-2">&</h1>
                <h1 class="text-6xl md:text-7xl font-bold text-gray-800 mb-4 dm-serif-text hero-content delay-3">
                    {{ $majlisDetail->pengantin_perempuan_display_name }}</h1>
            @else
                <h1 class="text-6xl md:text-7xl font-bold text-gray-800 mb-2 dm-serif-text hero-content delay-1">
                    {{ $majlisDetail->pengantin_perempuan_display_name }}</h1>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-600 mb-2 dm-serif-text hero-content delay-2">&</h1>
                <h1 class="text-6xl md:text-7xl font-bold text-gray-800 mb-4 dm-serif-text hero-content delay-3">
                    {{ $majlisDetail->pengantin_lelaki_display_name }}</h1>
            @endif
            <div class="text-lg md:text-xl text-gray-700 mt-10 mb-1 hero-content delay-4">
                {{ $majlisDetail->majlis_date->locale('ms')->isoFormat('DD.MM.Y') }}</div>
            <div class="text-lg md:text-xl text-gray-500 hero-content delay-5">{{ $majlisDetail->majlis_date_hijri }}
            </div>
        </section>

        <!-- Parents Invitation Section -->
        <section class="w-full max-w-xl bg-white/80 rounded-xl shadow-lg p-6 mb-8 z-5 card-reveal">
            <div class="text-center aref-ruqaa-regular text-xl text-gray-700 mb-4">السلام عليكم ورحمة الله وبركاته</div>
            <div class="text-center text-xl text-gray-700 mb-2">
                Dengan penuh kesyukuran kehadrat Allah SWT, kami,
            </div>
            <div class="text-center font-figtree font-semibold text-gray-800 leading-tight text-lg md:text-xl">
                {{ $majlisDetail->bapa_name }}
            </div>
            <div class="text-center font-figtree font-semibold text-gray-800 my-0 leading-tight text-lg md:text-xl">
                &
            </div>
            <div class="text-center font-figtree font-semibold text-gray-800 leading-tight text-lg md:text-xl">
                {{ $majlisDetail->ibu_name }}
            </div>
            <div class="text-center text-xl text-gray-700 mt-4 mb-4">
                menjemput Tuan/Puan/Encik/Cik ke majlis perkahwinan
                {{ $majlisDetail->pengantin_lelaki_first ? 'Putera' : 'Puteri' }} kami
            </div>
            @if ($majlisDetail->pengantin_lelaki_first)
                <div class="text-center font-figtree text-lg font-semibold text-pink-800 mb-0">
                    {{ $majlisDetail->pengantin_lelaki_full_name }}</div>
                <div class="text-center text-lg text-gray-600 my-0">serta pasangannya</div>
                <div class="text-center font-figtree text-lg font-semibold text-pink-800 mt-0">
                    {{ $majlisDetail->pengantin_perempuan_full_name }}</div>
            @else
                <div class="text-center font-figtree text-lg font-semibold text-pink-800 mt-0">
                    {{ $majlisDetail->pengantin_perempuan_full_name }}</div>
                <div class="text-center text-lg text-gray-600 my-0">serta pasangannya</div>
                <div class="text-center font-figtree text-lg font-semibold text-pink-800 mb-0">
                    {{ $majlisDetail->pengantin_lelaki_full_name }}</div>
            @endif

        </section>

        <!-- Event Details Section -->
        <section class="w-full max-w-xl bg-white/80 rounded-xl shadow-lg p-6 mb-8 flex flex-col items-center card-reveal">
            <div class="text-2xl font-semibold text-pink-700 mb-2">Tarikh & Masa</div>
            <div class="text-gray-800 font-figtree font-medium mb-1">
                {{ $majlisDetail->majlis_date->locale('ms')->isoFormat('dddd, D MMMM Y') }}</div>
            <div class="text-gray-800 font-figtree mb-1">{{ $majlisDetail->majlis_time }}</div>
            <div class="relative inline-block text-center">
                <button id="calendarDropdownBtn" type="button"
                    class="font-figtree text-sm cursor-pointer text-pink-700 hover:text-pink-900 transition-colors duration-200">Tambah
                    ke Kalendar</button>
                <div id="calendarDropdownMenu"
                    class="origin-top absolute left-1/2 -translate-x-1/2 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-20 hidden">
                    <div class="py-1 font-figtree text-sm text-gray-700">
                        <a href="{{ route('calendar.google', $majlisDetail->slug) }}" target="_blank"
                            class="block px-4 py-2 hover:bg-pink-50 hover:text-pink-700 transition">Google Calendar</a>
                        <a href="{{ route('calendar.outlook', $majlisDetail->slug) }}" target="_blank"
                            class="block px-4 py-2 hover:bg-pink-50 hover:text-pink-700 transition">Outlook</a>
                        <a href="{{ route('calendar.yahoo', $majlisDetail->slug) }}" target="_blank"
                            class="block px-4 py-2 hover:bg-pink-50 hover:text-pink-700 transition">Yahoo</a>
                        <a href="{{ route('calendar.ics', $majlisDetail->slug) }}"
                            class="block px-4 py-2 hover:bg-pink-50 hover:text-pink-700 transition">ICS (Download)</a>
                    </div>
                </div>
                <div class="flex gap-4 justify-center mt-4">
                    <button id="rsvpBtn" type="button"
                        class="flex font-inter text-sm items-center gap-2 border border-gray-400 bg-white hover:bg-gray-50 text-gray-700 px-4 py-2 rounded shadow transition-colors duration-200">
                        <x-heroicon-s-calendar-date-range class="w-5 h-5" />
                        <span id="rsvpBtnText">RSVP</span>
                    </button>
                </div>
            </div>
            <div class="text-2xl font-semibold text-pink-700 mb-2 mt-8">Alamat</div>
            <div class="text-gray-800 font-figtree mb-3 text-center">
                <div class="font-medium">{{ $majlisDetail->venue_address_line_1 }}</div>
                {!! nl2br(e($majlisDetail->venue_address_line_2)) !!}<br>
            </div>
            <div class="flex gap-4 justify-center">
                <a href="{{ $majlisDetail->venue_google_maps_url }}"
                    class="flex font-inter text-sm items-center gap-2 border border-gray-400 bg-white hover:bg-gray-100 text-gray-800 px-4 py-2 rounded shadow transition-colors duration-200">
                    <img src="{{ asset('images/Google_Maps_icon.png') }}" alt="Google Maps"
                        class="w-5 h-5 object-contain">
                    Google Maps
                </a>
            </div>
        </section>

        <!-- Countdown Section -->
        <section class="w-full max-w-xl bg-white/80 rounded-xl shadow-lg p-6 mb-8 flex flex-col items-center card-reveal">
            <div class="text-2xl font-semibold text-pink-700 mb-2">Countdown</div>
            <div id="countdown" class="text-2xl font-figtree text-gray-800 mb-4">Loading...</div>
        </section> <!-- Ucapan Section -->
        <section id="ucapan"
            class="w-full max-w-xl bg-white/80 rounded-xl shadow-lg p-6 mb-16 flex flex-col items-center relative z-10 card-reveal">
            <div class="text-2xl font-semibold text-pink-700 mb-3">Ucapan</div>
            <form id="ucapanForm" class="w-full flex flex-col gap-3" action="{{ route('hantar_ucapan.store') }}"
                method="POST">
                @csrf
                <input type="hidden" name="from_form" value="{{ $majlisDetail->slug }}">
                <input type="text" name="nama" placeholder="Nama anda"
                    class="border rounded font-figtree px-3 py-2 focus:outline-pink-400" required>
                <textarea name="ucapan" placeholder="Ucapan anda"
                    class="border rounded font-figtree px-3 py-2 focus:outline-pink-400" rows="3" required></textarea>
                <button type="submit"
                    class="bg-pink-500 hover:bg-pink-600 font-figtree text-white px-4 py-2 rounded shadow transition-colors duration-200">
                    <span class="button-text">Hantar Ucapan</span>
                    <span class="loading-text hidden">Menghantar...</span>
                </button>
            </form> <!-- Ucapan list with top 5 submissions -->
            <div class="w-full mt-6" id="ucapanList">
                @if ($ucapanList && $ucapanList->count() > 0)
                    @foreach ($ucapanList as $ucapan)
                        <div class="bg-pink-50 border border-pink-200 rounded-lg p-4 mb-3">
                            <div class="font-semibold text-pink-800">{{ $ucapan['nama'] }}</div>
                            <div class="text-gray-700 font-figtree mt-1">{{ $ucapan['ucapan'] }}</div>
                            <div class="text-xs font-figtree text-gray-500 mt-2">{{ $ucapan['created_at'] }}</div>
                        </div>
                    @endforeach

                    <div class="text-center text-sm mt-4">
                        <a href="{{ route('semua_ucapan', $majlisDetail->slug) }}"
                            class="inline-flex items-center gap-2 px-6 py-3 transition-all duration-200 font-figtree font-medium">
                            Lihat Semua Ucapan
                        </a>
                    </div>
                @else
                    <div id="ucapan_placeholder" class="text-gray-500 text-md text-center">Ucapan akan dipaparkan di sini.
                    </div>
                @endif
            </div>
        </section>
    </div>

    <!-- RSVP Modal -->
    <div id="rsvpModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 hidden">
        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md relative">
            <button id="closeRsvpModal" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">&times;</button>
            <h2 class="text-2xl font-semibold text-pink-700 mb-4 text-center">RSVP Kehadiran</h2>
            <form id="rsvpForm" class="flex flex-col gap-4">
                @csrf
                <input type="hidden" name="slug" value="{{ $majlisDetail->slug }}">
                <div>
                    <label class="block font-figtree mb-1">Nama <span class="text-pink-500">*</span></label>
                    <input type="text" name="nama" class="border rounded px-3 py-2 w-full font-figtree" required
                        autocomplete="name">
                </div>
                <div>
                    <label class="block font-figtree mb-1">Jumlah Kehadiran <span class="text-pink-500">*</span></label>
                    <select name="jumlah" class="border rounded px-3 py-2 w-full font-figtree" required>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="block font-figtree mb-1">Email (pilihan)</label>
                    <input type="email" name="email" class="border rounded px-3 py-2 w-full font-figtree"
                        placeholder="Untuk jemputan digital">
                </div>
                <button type="submit"
                    class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded shadow font-figtree transition-colors duration-200">
                    Hantar RSVP
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Countdown functionality
            function updateCountdown() {
                const eventDate = new Date('{{ $majlisDetail->majlis_date->format('Y-m-d') }}');
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
            setInterval(updateCountdown, 1000); // Form submission with AJAX and SweetAlert2
            const ucapanForm = document.getElementById('ucapanForm');
            const submitButton = ucapanForm.querySelector('button[type="submit"]');
            const buttonText = submitButton.querySelector('.button-text');
            const loadingText = submitButton.querySelector('.loading-text');
            const namaInput = ucapanForm.querySelector('input[name="nama"]');
            const ucapanTextarea = ucapanForm.querySelector('textarea[name="ucapan"]');

            // Add real-time validation feedback
            function validateField(field, isValid) {
                field.classList.remove('form-error', 'form-success');
                if (isValid) {
                    field.classList.add('form-success');
                } else {
                    field.classList.add('form-error');
                }
            }

            // Real-time validation
            namaInput.addEventListener('blur', function() {
                validateField(this, this.value.trim().length > 0);
            });

            ucapanTextarea.addEventListener('blur', function() {
                validateField(this, this.value.trim().length > 0);
            });

            ucapanForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Client-side validation
                const nama = namaInput.value.trim();
                const ucapan = ucapanTextarea.value.trim();

                if (!nama || !ucapan) {
                    await Swal.fire({
                        icon: 'warning',
                        title: 'Maklumat Tidak Lengkap',
                        text: 'Sila isi semua medan yang diperlukan.',
                        confirmButtonText: 'Faham',
                        confirmButtonColor: '#ec4899',
                    });

                    if (!nama) validateField(namaInput, false);
                    if (!ucapan) validateField(ucapanTextarea, false);
                    return;
                }

                // Show loading state
                buttonText.classList.add('hidden');
                loadingText.classList.remove('hidden');
                submitButton.disabled = true;
                submitButton.classList.add('button-loading');

                try {
                    const formData = new FormData(ucapanForm);

                    const response = await fetch(ucapanForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        }
                    });

                    const result = await response.json();

                    if (result.success) {
                        // Show success notification with custom styling
                        await Swal.fire({
                            icon: 'success',
                            title: 'Tahniah!',
                            text: result.message,
                            confirmButtonText: 'Terima kasih',
                            confirmButtonColor: '#ec4899',
                            background: '#fff',
                            color: '#374151',
                            customClass: {
                                popup: 'rounded-lg shadow-2xl',
                                title: 'text-gray-800',
                                content: 'text-gray-600'
                            },
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        });

                        // Reset form and clear validation styles
                        ucapanForm.reset();
                        namaInput.classList.remove('form-error', 'form-success');
                        ucapanTextarea.classList.remove('form-error', 'form-success');

                        if (result.data) {
                            updateUcapanList(result.data);
                        }

                    } else {
                        throw new Error(result.message || 'Terdapat masalah teknikal');
                    }

                } catch (error) {
                    console.error('Error submitting form:', error);

                    // Show error notification
                    await Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: error.message || 'Terdapat masalah teknikal. Sila cuba lagi.',
                        confirmButtonText: 'Cuba Lagi',
                        confirmButtonColor: '#ec4899',
                        background: '#fff',
                        color: '#374151',
                        customClass: {
                            popup: 'rounded-lg shadow-2xl',
                            title: 'text-red-600',
                            content: 'text-gray-600'
                        },
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                } finally {
                    // Reset button state
                    buttonText.classList.remove('hidden');
                    loadingText.classList.add('hidden');
                    submitButton.disabled = false;
                    submitButton.classList.remove('button-loading');
                }
            });

            // Update ucapan list
            function updateUcapanList(ucapanData) {
                const ucapanList = document.querySelector('#ucapanList');
                if (ucapanList) {
                    const placeholder = ucapanList.querySelector('#ucapan_placeholder');
                    if (placeholder) {
                        // Remove placeholder
                        placeholder.remove();
                    }

                    // Create new ucapan element
                    const ucapanElement = document.createElement('div');
                    ucapanElement.className = 'bg-pink-50 border border-pink-200 rounded-lg p-4 mb-3';
                    ucapanElement.innerHTML = `
                        <div class="font-semibold text-pink-800">${ucapanData.nama}</div>
                        <div class="text-gray-700 font-figtree mt-1">${ucapanData.ucapan}</div>
                        <div class="text-xs font-figtree text-gray-500 mt-2">Baru sahaja</div>
                    `;

                    ucapanList.prepend(ucapanElement);
                }
            }

            // RSVP Modal logic
            const rsvpBtn = document.getElementById('rsvpBtn');
            const rsvpModal = document.getElementById('rsvpModal');
            const closeRsvpModal = document.getElementById('closeRsvpModal');
            const rsvpForm = document.getElementById('rsvpForm');
            const rsvpBtnText = document.getElementById('rsvpBtnText');

            function showRsvpModal() {
                rsvpModal.classList.remove('hidden');
            }

            function hideRsvpModal() {
                rsvpModal.classList.add('hidden');
            }

            rsvpBtn.addEventListener('click', function() {
                showRsvpModal();
            });

            closeRsvpModal.addEventListener('click', hideRsvpModal);
            rsvpModal.addEventListener('click', function(e) {
                if (e.target === rsvpModal) hideRsvpModal();
            });

            rsvpForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(rsvpForm);
                try {
                    const res = await fetch('/rsvp', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        }
                    });
                    const result = await res.json();
                    if (result.success) {
                        await Swal.fire({
                            icon: 'success',
                            title: 'Terima kasih! Anda berjaya RSVP.',
                            html: `<div class='flex flex-col md:flex-row items-center justify-center gap-2 mt-4'>
                                <a id='swalGoogleCal' href='{{ route('calendar.google', $majlisDetail->slug) }}' class='bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-2 rounded font-figtree text-sm' target='_blank'>Add to Google Calendar</a>
                                <a id='swalAppleCal' href='{{ route('calendar.ics', $majlisDetail->slug) }}' class='bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-2 rounded font-figtree text-sm mb-2 md:mb-0' target='_blank'>Download ICS</a>
                            </div>`,
                            showConfirmButton: false,
                            allowOutsideClick: true,
                        });
                        hideRsvpModal();

                        // change button label to RSVP-ed
                        rsvpBtnText.textContent = 'RSVP-ed';
                        rsvpBtn.disabled = true;
                        rsvpBtn.classList.add('opacity-50');
                    } else if (result.already) {
                        Swal.fire({
                            icon: 'info',
                            title: 'RSVP Dikemaskini',
                            text: result.message,
                            confirmButtonColor: '#ec4899',
                        });
                        hideRsvpModal();

                        // change button label to RSVP-ed
                        rsvpBtnText.textContent = 'RSVP-ed';
                        rsvpBtn.disabled = true;
                        rsvpBtn.classList.add('opacity-50');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ralat',
                            text: result.message || 'Terdapat masalah teknikal.',
                            confirmButtonColor: '#ec4899',
                        });
                    }
                } catch (err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ralat',
                        text: 'Terdapat masalah teknikal. ',
                        confirmButtonColor: '#ec4899',
                    });
                }
            });

            // Calendar dropdown logic
            const calendarDropdownBtn = document.getElementById('calendarDropdownBtn');
            const calendarDropdownMenu = document.getElementById('calendarDropdownMenu');
            if (calendarDropdownBtn && calendarDropdownMenu) {
                calendarDropdownBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    calendarDropdownMenu.classList.toggle('hidden');
                });
                document.addEventListener('click', function(e) {
                    if (!calendarDropdownMenu.classList.contains('hidden')) {
                        calendarDropdownMenu.classList.add('hidden');
                    }
                });
                calendarDropdownMenu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
        });
    </script>
@endsection
