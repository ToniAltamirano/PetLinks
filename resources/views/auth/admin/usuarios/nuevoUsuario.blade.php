@extends('auth.admin.admin')

@section('datos')
    <p>
        <h4>Crear nuevo usuario</h4>
    </p>
    @include('partial.errores')
    <div class="container">
        <form class="" action="{{ action('UsuarioController@store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombre">Nombre: </label>
                    <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Introduce el nombre" value="{{ old('nombre') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputApellidos">Apellidos: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="apellidos" placeholder="Introduce los apellidos" value="{{ old('apellidos') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombreUsuario">Nombre de usuario: </label>
                    <input type="text" class="form-control" id="inputNombreUsuario" name="nombreUsuario" placeholder="Introduce el nombre de usuario" value="{{ old('nombre_usuario') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCorreo">Correo: </label>
                    <input type="email" class="form-control" id="inputCorreo" name="email" placeholder="Introduce el correo electrónico" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputContraseña">Contraseña: </label>
                    <input type="password" class="form-control" id="inputContraseña" name="password" placeholder="Introduce la contraseña">
                </div>
                <div class="form-group col-md-5">
                    <label for="inputRepetirContraseña">Repetir contraseña: </label>
                    <input type="password" class="form-control" id="inputRepetirContraseña" name="repeatPassword" placeholder="Repite la contraseña">
                </div>
                <div class="form-group col-md-2">
                    <label for="innputRol">Rol: </label>
                    <select id="innputRol" name="rol" class="form-control">
                        <option value="1" selected>Admin</option>
                        <option value="2">SuperAdmin</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>
    </div>

@endsection
