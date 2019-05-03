@extends('template.master')

@section('titulo', 'Contacta')

@section('contenidor')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-8 mx-auto">
                <div class="card card-signin my-5">
                    @include('partial.errores')
                    <div class="card-body">
                        <h1 class="h3 mb-3 text-center font-weight-normal card-title">{{ __('info/contacto.title') }}</h1>
                        <form class="form-signin" action="{{ action('ContactUsController@store') }}" method="post">
                            @csrf
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">{{ __('info/contacto.email') }}</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="{{ __('info/contacto.email_placeholder') }}" value="{{ old('email') }}" required autofocus>
                            </div>
                            <!-- Nombre -->
                            <div class="form-group">
                                <label for="nombre">{{ __('info/contacto.name') }}</label>
                                <input type="text" id="nombre" class="form-control" name="name" placeholder="{{ __('info/contacto.name_placeholder') }}" value="{{ old('email') }}" required>
                            </div>
                            <!-- Missatge -->
                            <div class="form-group">
                                <label for="message">{{ __('info/contacto.message') }}</label>
                                <textarea id="message" class="form-control" name="message" placeholder="{{ __('info/contacto.message_placeholder') }}" value="{{ old('email') }}" rows="5" required></textarea>
                            </div>
                            <!-- Submit -->
                            <div class="text-center">
                                <button class="btn btn-lg col-md-4 btn-primary text-uppercase" type="submit">{{ __('info/contacto.contacto_btn') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
