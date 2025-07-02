<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light" style="min-height: 100vh;">
    <div id="app">
        @include('components.navbar')
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
    @guest
    <footer class="bg-white border-top py-3 mt-5">
        <div class="container text-center">
            <small>&copy; {{ date('Y') }} BlogSystem. All rights reserved. | <a href="/">Home</a> | <a href="/contact">Contact</a></small>
        </div>
    </footer>
    @endguest
    @yield('footer')
</body>
</html>
