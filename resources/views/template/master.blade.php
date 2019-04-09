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
        @include('template.navbar')
        {{-- Body --}}
        @yield('contenidor')
        {{-- Footer --}}
        @include('template.footer')
        {{-- Scripts --}}
        @yield('scripts')
    </body>
</html>
