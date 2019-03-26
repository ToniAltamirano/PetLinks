@extends('template.master')

@section('titulo', 'Contacta')

@section('contenidor')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-8 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h1 class="h3 mb-3 text-center font-weight-normal card-title">{{ __('info/contacto.title') }}</h1>
                        <form class="form-signin" action="" method="post">
                            @csrf
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">{{ __('info/contacto.email') }}</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="{{ __('info/contacto.email_placeholder') }}" value="{{ old('email') }}" required autofocus>
                            </div>
                            <!-- Nombre -->
                            <div class="form-group">
                                <label for="nombre">{{ __('info/contacto.name') }}</label>
                                <input type="text" id="nombre" class="form-control" name="nombre" placeholder="{{ __('info/contacto.name_placeholder') }}" value="{{ old('email') }}" required>
                            </div>
                            <!-- Missatge -->
                            <div class="form-group">
                                <label for="nombre">{{ __('info/contacto.message') }}</label>
                                <textarea id="nombre" class="form-control" name="nombre" placeholder="{{ __('info/contacto.message_placeholder') }}" value="{{ old('email') }}" rows="5" required></textarea>
                            </div>
                            <!-- Submit -->
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __('info/contacto.contacto_btn') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
