@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }

        .font-inter {
            font-family: 'Inter', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(100px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 32px 64px -12px rgba(0, 0, 0, 0.35);
        }

        .floating {
            animation: floating 6s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            33% {
                transform: translateY(-15px) rotate(1deg);
            }

            66% {
                transform: translateY(-8px) rotate(-1deg);
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .tech-grid {
            background-image:
                linear-gradient(to bottom right, #fce7f3, #f3e8ff, #dbeafe),
                linear-gradient(rgba(147, 51, 234, .08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(147, 51, 234, .08) 1px, transparent 1px);
            background-size: 100% 100%, 50px 50px, 50px 50px;
        }

        .neon-border {
            box-shadow: 0 0 20px rgba(147, 51, 234, 0.3);
        }
    </style>
@endpush

<x-app-layout>

    <body class="font-inter text-gray-800 bg-gray-50">

        <!-- Hero Section -->
        <section id="utama"
            class="bg-linear-to-br from-pink-100 via-purple-50 to-blue-100 tech-grid pt-12 pb-12 px-4 relative overflow-hidden">
            <div class="absolute inset-0 bg-white/20"></div>
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="relative">
                    {{-- logo --}}
                    <div class="text-left">
                        <span class="font-playfair text-2xl lg:text-4xl font-bold text-gray-800 dark:text-gray-700">
                            Tawin.my
                        </span>
                        <div class="text-sm lg:text-md font-semibold text-purple-600 dark:text-purple-500">
                            Kad Kahwin Digital
                        </div>
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 gap-16 items-center min-h-[85vh]">
                    <div class="space-y-8 fade-in">
                        <div class="space-y-6">
                            <h1 class="font-playfair text-5xl md:text-7xl font-bold text-gray-800 leading-tight">
                                Cipta Kad Kahwin
                                <span class="bg-linear-to-r from-rose-400 to-pink-400 bg-clip-text text-transparent">
                                    Digital Terbaik
                                </span>
                            </h1>
                            <p class="text-xl md:text-2xl text-gray-700 leading-relaxed max-w-xl">
                                Cipta kad jemputan digital yang cantik, mudah dikongsi, dan boleh di-<i>customize</i>.
                                Termasuk fungsi RSVP & Ucapan.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#coming-soon"
                                class="flex items-center bg-purple-500 text-white px-8 py-4 rounded-xl hover:bg-purple-600 transition-all font-bold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 neon-border">
                                <x-fas-wand-magic-sparkles class="mr-2 w-5 h-5" />
                                <span>Cipta Kad</span>
                            </a>
                            <button onclick="alert('Demo akan datang!')"
                                class="flex items-center bg-white/60 backdrop-blur-sm text-gray-700 px-8 py-4 rounded-xl hover:bg-white/80 transition-all font-semibold text-lg border border-gray-200 hover:shadow-2xl transform hover:scale-105">
                                <span>Demo</span>
                            </button>
                        </div>
                    </div>

                    <div class="floating relative">
                        <div class="relative z-10">
                            <div
                                class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl p-8 transform rotate-2 neon-border">
                                <div class="text-center space-y-6">
                                    <div
                                        class="bg-linear-to-r from-purple-500 to-pink-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto">
                                        <x-fas-heart class="w-6 h-6 text-white" />
                                    </div>
                                    <div>
                                        <h3 class="font-playfair text-2xl font-bold text-gray-800 mb-2">Ahmad & Nora
                                        </h3>
                                        <p class="text-gray-600">Dengan segala hormat, kami menjemput</p>
                                        <p class="text-gray-600">Datuk/Datin/Tuan/Puan</p>
                                        <p class="text-gray-600">ke majlis perkahwinan kami</p>
                                    </div>
                                    <div
                                        class="bg-linear-to-r from-purple-50 to-blue-50 p-6 rounded-2xl border border-purple-200">
                                        <p class="font-bold text-xl text-gray-800">
                                            {{ \Carbon\Carbon::now()->locale('ms_MY')->isoFormat('D MMMM YYYY') }}
                                        </p>
                                        <p class="text-gray-600 mt-1">Dewan Serbaguna Putrajaya</p>
                                        <p class="text-sm text-purple-600 mt-2">12:00 PM - 4:00 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="absolute -bottom-6 -right-6 bg-linear-to-r from-yellow-400 to-orange-400 rounded-3xl shadow-xl p-6 transform -rotate-6">
                                <div class="text-center space-y-2 text-white">
                                    {{-- <div class="text-2xl">🚀</div> --}}
                                    <h4 class="font-bold">Contoh</h4>
                                    {{-- <p class="text-xs opacity-90">Auto-generate</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="ciri" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-20 fade-in">
                    <div
                        class="inline-flex items-center bg-purple-100 text-purple-800 rounded-full px-4 py-2 text-sm font-semibold mb-6">
                        <x-fas-bolt class="mr-2 w-4 h-4" />
                        Kenapa Pilih Tawin.my?
                    </div>
                    <h2 class="font-playfair text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                        Ciri Utama Platform Kami
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Direka khas untuk memudahkan anda cipta kad jemputan digital yang moden, interaktif dan mesra
                        pengguna.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 fade-in">
                    <x-welcome.feature-card>
                        <x-slot:icon>
                            <div class="w-12 h-12 rounded-lg bg-pink-100 flex items-center justify-center mb-6">
                                <x-fas-mobile-alt class="w-6 h-6 text-pink-600" />
                            </div>
                        </x-slot:icon>
                        <x-slot:title>
                            Mobile First
                        </x-slot:title>
                        Reka bentuk responsif dan pantas untuk semua peranti. Pengalaman terbaik di telefon, tablet &
                        desktop.
                    </x-welcome.feature-card>

                    <x-welcome.feature-card>
                        <x-slot:icon>
                            <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center mb-6">
                                <x-fas-envelope-open-text class="w-6 h-6 text-green-600" />
                            </div>
                        </x-slot:icon>
                        <x-slot:title>
                            Fungsi RSVP
                        </x-slot:title>
                        Tetamu boleh sahkan kehadiran secara digital.
                    </x-welcome.feature-card>

                    <x-welcome.feature-card>
                        <x-slot:icon>
                            <div class="w-12 h-12 rounded-lg bg-indigo-100 flex items-center justify-center mb-6">
                                <x-fas-user-cog class="w-6 h-6 text-indigo-600" />
                            </div>
                        </x-slot:icon>
                        <x-slot:title>
                            Admin Panel
                        </x-slot:title>
                        Urus kad, tetamu, RSVP dan statistik dengan mudah melalui panel
                        kawalan yang mesra pengguna.
                    </x-welcome.feature-card>

                    <x-welcome.feature-card>
                        <x-slot:icon>
                            <div class="w-12 h-12 rounded-lg bg-yellow-100 flex items-center justify-center mb-6">
                                <x-fas-paint-brush class="w-6 h-6 text-yellow-600" />
                            </div>
                        </x-slot:icon>
                        <x-slot:title>
                            Customization Mudah
                        </x-slot:title>
                        Edit warna, gambar, teks dan tema kad dengan beberapa klik
                        sahaja. Tiada kemahiran teknikal diperlukan.
                    </x-welcome.feature-card>

                    <x-welcome.feature-card>
                        <x-slot:icon>
                            <div class="w-12 h-12 rounded-lg bg-teal-100 flex items-center justify-center mb-6">
                                <x-fas-comments class="w-6 h-6 text-teal-600" />
                            </div>
                        </x-slot:icon>
                        <x-slot:title>
                            Ucapan & Doa
                        </x-slot:title>
                        Tetamu boleh tinggalkan ucapan dan doa secara digital untuk
                        memeriahkan majlis anda.
                    </x-welcome.feature-card>
                </div>
            </div>
        </section>

        <!-- Templates Preview -->
        <section id="template" class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-20 fade-in">
                    <div
                        class="inline-flex items-center bg-blue-100 text-blue-800 rounded-full px-4 py-2 text-sm font-semibold mb-6">
                        <x-fas-palette class="mr-2 w-4 h-4" />
                        Template Collection
                    </div>
                    <h2 class="font-playfair text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                        Template Profesional & Eksklusif
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Beberapa pilihan template desediakan mengikut tema. Setiap template boleh disesuaikan sepenuhnya
                        mengikut citarasa anda.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Template 1 -->
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden card-hover fade-in">
                        <div
                            class="bg-linear-to-br from-rose-100 via-pink-50 to-purple-100 p-8 h-80 flex flex-col justify-center text-center relative">
                            <div
                                class="absolute top-4 right-4 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold">
                                POPULAR
                            </div>
                            <div class="font-playfair mb-4 flex justify-center">
                                <x-fas-heart class="w-10 h-10 text-rose-500" />
                            </div>
                            <h3 class="font-playfair text-xl font-bold mb-3 text-gray-800">Klasik Mewah</h3>
                            <p class="text-sm text-gray-600 mb-4">Design tradisional dengan sentuhan moden dan elegant
                            </p>
                        </div>
                    </div>

                    <!-- Template 2 -->
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden card-hover fade-in">
                        <div
                            class="bg-linear-to-br from-purple-100 via-indigo-50 to-blue-100 p-8 h-80 flex flex-col justify-center text-center relative">
                            <div
                                class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                PREMIUM
                            </div>
                            <div class="font-playfair mb-4 flex justify-center">
                                <x-fas-star class="w-10 h-10 text-purple-500" />
                            </div>
                            <h3 class="font-playfair text-xl font-bold mb-3 text-gray-800">Bunga Sakura</h3>
                            <p class="text-sm text-gray-600 mb-4">Tema bunga dengan warna lembut dan romantic</p>
                        </div>
                    </div>

                    <!-- Template 3 -->
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden card-hover fade-in">
                        <div
                            class="bg-linear-to-br from-emerald-100 via-teal-50 to-cyan-100 p-8 h-80 flex flex-col justify-center text-center relative">
                            <div
                                class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                TRENDING
                            </div>
                            <div class="font-playfair mb-4 flex justify-center">
                                <x-fas-leaf class="w-10 h-10 text-emerald-500" />
                            </div>
                            <h3 class="font-playfair text-xl font-bold mb-3 text-gray-800">Minimalis Moden</h3>
                            <p class="text-sm text-gray-600 mb-4">Design bersih dengan typography yang stunning</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Pricing Section -->
        <section id="harga" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-20 fade-in">
                    <div
                        class="inline-flex items-center bg-green-100 text-green-800 rounded-full px-4 py-2 text-sm font-semibold mb-6">
                        <x-fas-tag class="mr-2 w-4 h-4" />
                        Pakej Harga Berpatutan
                    </div>
                    <h2 class="font-playfair text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                        Pilih Pakej Yang Sesuai
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Harga yang berpatutan untuk semua keperluan anda. Mula dengan percuma atau upgrade untuk lebih
                        banyak ciri.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <!-- Basic Plan -->
                    <div class="bg-gray-50 rounded-3xl p-8 card-hover">
                        <h3 class="font-playfair text-2xl font-bold text-gray-800 mb-2">Asas</h3>
                        <div class="text-4xl font-bold text-gray-800 mb-6">PERCUMA</div>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center"><x-fas-check class="text-green-500 mr-3 w-5 h-5" />Template
                                Percuma</li>
                            <li class="flex items-center"><x-fas-check class="text-green-500 mr-3 w-5 h-5" />Admin
                                Panel
                            </li>
                            <li class="flex items-center"><x-fas-check class="text-green-500 mr-3 w-5 h-5" />Kongsi
                                via
                                WhatsApp</li>
                            <li class="flex items-center"><x-fas-check class="text-green-500 mr-3 w-5 h-5" />Unlimited
                                RSVPs</li>
                            <li class="flex items-center"><x-fas-check class="text-green-500 mr-3 w-5 h-5" />Custom
                                URL
                            </li>
                        </ul>
                        <a href="#coming-soon"
                            class="w-full bg-gray-200 text-gray-800 py-3 rounded-xl font-semibold hover:bg-gray-300 transition-colors flex items-center justify-center text-center">
                            Mula Percuma
                        </a>
                    </div>

                    <!-- Paid Plan -->
                    <div class="bg-gray-50 rounded-3xl p-8 card-hover cursor-not-allowed relative">
                        <h3 class="font-playfair text-2xl font-bold text-gray-800 mb-2">Pro</h3>
                        <div class="text-4xl font-bold text-gray-800 mb-6">RM ??</div>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center"><x-fas-check class="text-green-500 mr-3 w-5 h-5" />TBD</li>
                        </ul>
                        <span
                            class="absolute top-4 right-4 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold">Akan
                            Datang (maybe)</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Coming Soon Section -->
        <section id="coming-soon"
            class="py-24 bg-linear-to-br from-indigo-600 to-purple-700 overflow-hidden relative">
            <div class="absolute inset-0 tech-grid opacity-20"></div>
            <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
                <div class="space-y-8 fade-in">
                    <div class="transform rotate-12 mb-8">
                        <h2 class="font-playfair text-6xl md:text-8xl font-bold text-white leading-none">
                            COMING
                        </h2>
                        <h2
                            class="font-playfair text-6xl md:text-8xl font-bold bg-linear-to-r from-yellow-300 to-pink-300 bg-clip-text text-transparent leading-none">
                            SOON
                        </h2>
                    </div>
                    <p class="text-xl md:text-2xl text-white/90 max-w-2xl mx-auto">
                        Platform kami sedang dalam pembangunan. Datang balik nanti!
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <div
                            class="glass-effect text-white px-8 py-4 rounded-xl font-semibold text-lg border border-white/30">
                            👨‍🍳 Let me cook
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid md:grid-cols-5 gap-8 py-12">
                    <div class="md:col-span-2 space-y-6">
                        <div class="flex items-center space-x-3">
                            <div class="text-left">
                                <span class="font-playfair text-2xl font-bold text-gray-100">
                                    Tawin.my
                                </span>
                                <div class="text-xs font-semibold text-purple-400">
                                    Kad Kahwin Digital
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-400 max-w-md">
                            Platform digital untuk cipta kad jemputan perkahwinan yang mudah, moden dan boleh dikongsi.
                        </p>
                    </div>

                </div>

                <div class="border-t border-gray-800 py-4">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-sm text-gray-400 mb-4 md:mb-0">
                            &copy; 2025 <a href="https://iqfareez.com" {{-- 'fancy' underline animation --}}
                                class="relative after:bg-gray-400 after:absolute after:h-px after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300 cursor-pointer">Muhammad
                                Fareez</a>.
                            Hak
                            Cipta Terpelihara.
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            // Enhanced fade in animation on scroll
            const observerOptions = {
                threshold: 0.15,
                rootMargin: '0px 0px -80px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        // Add staggered delay for multiple elements
                        setTimeout(() => {
                            entry.target.classList.add('visible');
                        }, index * 100);
                    }
                });
            }, observerOptions);

            // Observe all fade-in elements
            document.querySelectorAll('.fade-in').forEach(el => {
                observer.observe(el);
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Initial animation for hero section
            window.addEventListener('load', () => {
                setTimeout(() => {
                    document.querySelector('#utama .fade-in').classList.add('visible');
                }, 300);
            });

            // Enhanced button interactions
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px) scale(1.02)';
                    this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });

                button.addEventListener('mousedown', function() {
                    this.style.transform = 'translateY(0) scale(0.98)';
                });

                button.addEventListener('mouseup', function() {
                    this.style.transform = 'translateY(-3px) scale(1.02)';
                });
            });

            // Add loading animation
            window.addEventListener('load', () => {
                document.body.classList.add('loaded');
            });
        </script>
    </body>
</x-app-layout>
