@extends('auth.admin.admin')
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
@section('datos')
<link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
<script>
    var titulo = 'Usuarios';
</script>

<p>
    <h4 class="display-4 text-center mt-5">{{ __('admin/usuarios.title') }}</h4>
</p>
@include('partial.errores')
<div class="crud m-2">
    {{-- <a  class="btn btn-success align-self-middle" role="button" href="{{ url('/usuarios/create') }}">
        <i class="fas fa-plus-circle"></i>
    </a> --}}

    <button type="button" class="btn btn-success" id="createButton" title="Crear">
        <i class="fas fa-plus-circle"></i>
        <form action="" id="formularioCreate" method="GET" hidden></form>
    </button>

    <button type="button" class="btn btn-info" id="myButton" title="Editar" style="padding: 0 0 1px 2px">
        <i class="fas fa-edit"></i>
        <form action="" id="formularioEdit" method="GET" hidden></form>
    </button>

    <button type="button" class="btn btn-danger" id="delete" title="Eliminar">
        <i class="fas fa-trash-alt"></i>
    </button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" title="Filtrar">
        <i class="fas fa-filter"></i>
    </button>

</div>

<input id="lan" hidden value="{{ Config::get('app.locale') }}">
<table id="tablePag" class="table hover stripe display responsive nowrap w-100">
    <thead>
        <tr>
            <th>{{ __('admin/usuarios.username') }}</th>
            <th hidden>id</th>
            <th>{{ __('admin/usuarios.email') }}</th>
            <th>{{ __('admin/usuarios.name') }}</th>
            <th>{{ __('admin/usuarios.surnames') }}</th>
            <th hidden>Tipo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->nombre_usuario }}</td>
                <td id="userId" hidden>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->apellidos }}</td>
                <td hidden id="tipoUser"> {{ $user->roles_id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Filtros usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <label for="innputRol">Tipo usuario: </label>
            <select id="innputRol" name="rol" class="form-control">
                <option value="0" selected>Todos</option>
                <option value="1">Trabajador</option>
                <option value="2">Admin</option>
            </select>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="filtrar" id="filtro" class="btn btn-primary">Aplicar</button>
        </div>
    </div>
    </div>
</div>

@section('scripts')
<script type="text/javaScript">



</script>

<script src="{{ asset('js/events/usuarios.js') }}"></script>
<script src="{{ asset('js/events/tabla.js') }}"></script>


@endsection

@extends('auth.admin.modals.modal')
