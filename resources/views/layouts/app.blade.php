<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Home - tawin.my</title>
    <meta name="title" content="Home - tawin.my" />
    <meta name="description" content="Jana Kad kahwin digital anda sekarang! Percuma 100%" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://metatags.io/" />
    <meta property="og:title" content="Home - tawin.my" />
    <meta property="og:description" content="Jana Kad kahwin digital anda sekarang! Percuma 100%" />
    <meta property="og:image" content="{{ asset('images/og-home.png') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://metatags.io/" />
    <meta property="twitter:title" content="Home - tawin.my" />
    <meta property="twitter:description" content="Jana Kad kahwin digital anda sekarang! Percuma 100%" />
    <meta property="twitter:image" content="{{ asset('images/og-home.png') }}" />

    <script defer src="https://umami.iqfareez.com/script.js" data-website-id="52071592-9fe1-4eb3-83a9-dec970355d14">
    </script>

    @stack('styles')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
