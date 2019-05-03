@extends('auth.admin.admin')

@section('datos')
    <p>
        <h4>{{ __('admin/usuarios.title') }}</h4>
    </p>
    @include('partial.errores')
    <div class="container">
        <form class="" action="{{ action('UsuarioController@update', [$usuario->id]) }}" method="post">
            @method('put')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombre">{{ __('admin/usuarios.nombre') }}: </label>
                    <input type="text" class="form-control" id="inputNombre" placeholder="{{ __('admin/usuarios.placeholder_nombre') }}" name="name" value="{{ $usuario->nombre }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputApellidos">{{ __('admin/usuarios.apellidos') }}: </label>
                    <input type="text" class="form-control" id="inputApellidos" placeholder="{{ __('admin/usuarios.placeholder_apellidos') }}" name="apellidos" value="{{ $usuario->apellidos }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNombreUsuario">{{ __('admin/usuarios.nombreUsuario') }}: </label>
                    <input type="text" class="form-control" id="inputNombreUsuario" placeholder="{{ __('admin/usuarios.placeholder_nombreUsuario') }}" name="nombreUsuario" value="{{ $usuario->nombre_usuario }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCorreo">{{ __('admin/usuarios.email') }}: </label>
                    <input type="email" class="form-control" id="inputCorreo" name="email"  placeholder="{{ __('admin/usuarios.placeholder_email') }}"  value="{{ $usuario->email }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="innputRol">{{ __('admin/usuarios.rol') }}: </label>
                    <select id="innputRol" name="roles_id" class="form-control">
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
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col">
                                <label for="inputContraseña">{{ __('admin/usuarios.password') }}: </label>
                                <input type="password" class="form-control" id="inputNewContraseña" name="newPassword" placeholder="{{ __('admin/usuarios.placeholder_password') }}">
                            </div>
                            <div class="form-group col">
                                <label for="inputRepetirContraseña">{{ __('admin/usuarios.repeatPassword') }} </label>
                                <input type="password" class="form-control" id="inputRepetirContraseña" name="newPassword" placeholder="{{ __('admin/usuarios.placeholder_repeatPassword') }}">
                                <div class="invalid-feedback mb-2">
                                    Las contraseñas no coinciden!
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="changePassword" class="btn btn-primary">Cambiar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 m-0 p-0 mt-2 mb-1">
                <a href="{{ url('/usuarios') }}" class="btn btn-danger">{{ __('admin/usuarios.bntReturn') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('admin/usuarios.editarUsuari') }}</button>
            </div>
            <small class="m-0 p-0 mt-2">{{ __('admin/usuarios.required_fields') }}</small>
            @if( Auth::user()->roles_id == 2 )
                <button class="btn btn-success" data-toggle="modal" id="modalPass" type="button" data-target="#exampleModal">Cambiar contraseña</button>
            @endif
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javaScript">
        $('#modalPass').on('click', function(event) {
            $('#inputRepetirContraseña').val('');
            $('#inputNewContraseña').val('');
            $('#inputRepetirContraseña').removeClass('is-invalid');
        });

        $(".form-control").change(function(){
            $('#changePassword').removeAttr("data-dismiss");
            if($('#inputNewContraseña').val() === $('#inputRepetirContraseña').val()){
                $('#changePassword').attr("data-dismiss","modal");
            }
        });

        $('#changePassword').on('click', function(event) {
            console.log('hssola');
            if($('#inputNewContraseña').val() != $('#inputRepetirContraseña').val()){
                var passs = $('#inputNewContraseña').val();
                $('#inputRepetirContraseña').addClass('is-invalid');
            }else{
                var passs = $('#inputNewContraseña').val();
            }
        });
    </script>
@endsection

