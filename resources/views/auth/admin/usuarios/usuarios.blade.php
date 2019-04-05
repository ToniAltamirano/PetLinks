@extends('auth.admin.admin')


@section('datos')

<p>
    <h4>{{ __('admin/usuarios.title') }}</h4>
</p>
@include('partial.errores')
<div class="crud m-2">
    <a  class="btn btn-success align-self-middle" role="button" href="{{ url('/usuarios/create') }}">
        <i class="fas fa-plus-circle"></i>
    </a>

    <button type="button" class="btn btn-info" id="myButton" title="Editar">
        <i class="fas fa-edit"></i>
        <form action="" id="formularioEdit" method="GET"></form>
    </button>

    <button type="button" class="btn btn-danger" onclick="eliminar();" title="Eliminar">
        <i class="fas fa-trash-alt"></i>
        <form action="" id="formularioDelete" method="POST">
            @method('delete')
            @csrf
        </form>
    </button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" title="Filtrar">
        <i class="fas fa-filter"></i>
    </button>

</div>

<table id="tablePag" class="table hover stripe display responsive nowrap">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre Usuario</th>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th hidden>Tipo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td id="userId">{{ $user->id }}</td>
                <td>{{ $user->nombre_usuario }}</td>
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
                <option value="1">Admin</option>
                <option value="2">SuperAdmin</option>
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
    $('#myButton').on('click', function(event) {
        // var tr = $('#tablePag tr');
        // $('.selected').each(function() {
        //     var id = $(this).find("td:nth-child(1)").html();
        //     console.log(id);
        // });

        var row = $("#tablePag").DataTable().row('.selected').data();
        alert(row[0]);
        var id = row[0];

        $('#formularioEdit').attr('action', "http://localhost:8080/PetLinks/public/usuarios/" + id + "/edit");
        $('#formularioEdit').submit();


    });

    function eliminar(){
        var row = $("#tablePag").DataTable().row('.selected').data();
        alert(row[0]);
        var id = row[0];

        $('#formularioDelete').attr('action', "http://localhost:8080/PetLinks/public/usuarios/" + id);
        $('#formularioDelete').submit();
    }
</script>

<script src="{{ asset('js/events/tabla.js') }}"></script>

@endsection
