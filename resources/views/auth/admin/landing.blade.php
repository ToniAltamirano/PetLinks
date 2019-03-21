@extends('template.master')

@section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endsection

@section('titulo', 'PETLINKS')

@section('contenidor')

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 mb-4 mt-3 h-100">
            <div class="card rounded-0 bg-dark text-white card-landing h-100">
                <div class="card-header border-0">
                    <h2>Afegir donació</h2>
                </div>
                <div class="card-body text-right card-landing">
                    <i class="material-icons md-48 big">add</i>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 mb-4 mt-3 h-100">
            <div class="card card-landing h-50 mb-3">
                <div class="card-body bg-dark text-white card-landing">
                    <h2>Afegir donant</h2>
                    <i class="material-icons md-48 big text-inline">person_add</i>
                </div>
            </div>

            <div class="card card-landing h-50">
                <div class="card-body bg-dark text-white card-landing">
                    <h2>Veure estadístiques</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
