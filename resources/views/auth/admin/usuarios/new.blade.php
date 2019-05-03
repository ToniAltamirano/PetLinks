@extends('auth.admin.admin')

@section('datos')
    <p>
        <h4>{{ __('admin/usuarios.title') }}</h4>
    </p>
    @include('partial.errores')
    <div class="container">
        <form action="{{ action('UsuarioController@store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombre">{{ __('admin/usuarios.nombre') }} </label>
                    <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="{{ __('admin/usuarios.placeholder_nombre') }}" value="{{ old('nombre') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputApellidos">{{ __('admin/usuarios.apellidos') }} </label>
                    <input type="text" class="form-control" id="inputApellidos" name="apellidos" placeholder="{{ __('admin/usuarios.placeholder_apellidos') }}" value="{{ old('apellidos') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombreUsuario">{{ __('admin/usuarios.nombreUsuario') }} *</label>
                    <input type="text" class="form-control" id="inputNombreUsuario" name="nombreUsuario" placeholder="{{ __('admin/usuarios.placeholder_nombreUsuario') }}" value="{{ old('nombreUsuario') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCorreo">{{ __('admin/usuarios.email') }} *</label>
                    <input type="email" class="form-control" id="inputCorreo" name="email" placeholder="{{ __('admin/usuarios.placeholder_email') }}" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputContraseña">{{ __('admin/usuarios.password') }} *</label>
                    <input type="password" class="form-control" id="inputContraseña" name="password" placeholder="{{ __('admin/usuarios.placeholder_password') }}">
                </div>
                <div class="form-group col-md-5">
                    <label for="inputRepetirContraseña">{{ __('admin/usuarios.repeatPassword') }} *</label>
                    <input type="password" class="form-control" id="inputRepetirContraseña" name="repeatPassword" placeholder="{{ __('admin/usuarios.placeholder_repeatPassword') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="innputRol">{{ __('admin/usuarios.rol') }} *</label>
                    <select id="innputRol" name="rol" class="form-control">
                        @foreach ($rols as $rol)
                            @if( old('rol') == $rol->id)
                                <option value="{{ $rol->id }}" selected>{{ $rol->rol }}</option>
                            @else
                                <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 m-0 p-0 mt-2 mb-1">
                <a href="{{ url('/usuarios') }}" class="btn btn-danger">{{ __('admin/usuarios.bntReturn') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('admin/usuarios.crearUsuari') }}</button>
            </div>
            <small class="m-0 p-0 mt-2">{{ __('admin/usuarios.required_fields') }}</small>
        </form>
    </div>
@endsection
