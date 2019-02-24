<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @yield('own_CSS')
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <title>@yield('titulo')</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-3">
        <a class="navbar-brand" href="">
            PETLINKS
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
        </div>

         <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
        <form class="form-inline my-2 my-lg-0">
          <a class="bg-transparent border-0 my-2 my-sm boton pr-4" href="{{ url('/register')}}">Regístrate</a>
          <a class="btn btn-primary my-2 my-sm-0 boton boton-login" href="{{ url('/login')}}">Iniciar Sesión</a>
        </form>
      </div>
    </nav>

     <nav class="navbar navbar-expand-lg navbar-light bg-primary p-0">
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0  title-font">
          <li class="nav-item">
            <a class="nav-link text-white ml-2 mr-2 pl-3" href="{{ url('/')}}">HOME
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white ml-2 mr-2 pl-3" href="">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white ml-2 mr-2  pl-3" href="">DONATE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white ml-2 mr-2  pl-3" href="">RRSS</a>
          </li>

        </ul>
      </div>
    </nav>

    <div class="container">@yield('contenidor')</div>

</body>
</html>
