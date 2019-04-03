@extends('auth.admin.admin')

@section('datos')
    <div class="card rounded-0">
        <div class="card-header border-0 bg-white">
            <h5 class="card-title text-center">{{ __('admin/centros.edit_title') }}</h5>
            @include('partial.errores')
        </div>
        <div class="card-body border-0">
            <form action=" {{ action('CentroController@update', [$centro->id]) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                    <div class="form-group row offset-1">
                        <label class="col-md-1" for="nombre">{{ __('admin/centros.name') }}</label>
                        <input type="text" name="nombre" id="txtNombre" class="form-control col-md-6" placeholder="{{ __('admin/centros.place_name') }}" value="{{ $centro->nombre }}"> {{ old('nombre') }}
                    </div>
                    <div class="form-group row offset-1">
                        <label class="col-md-1" for="descripcion">{{ __('admin/centros.desc') }}</label>
                        <input type="textarea" name="descripcion" id="txtDesc" class="form-control col-md-6" placeholder="{{ __('admin/centros.place_desc') }}" value="{{ $centro->descripcion }}"> {{ old('descripcion') }}
                    </div>
                    <div class="form-group row offset-1">
                        <label class="col-md-1" for="telefono">{{ __('admin/centros.telephone') }}</label>
                        <input type="text" name="telefono" id="txtNombre" class="form-control col-md-6" placeholder="{{ __('admin/centros.place_telephone') }}" value="{{ $centro->telefono }}">{{ old('telefono') }}
                    </div>
                    <div class="form-group offset-1">
                        <label class="col-md-1" for="imagen">{{ __('admin/centros.image') }}</label>
                        <img src="{{ asset('storage/'. $centro->imagen)}}" class="mx-auto mb-4" alt="">
                        <div class="row">
                            <div class="custom-file offset-1 col-md-6">
                                <input type="file" class="custom-file-input col-md-6" name="imagen" id="inputImg" aria-describedby="inputGroupFileAddon01" value="">
                                <label id="imgName" class="custom-file-label" for="inputImg">{{ __('admin/centros.chooser') }}</label>
                            </div>
                        </div>
                     </div>
                    <h5 class="mb-3 offset-1"> {{ __('admin/centros.address_title') }}</h5>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row offset-2">
                            <label class="col-md-2" for="direccion">{{ __('admin/centros.address') }}</label>
                            <input type="text" name="direccion" id="txtDireccion" class="form-control col-md-9" placeholder="{{ __('admin/centros.place_address') }}" value="{{ $centro->direccion }}">{{ old('direccion') }}
                        </div>
                        <div class="form-group row offset-2">
                            <label class="col-md-2" for="codigo_postal">{{ __('admin/centros.zipcode') }}</label>
                            <input type="text" name="codigo_postal" id="txtCodigoPostal" class="form-control col-md-4" placeholder="{{ __('admin/centros.place_zipcode') }}" value="{{ $centro->codigo_postal }}">{{ old('codigo_postal') }}
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2" for="ciudad">{{ __('admin/centros.city') }}</label>
                            <input type="text" name="ciudad" id="txtCiudad" class="form-control col-md-6" placeholder="{{ __('admin/centros.city') }}" value="{{ $centro->ciudad }}">{{ old('ciudad') }}
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="provincia">{{ __('admin/centros.province') }}</label>
                            <select name="provincia" id="txtProvincia" class="form-control col-md-6">
                                @foreach ($provincias as $provincia)
                                    @if ($provincia == $centro->provincia)
                                        <option value="{{ $provincia }}" selected> {{ $provincia }}</option>
                                    @else
                                        <option value="{{ $provincia }}"> {{ $provincia }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="mx-auto">
                <div class="form-group row">
                    <a href="{{ url('/centros') }}" role="button" class=" btn btn-danger offset-1">{{ __('admin/centros.btn_back') }}</a>
                    <input type="submit" class="ml-1 btn btn-primary" value="{{ __('admin/centros.btn_submit') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
