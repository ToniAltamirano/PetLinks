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
                    <h1 class="h3 mb-3 text-center font-weight-normal card-title">{{ __('email.title') }}</h1>
                    <hr class="my-4">
                    <p class="mb-3 text-justify font-weight-normal">{{ __('email.desc') }}</p>
                    <form class="form-signin" action="{{ action('Auth\ForgotPasswordController@sendResetLinkEmail') }}" method="post">
                        @csrf
                        <!-- Email -->
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" class="form-control" name="identificador" placeholder="{{ __('email.email') }}" value="{{ old('identificador') }}" required autofocus autocomplete="off">
                        </div>
                        <!-- Submit -->
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __('email.send_btn') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
