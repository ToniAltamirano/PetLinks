<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
        @yield('own_CSS')
        <script src="{{ asset('libs/jquery/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('libs/popper/popper.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
        <title>@yield('titulo')</title>
        <!-- Fonts and Icons -->
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    </head>
    <body>
        {{-- Top Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-3">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/spam_logo.png') }}" alt="" width="200" height="200">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    {{-- Selección de idioma --}}
                    <li class="dropdown nav-item">
                        <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="align-middle text-uppercase">{{ Config::get('app.locale') }}</span>
                            <i class="material-icons">language</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-with-icons sub">
                            <a id="lang_ca" class="dropdown-item" href="{{ url('/language', ['locale' => 'ca']) }}">Català</a>
                            <a id="lang_en" class="dropdown-item" href="{{ url('/language', ['locale' => 'en']) }}">English</a>
                            <a id="lang_es" class="dropdown-item" href="{{ url('/language', ['locale' => 'es']) }}">Español</a>
                        </div>
                    </li>

                    <!-- Sesión -->
                    <li class="dropdown nav-item">
                        <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">account_circle</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-with-icons sub">
                            @if (Auth::check())
                                <a class="dropdown-item" href="{{ url('/logout')}}">Logout</a>
                            @else
                                <a class="dropdown-item" href="{{ url('/login')}}">{{ __('master.login') }}</a>
                                <a class="dropdown-item" href="{{ url('/register')}}">{{ __('master.register') }}</a>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        {{-- Bottom Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light navbarSub">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBottom" aria-controls="navbarBottom" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse p-0" id="navbarBottom">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0  title-font">
                    <li class="nav-item">
                        <a class="nav-link text-white ml-2 mr-2 pl-3" href="{{ url('/')}}">{{ __('master.home') }}
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white ml-2 mr-2 pl-3" target="_blank"
                            href="{{ url('https://www.protectoramataro.org/es/quienes-somos-que-hacemos') }}">{{ __('master.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white ml-2 mr-2  pl-3" target="_blank"
                            href="{{ url('https://www.protectoramataro.org/es/necesitamos-donaciones')}}">{{ __('master.donate') }}</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link text-white ml-2 mr-2  pl-3" href="{{ url('/admin')}}">{{ __('master.admin') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-white ml-2 mr-2 pl-3" href="{{ url('/admin')}}">{{ __('master.admin') }}
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        {{-- Body --}}
        <div class="">@yield('contenidor')</div>
        {{-- Footer --}}
        @include('template.footer')
    </body>
</html>
