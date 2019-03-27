@extends('template.master')

@section('titulo', 'Fundació DAINA')

@section('contenidor')
<div class="container">
        <div class="row">
            <div class="card my-5">
                <div class="card-body col-md-10 text-justify mx-auto">
                    <h1 class="mb-3 text-center card-title">{{ __('info/daina.title') }}</h1>
                    <p>{{ __('info/daina.article') }}
                        <a href="http://daina.protectoramataro.org/">{{ __('info/daina.foundation_name') }}</a>
                        {{ __('info/daina.description') }}
                    </p>
                    <p>{{ __('info/daina.objectives') }}</p>
                    <ul>
                        <li>{{ __('info/daina.objective_1') }}</li>
                        <li>{{ __('info/daina.objective_2') }}</li>
                        <li>{{ __('info/daina.objective_3') }}</li>
                        <li>{{ __('info/daina.objective_4') }}</li>
                    </ul>
                    <p>{{ __('info/daina.sponsors') }}
                        <a href="http://daina.protectoramataro.org/">{{ __('info/daina.title') }}</a>
                        {{ __('info/daina.contact') }}
                        <a href="mailto:info@fundaciodaina.org">info@fundaciodaina.org</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
