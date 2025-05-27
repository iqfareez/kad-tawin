<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home - tawin.my</title>
    <meta name="title" content="Home - tawin.my" />
    <meta name="description" content="Jana Kad kahwin digital anda sekarang! Percuma 100% (tempoh terhad)" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://metatags.io/" />
    <meta property="og:title" content="Home - tawin.my" />
    <meta property="og:description" content="Jana Kad kahwin digital anda sekarang! Percuma 100% (tempoh terhad)" />
    <meta property="og:image" content="{{ asset('images/og-home.png') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://metatags.io/" />
    <meta property="twitter:title" content="Home - tawin.my" />
    <meta property="twitter:description"
        content="Jana Kad kahwin digital anda sekarang! Percuma 100% (tempoh terhad)" />
    <meta property="twitter:image" content="{{ asset('images/og-home.png') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://umami.iqfareez.com/script.js" data-website-id="52071592-9fe1-4eb3-83a9-dec970355d14">
    </script>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Anything extra that need to put in head --}}
    @yield('head')

</head>

<body>
    @yield('content')
</body>

</html>
