@extends ('template.user')

@section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('titulo', 'LOGIN')

@section('contenidor')

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <a href="{{ url('/')}}">
                <img class="mb-4" src="{{ asset('img/spam_logo.png')}}" alt="spAm">
            </a>
            <h1 class="h3 mb-3 text-center font-weight-normal card-title">Inicio de Sesión</h1>
            <form class="form-signin" action="" method="post">
                @csrf
                <!-- Username -->
                <div class="form-label-group">
                    <input type="username" id="inputUsername" class="form-control" placeholder="Nombre de usuario" required autofocus>
                    {{-- <label for="inputUsername">Nombre de usuario</label> --}}
                </div>
                <!-- Contraseña -->
                {{-- <div class="form-label-group">
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
                    <label for="inputPassword">Contraseña</label>
                </div> --}}

                <div class="input-group">
                    <input type="Password" class="form-control" id="inputPassword" placeholder="Contraseña">
                    {{-- <label for="inputPassword">Contraseña</label> --}}
                    <div class="input-group-append">
                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                    </div>

                </div>
              <!-- Submit -->
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Iniciar Sesión</button>
              <hr class="my-4">
              <p class="text-center">¿Aún no tienes cuenta? <a href="{{ url('/register')}}">Regístrate!</a></p>
              <p class="text-center"><a href="recover.php">Has olvidado tu contraseña?</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection



    <!-- <div class="row align-items-center h-100">
        <div class="card bg-light mx-auto mt-5 col-11 col-sm-10 col-md-8 col-lg-6 col-xl-5">
            <div class="card-body">
                <div class="form-signin text-dark" action="" method="post">
                    <a href="">
                        <img class="mb-4" src="{{ asset('img/spam_logo.png')}}" alt="spAm">
                    </a>
                    <h1 class="h3 mb-3 text-center font-weight-normal">LOG IN</h1>

                    <label for="inputName" class="sr-only">Usuario</label>
                    <input type="text" name="inputName" id="inputName" class="form-control" placeholder="Nombre de usuario" required autofocus>

                    <label for="inputPassword" class="sr-only">Contraseña</label>
                    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                    <hr>
                    <button class="btn btn-lg btn-primary btn-block bg-spam border-spam mt-3" id="btn_login" type="submit">INICIAR SESIÓN</button>
                </div>
            </div>
        </div>
    </div> -->
