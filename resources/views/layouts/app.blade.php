<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HGPT') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    @livewireStyles

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow p-3 mb-4" id="header" style="background: rgb(240, 235, 235);">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <div class="d-flex align-items-center">
                            <a class="navbar-brand align-middle" href="#">
                                <img src="http://localhost/inventory/resources/imagenes/LogoHGPT1.png" height="65" alt="HGPT Logo" loading="lazy" class="d-inline-block align-text-top me-2" />
                            </a>
                            <h5 style="text-align: center;"> <strong> HONORABLE GOBIERNO <br> PROVINCIAL DE TUNGURAHUA </strong></h5>

                        </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <div class="d-flex">
                            <a href="{{route('equipos.index')}}" id="op" class="me-2" href="#" style="color:black;">Inicio</a>
                        </div>

                        <!-- Authentication Links 
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                       
                        @endguest-->
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @livewireScripts

</body>

<footer style="margin-top: 70px;">
    <x-footer></x-footer>

</footer>

</html>