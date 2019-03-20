@extends('auth.admin.admin')


@section('datos')

<p>
    <h4>USUARIOS</h4>
</p>

<div class="crud m-2">
    <button type="button" class="btn btn-success">
        <i class="fas fa-plus-circle"></i>
    </button>
    <button type="button" class="btn btn-info ">
        <i class="fas fa-edit"></i>
    </button>
    <button type="button" class="btn btn-danger">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>

<table id="tablePag" class="table hover stripe display responsive nowrap">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre Usuario</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nombre_usuario }}</td>
                <td>{{ $user->correo }}</td>
            </tr>
        @endforeach --}}
    </tbody>
</table>

@endsection
