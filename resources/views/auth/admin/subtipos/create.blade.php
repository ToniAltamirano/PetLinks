@extends('auth.admin.admin')

@section('datos')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Nuevo subtipo</h5>
    </div>
    <div class="card-body">
        <form class="" action="{{ action('SubtipoController@store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNombre">Nombre subtipo: </label>
                    <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre subtipo">
                </div>
                <div class="form-froup col-xl-2">
                    <label for="tipo">Tipo: </label>
                    <select id="tipo" class="form-control" name="tipo" required>
                        <option></option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>            
            </div>       
            
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="gama">Gama: </label>
                    <select id="gama" name="gama" class="form-control">
                        <option value="1">Alta</option>
                        <option value="2">Media</option>
                        <option value="3">Baja</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="tipoUnidad">Tipo unidad: </label>
                    <input type="text" class="form-control" id="tipoUnidad" name="tipoUnidad" placeholder="Tipo unidad">
                </div>    
            </div>   

            <a href="{{ url('/subtipos') }}" class="btn btn-secondary mt-4">Volver</a>
            <button class="btn btn-primary mt-4" type="submit">Añadir</button>
        </form>
    </div>
</div>


@endsection
