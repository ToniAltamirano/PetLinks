{{-- Top Navbar --}}
<nav class="navbar navbar-expand navbar-dark bg-secondary p-3">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/spam_logo_navbar.png') }}" alt="" width="200" height="200">
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
                    @if (Auth::check())
                        <span class="align-middle">{{ Auth::user()->nombre_usuario }}</span>
                    @endif
                    <i class="material-icons">account_circle</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-with-icons sub">
                    @if (Auth::check())
                        <a class="dropdown-item" href="{{ url('/logout')}}">Logout</a>
                    @else
                        <a class="dropdown-item" href="{{ url('/login')}}">{{ __('master.login') }}</a>
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
                <a class="nav-link text-white ml-2 mr-2 pl-3" href="#undefined">{{ __('master.transparency') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white ml-2 mr-2  pl-3" target="_blank"
                    href="{{ url('https://www.protectoramataro.org/es/necesitamos-donaciones')}}">{{ __('master.donate') }}</a>
            </li>
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link text-white ml-2 mr-2  pl-3" href="{{ url('/landing')}}">{{ __('master.admin') }}</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
