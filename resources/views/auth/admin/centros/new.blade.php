@extends('auth.admin.admin')

@section('datos')
    <div class="container">
        <p>
            <h4>{{ __('admin/centros.create_title') }}</h4>
        </p>
        @include('partial.errores')
        <form action="{{ action('CentroController@store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">{{ __('admin/centros.name') }} *</label>
                    <input type="text" name="nombre" id="txtNombre" class="form-control col-12" placeholder="{{ __('admin/centros.place_name') }}" value="{{ old('nombre') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="descripcion">{{ __('admin/centros.desc') }}</label>
                    <input type="textarea" name="descripcion" id="txtDesc" class="form-control col-12" placeholder="{{ __('admin/centros.place_desc') }}" value="{{ old('descripcion') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="telefono">{{ __('admin/centros.telephone') }} *</label>
                    <input type="text" name="telefono" id="txtNombre" class="form-control col-12" placeholder="{{ __('admin/centros.place_telephone') }}" value="{{ old('telefono') }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="direccion">{{ __('admin/centros.address') }} *</label>
                    <input type="text" name="direccion" id="txtDireccion" class="form-control col-12" placeholder="{{ __('admin/centros.place_address') }}" value="{{ old('direccion') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="codigo_postal">{{ __('admin/centros.zipcode') }} *</label>
                    <input type="text" name="codigo_postal" id="txtCodigoPostal" class="form-control col-12" placeholder="{{ __('admin/centros.place_zipcode') }}" value="{{ old('codigo_postal') }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ciudad">{{ __('admin/centros.city') }} *</label>
                    <input type="text" name="ciudad" id="txtCiudad" class="form-control col-12" placeholder="{{ __('admin/centros.city') }}" value="{{ old('ciudad') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="provincia">{{ __('admin/centros.province') }} *</label>
                    <select name="provincia" id="txtProvincia" class="form-control col-12" required>
                        @foreach ($provincias as $provincia)
                            @if ($provincia == old('provincia'))
                                <option value="{{ $provincia }}" selected> {{ $provincia }}</option>
                            @else
                                <option value="{{ $provincia }}"> {{ $provincia }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="imagen">{{ __('admin/centros.image') }} *</label>
                    <img id="imgCentre" class="rounded mx-auto d-block col-6 mb-2" style="max-width: 450px; max-height: 300px">
                    <div class="custom-file">
                        <label id="imgName" class="custom-file-label" for="inputImg">{{ __('admin/centros.chooser') }}</label>
                        <input type="file" class="custom-file-input" name="imagen" id="inputImg" aria-describedby="inputGroupFileAddon01" required>
                    </div>
                </div>
            </div>
            <div class="col-12 m-0 p-0 mt-2 mb-1">
                <a href="{{ url('/centros') }}" class="btn btn-danger">{{ __('admin/centros.btn_back') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('admin/centros.btn_submit') }}</button>
            </div>
            <small class="m-0 p-0 mt-2">{{ __('admin/centros.required_fields') }}</small>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/events/centers.js') }}"></script>
@endsection
