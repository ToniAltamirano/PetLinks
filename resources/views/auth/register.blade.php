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
                        <img class="mb-4 col-12" src="{{ asset('img/spam_logo.png')}}" alt="spAm">
                    </a>
                    <h1 class="h3 mb-3 text-center font-weight-normal card-title">{{ __('register.title') }}</h1>
                    <form class="form-register" action="" method="post">
                        @csrf
                        <!-- Username -->
                        <div class="input-group">
                            <input type="username" id="inputUsername" name="nombre_usuario" class="form-control" placeholder="{{ __('register.username') }}" value="{{ old('nombre_usuario') }}" required autofocus minlength="4" maxlength="45">
                            {{-- <label for="inputUsername">{{ __('register.username') }}</label> --}}
                            <div id="result-username">

                            </div>
                        </div>
                        <!-- Email -->
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="correo" class="form-control" placeholder="{{ __('register.email') }}" value="{{ old('correo') }}" required>
                            <label for="inputEmail">{{ __('register.email') }}</label>
                        </div>
                        <!-- Password -->
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="{{ __('register.password') }}" required>
                            <label for="inputPassword">{{ __('register.password') }}</label>
                        </div>
                        <!-- Repetir password -->
                        <div class="form-label-group">
                            <input type="password" id="inputPassword2" name="password_confirmation" class="form-control" placeholder="{{ __('register.password_repeat') }}" required>
                            <label for="inputPassword2">{{ __('register.password_repeat') }}</label>
                        </div>
                        <!-- Submit -->
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="btn-register">{{ __('register.register_btn') }}</button>
                        <hr class="my-4">
                        <p class="text-center">{{ __('register.have_account') }}<a href="{{ url('/login')}}">{{ __('register.login') }}</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/events/register.js') }}"></script>
@endsection
