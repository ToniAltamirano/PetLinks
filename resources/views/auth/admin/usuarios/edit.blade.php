@extends('auth.admin.admin')

@section('datos')
    <p>
        <h4>Editar nuevo usuario</h4>
    </p>
    @include('partial.errores')
    <div class="container">
        <form class="" action="{{ action('UsuarioController@update', [$usuario->id]) }}" method="post">
            @method('put')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombre">Nombre: </label>
                    <input type="text" class="form-control" id="inputNombre" name="name" value="{{ $usuario->nombre }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputApellidos">Apellidos: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="apellidos" value="{{ $usuario->apellidos }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombreUsuario">Nombre de usuario: </label>
                    <input type="text" class="form-control" id="inputNombreUsuario" name="nombreUsuario" value="{{ $usuario->nombre_usuario }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCorreo">Correo: </label>
                    <input type="email" class="form-control" id="inputCorreo" name="email"  value="{{ $usuario->email }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputContraseña">Contraseña: </label>
                    <input type="password" class="form-control" id="inputContraseña" name="password"  value="{{ $usuario->password }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="innputRol">Rol: </label>
                    <select id="innputRol" name="rol" class="form-control">
                        @foreach($rols as $rol)
                            @if($rol->id == $usuario->roles_id)
                                <option value="{{ $rol->id }}" selected>{{ $rol->rol}}</option>
                            @else
                                <option value="{{ $rol->id }}">{{ $rol->rol}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar Usuario</button>
        </form>
    </div>

@endsection
