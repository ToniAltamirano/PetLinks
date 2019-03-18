<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
        @yield('own_CSS')
        <script src="{{ asset('libs/jquery/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('libs/popper/popper.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/events/login.js') }}"></script>
        <title>@yield('titulo')</title>
    </head>
    <body>
        <div class="container">@yield('contenidor')</div>
    </body>
</html>
