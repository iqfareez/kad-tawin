<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '❤️') - Walimatul Urus</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @yield('head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('styles')

</head>

<body>
    <div class="container mx-auto">
        @yield('content')
    </div>
</body>

</html>
