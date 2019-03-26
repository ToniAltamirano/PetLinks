@extends('template.master')

@section('titulo', 'SPAM')

@section('contenidor')
    <div class="container">
        <div class="row">
            <div class="card my-5">
                <div class="card-body col-md-10 text-justify mx-auto">
                    <h1 class="mb-3 text-center card-title">{{ __('info/spam.title') }}</h1>
                    <h4>{{ __('info/spam.name') }}</h4>
                    <p>{{ __('info/spam.objective') }}</p>
                    <h4>{{ __('info/spam.main_tasks') }}</h4>
                    <ul>
                        <li><em><strong>{{ __('info/spam.task_1_title') }}</strong></em></li>
                        <p>{{ __('info/spam.task_1_text') }}</p>
                        <li><em><strong>{{ __('info/spam.task_2_title') }}</strong></em></li>
                        <p>{{ __('info/spam.task_2_text') }}</p>
                        <li><em><strong>{{ __('info/spam.task_3_title') }}</strong></em></li>
                        <p>{{ __('info/spam.task_3_text') }}</p>
                        <li><em><strong>{{ __('info/spam.task_4_title') }}</strong></em></li>
                        <p>{{ __('info/spam.task_4_text') }}</p>
                    </ul>
                    <h4>{{ __('info/spam.directors_board') }}</h4>
                    <ul>
                        <li><strong>{{ __('info/spam.president') }}</strong>, Sílvia Serra Lafarga</li>
                        <li><strong>{{ __('info/spam.treasurer') }}</strong>, Marta Masmitjà Prada</li>
                        <li><strong>{{ __('info/spam.secretary') }}</strong>, Roser de Elias</li>
                        <li><strong>{{ __('info/spam.vicepresident') }}</strong>, Núria Garcia i Amat</li>
                        <li><strong>{{ __('info/spam.members') }}</strong>, Irene Mainat, Àfrica Arroyo i Marina Valls</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
