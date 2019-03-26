@extends('template.master')

@section('titulo', 'Horaris')

@section('contenidor')
<div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-8 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body text-justify">
                        <h1 class="mb-3 text-center card-title">{{ __('info/horaris.title') }}</h1>
                        <p>
                            <strong>{{ __('info/horaris.offices_title') }}</strong>
                            <br>{{ __('info/horaris.offices_text') }}<br>
                        </p>
                        <p>
                            <strong>{{ __('info/horaris.veterinary_title') }}</strong>
                            <br>{{ __('info/horaris.veterinary_text') }}
                            <br>{{ __('info/horaris.veterinary_text_2') }}<br>
                        </p>
                        <p>
                            <strong>{{ __('info/horaris.ccaac_title') }}</strong>
                            <br>{{ __('info/horaris.ccaac_text') }}
                            <br>{{ __('info/horaris.ccaac_text_2') }}
                            <br>{{ __('info/horaris.ccaac_text_3') }}<br>
                        </p>
                        <p>
                            <strong>{{ __('info/horaris.moret_title') }}</strong>
                            <br>{{ __('info/horaris.moret_text') }}
                            <br>{{ __('info/horaris.moret_text_2') }}
                            <br>{{ __('info/horaris.moret_text_3') }}
                        </p>
                        <p>
                            <strong>{{ __('info/horaris.important') }}</strong>
                            {{ __('info/horaris.important_text') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
