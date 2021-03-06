@extends ('template.user')

@section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('titulo', 'LOGIN')

@section('contenidor')

<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin">
                <div class="card-body">
                    <a href="{{ url('/')}}">
                        <img class="mb-4 col-12" src="{{ asset('img/spam_logo.png')}}" alt="spAm">
                    </a>
                    <h1 class="h3 mb-3 text-center font-weight-normal card-title">{{ __('login.title') }}</h1>
                    <form class="form-signin" action="{{ action('Auth\LoginController@login') }}" method="post">
                        @csrf
                        <!-- Username -->
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" class="form-control" name="identificador" placeholder="{{ __('login.username') }}" value="{{ old('identificador') }}" required autofocus autocomplete="off">
                        </div>
                        <!-- Password -->
                        <div class="input-group">
                            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="{{ __('login.password') }}">
                            <div class="input-group-append">
                                <button id="show_password" class="btn" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
                            </div>
                        </div>
                        <!-- Submit -->
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __('login.login_btn') }}</button>
                        <hr class="my-4">
                        <p class="text-center"><a href="{{url('password/reset')}}">{{ __('login.forgot_password') }}</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/events/login.js') }}"></script>
@endsection
