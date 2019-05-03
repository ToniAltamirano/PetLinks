@extends('template.master')

@section('titulo', 'Macropadrins')

@section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/macropadrins.css') }}">
@endsection

@section('contenidor')
    <div class="container">
        <div class="row">
            <div class="card my-5">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        @foreach ($patrons as $patron)
                            <div class="col-sm-6 col-md-3 mt-4 text-center">
                                <div class="card h-100 image-container">
                                    <a href="{{ $patron->url }}">
                                        <img class="card-img" src="{{ asset("storage/" . $patron->imagen) }}" alt="{{ $patron->nombre }}">
                                    </a>
                                    <div class="image-div card-img-overlay text-center h-100">
                                        <h5 class="card-title text-white mt-5">{{ $patron->nombre }}</h5>
                                        <a name="" id="" class="btn btn-primary" href="{{ $patron->url }}" role="button">
                                            Visitar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
