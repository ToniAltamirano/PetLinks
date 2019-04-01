@extends('auth.admin.admin')

@section('datos')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ __('admin/subtipos.titleEdit') }}</h5>
    </div>
    <div class="card-body">
        <form class="" action="{{ action('SubtipoController@update', [$subtipos->id]) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNombre">{{ __('admin/subtipos.name') }}</label>
                    <input type="text" class="form-control" id="inputNombre" value="{{ $subtipos->nombre }}" name="nombre" placeholder="{{ __('admin/subtipos.name_placeholder') }}">
                </div>
                <div class="form-froup col-xl-2">
                    <label for="tipo">{{ __('admin/subtipos.type') }}</label>
                    <select id="tipo" class="form-control" name="tipo" required>
                        @foreach ($tipos as $tipo)
                            @if($tipo->id == $subtipos->tipos_id)
                                <option value="{{ $tipo->id }}" selected>{{ $tipo->nombre}}</option>
                            @else
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="gama">{{ __('admin/subtipos.gama') }}</label>
                    <select id="gama" name="gama" class="form-control">
                        @if($subtipos->gama == 'Alta')
                            <option value="1" selected>Alta</option>
                            <option value="2">Media</option>
                            <option value="3">Baja</option>
                        @elseif($subtipos->gama == 'Media')
                            <option value="1">Alta</option>
                            <option value="2" selected>Media</option>
                            <option value="3">Baja</option>
                        @elseif($subtipos->gama == 'Baja')
                            <option value="1">Alta</option>
                            <option value="2">Media</option>
                            <option value="3" selected>Baja</option>
                        @elseif($subtipos->gama == null || $subtipos->gama == '' )
                            <option value="1">Alta</option>
                            <option value="2">Media</option>
                            <option value="3">Baja</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="tipoUnidad">{{ __('admin/subtipos.unidad') }}</label>
                    <input type="text" class="form-control" id="tipoUnidad" value="{{ $subtipos->tipo_unidad }}" name="tipoUnidad" placeholder="{{ __('admin/subtipos.unidad_placeholder') }}">
                </div>
            </div>

            <a href="{{ url('/subtipos') }}" class="btn btn-secondary mt-4">Actualizar</a>
            <button class="btn btn-primary mt-4" type="submit">Añadir</button>
        </form>
    </div>
</div>


@endsection
