@extends('template.master')

@section('titulo', 'Macropadrins')

@section('contenidor')
    <div class="container">
            <div class="row">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            @foreach ($patrons as $patron)
                                <div class="col-sm-6 col-md-3 mt-4 text-center">
                                    <div class="card h-100">
                                        <a href="{{ $patron->url }}">
                                            <img class="card-img-top" src="{{ $patron->imagen }}" alt="{{ $patron->nombre }}">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $patron->nombre }}</h5>
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
