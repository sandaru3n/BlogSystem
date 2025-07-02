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
        @if(!(auth()->check() && request()->is('admin*')))
            @include('components.navbar')
        @endif
        <main class="py-4">
            <div class="container-fluid">
                @if(auth()->check() && request()->is('admin*'))
                <div class="row">
                    <div class="col-md-3 col-lg-2 px-0">
                        <nav class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white min-vh-100 position-fixed w-100" style="max-width:220px;">
                            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none fw-bold fs-4">
                                <i class="bi bi-speedometer2 me-2"></i> Admin
                            </a>
                            <hr class="border-secondary">
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item mb-1">
                                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white{{ request()->routeIs('admin.dashboard') ? ' active bg-primary' : '' }}">
                                        <i class="bi bi-house me-2"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item mb-1">
                                    <a href="{{ route('admin.manage-posts') }}" class="nav-link text-white{{ request()->routeIs('admin.manage-posts') ? ' active bg-primary' : '' }}">
                                        <i class="bi bi-file-earmark-text me-2"></i> Manage Posts
                                    </a>
                                </li>
                                <li class="nav-item mb-1">
                                    <a href="{{ route('admin.categories.index') }}" class="nav-link text-white{{ request()->routeIs('admin.categories.*') ? ' active bg-primary' : '' }}">
                                        <i class="bi bi-tags me-2"></i> Manage Categories
                                    </a>
                                </li>
                            </ul>
                            <form method="POST" action="{{ route('logout') }}" class="mt-4 text-center">
                                @csrf
                                <button type="submit" class="btn btn-outline-light w-100"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                            </form>
                        </nav>
                    </div>
                    <div class="col-md-9 col-lg-10 offset-md-3 offset-lg-2">
                        @yield('content')
                    </div>
                </div>
                @else
                    <div class="container">
                        @yield('content')
                    </div>
                @endif
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
