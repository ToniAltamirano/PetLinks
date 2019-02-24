@extends ('template.user')

@section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('titulo', 'REGISTRO')

@section('contenidor')

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-register my-5">
          <div class="card-body">
            <a href="{{ url('/')}}">
                <img class="mb-4" src="{{ asset('img/spam_logo.png')}}" alt="spAm">
            </a>
            <h1 class="h3 mb-3 text-center font-weight-normal card-title">REGISTRO</h1>
            <form class="form-register">
              <div class="form-label-group">
                <input type="username" id="inputUsername" class="form-control" placeholder="Nombre de usuario" required autofocus>
                <label for="inputUsername">Nombre de usuario</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico" required>
                <label for="inputEmail">Correo electrónico</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                <label for="inputPassword">Contraseña</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword2" class="form-control" placeholder="Repite la contraseña" required>
                <label for="inputPassword2">Repite la contraseña</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="btn-register">Registrar</button>
              <hr class="my-4">
              <p class="text-center">Ya tienes cuenta?<a href="{{ url('/login')}}">Inicia sessión</a></p>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

