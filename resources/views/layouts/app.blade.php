<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hot Hot Buffet</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lora:ital,wght@0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/layoutStyle.css')}}">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @section('head')

    @show

</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand text-lora" href="{{ url('/') }}" >
                    <img src="{{asset('images/logo.png')}}" alt="Logo" width="70" height="70" class="d-inline-block align-text-center">                    
                    <span class="fw-bold fs-4" style="font-family: 'Lora', serif;">Hot Hot Buffet</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @yield('navbar')
            </div>
        </nav>       

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>



