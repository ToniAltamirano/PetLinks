@extends('auth.admin.admin')

@section('datos')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <div class="container">
        <p>
            <h4>{{ __('admin/subtipos.titleEdit') }}</h4>
        </p>
        @include('partial.errores')
        <form class="" action="{{ action('SubtipoController@update', [$subtipos->id]) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombre">{{ __('admin/subtipos.name') }} *</label>
                    <input type="text" class="form-control" id="inputNombre" value="{{ $subtipos->nombre }}" name="nombre" placeholder="{{ __('admin/subtipos.name_placeholder') }}" required>
                </div>
                <div class="form-froup col-md-6">
                    <label for="tipo">{{ __('admin/subtipos.type') }} *</label>
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
                <div class="form-group col-md-6">
                    <label for="gama">{{ __('admin/subtipos.gama') }} *</label>
                    <select id="gama" name="gama" class="form-control" required>
                        @if($subtipos->gama == 'Alta')
                            <option value="1" selected>{{ __('admin/subtipos.alta') }}</option>
                            <option value="2">{{ __('admin/subtipos.media') }}</option>
                            <option value="3">{{ __('admin/subtipos.baja') }}</option>
                        @elseif($subtipos->gama == 'Media')
                            <option value="1">{{ __('admin/subtipos.alta') }}</option>
                            <option value="2" selected>{{ __('admin/subtipos.media') }}</option>
                            <option value="3">{{ __('admin/subtipos.baja') }}</option>
                        @elseif($subtipos->gama == 'Baja')
                            <option value="1">{{ __('admin/subtipos.alta') }}</option>
                            <option value="2">{{ __('admin/subtipos.media') }}</option>
                            <option value="3" selected>{{ __('admin/subtipos.baja') }}</option>
                        @elseif($subtipos->gama == null || $subtipos->gama == '' )
                            <option value="1">{{ __('admin/subtipos.alta') }}</option>
                            <option value="2">{{ __('admin/subtipos.media') }}</option>
                            <option value="3">{{ __('admin/subtipos.baja') }}</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="tipoUnidad">{{ __('admin/subtipos.unidad') }} *</label>
                    <input type="text" class="form-control" id="tipoUnidad" value="{{ $subtipos->tipo_unidad }}" name="tipoUnidad" placeholder="{{ __('admin/subtipos.unidad_placeholder') }}" required>
                </div>
            </div>
            <div class="col-12 m-0 p-0 mt-2 mb-1">
                <a href="{{ url('/subtipos') }}" class="btn btn-danger">{{ __('admin/subtipos.cancel_btn') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('admin/subtipos.update_btn') }}</button>
            </div>
            <small class="m-0 p-0 mt-2">{{ __('admin/subtipos.required_fields') }}</small>
        </form>
    </div>
@endsection
