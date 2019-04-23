@extends('template.user')

@section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/certificate.css') }}">
@endsection

@section('contenidor')
    <div class="container my-5">
        <div class="jumbotron">
            <div class="row text-center">
                <img class="h-auto mx-auto" src="{{ asset('img/spam_logo.png') }}" alt="imagen">
                <div class="col-md-7 mx-auto text-justify">
                        <h1 class="display-2 text-black-50">CERTIFICADO </h1>
                        <h3 class="display-4"> Arnau Infante Pinós</h3>
                        <p class="lead">Donación: 5 kg pienso</p>
                        <p class="lead">Centro: refugi can pile</p>
                        <p class="lead">Fecha donación: 23/04/2019</p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


