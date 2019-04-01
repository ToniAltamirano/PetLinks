@extends ('template.user')

@section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('titulo', 'RESET PASSWORD')

@section('contenidor')

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <a href="{{ url('/')}}">
                        <img class="mb-4 col-12" src="{{ asset('img/spam_logo.png')}}" alt="spAm">
                    </a>
                    <h1 class="h3 mb-3 text-center font-weight-normal card-title">{{ __('reset_pass.title') }}</h1>
                    <hr class="my-4">
                    <p class="mb-3 text-justify font-weight-normal">{{ __('reset_pass.desc') }}</p>
                    <form class="form-signin" action="{{ action('Auth\ResetPasswordController@reset') }}" method="post">
                        @csrf
                        <!-- Password -->
                        <div class="form-label-group">
                            <input type="password" id="password" class="form-control" name="password"  required autofocus autocomplete="off" placeholder="{{ __('reset_pass.password') }}">
                        </div>
                        <!-- Password Confirmation -->
                        <div class="form-label-group">
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="{{ __('reset_pass.password_repeat') }}" required autocomplete="off">
                        </div>
                        <!-- Submit -->
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __('reset_pass.reset_btn') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
