@extends('auth.admin.admin')


@section('datos')

<p>
    <h4>USUARIOS</h4>
</p>

<div class="crud m-2">
    <a  class="btn btn-success align-self-middle" role="button" href="{{ url('/usuarios/create') }}">
        <i class="fas fa-plus-circle"></i>
    </a>

    <button type="button" class="btn btn-info" id="myButton">
        <i class="fas fa-edit"></i>
        <form action="" id="formularioEdit" method="GET"></form>
    </button>

    <button type="button" class="btn btn-danger" onclick="eliminar();">
        <i class="fas fa-trash-alt"></i>
        <form action="" id="formularioDelete" method="POST">
            @method('delete')
            @csrf
        </form>
    </button>
</div>

<table id="tablePag" class="table hover stripe display responsive nowrap">
    <thead>
        <tr>
            <th class="id">id</th>
            <th>Nombre Usuario</th>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Apellidos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nombre_usuario }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->apellidos }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
