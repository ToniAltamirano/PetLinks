@extends('template.master')

@section('titulo', 'Adreces')

@section('contenidor')
    <div class="container">
        <div class="row">
            <div class="card my-5 border-0">
                <div class="card-body">
                    <h1 class="mb-3 text-center card-title">Centres</h1>
                    <div class="row d-flex justify-content-center">
                        @foreach ($centros as $centro)
                            @if ($centro->id != 0)
                                <div class="col-sm-6 col-md-4 mt-4">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="{{ asset('storage/' . $centro->imagen) }}" alt="{{ $centro->nombre }}">
                                        <div class="card-body">
                                            <h4 class="card-title"><i class="fa fa-home mr-2"></i>{{ $centro->nombre }}</h4>
                                            <h6>{{ $centro->descripcion }}</h6>
                                            <p class="card-text">
                                                {{ $centro->direccion }}
                                                <br>
                                                {{ $centro->codigo_postal }} {{ $centro->ciudad }}, {{ $centro->provincia }}
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <i class="material-icons mx-2">phone</i>
                                            <a href="tel:{{ $centro->telefono }}">{{ $centro->telefono }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
