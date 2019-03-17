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
                <img class="mb-4 col-12" src="{{ asset('img/spam_logo.png')}}" alt="spAm">
            </a>
            <h1 class="h3 mb-3 text-center font-weight-normal card-title">{{ __('login.title') }}</h1>
            <form class="form-signin" action="" method="post">
                @csrf
                <!-- Username -->
                <div class="form-label-group">
                    <input type="username" id="inputUsername" class="form-control" name="identificador" placeholder="{{ __('login.username') }}" required autofocus>
                </div>
                <!-- Password -->
                <div class="input-group">
                    <input type="Password" id="inputPassword" class="form-control" name="password" placeholder="{{ __('login.password') }}">
                    <div class="input-group-append">
                        <button id="show_password" class="btn" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
                    </div>
                </div>
                <!-- Submit -->
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __('login.login_btn') }}</button>
                <hr class="my-4">
                <p class="text-center">{{ __('login.no_account') }}<a href="{{ url('/register')}}">{{ __('login.register') }}</a></p>
                <p class="text-center"><a href="recover.php">{{ __('login.forgot_password') }}</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
