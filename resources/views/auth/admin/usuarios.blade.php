@extends('auth.admin.admin')


@section('datos')

<table id="tablePag" class="table table-striped table-bordered table-hover display">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre Usuario</th>
            <th>Correo</th>                   
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nombre_usuario }}</td>
                <td>{{ $user->correo }}</td> 
            </tr>
        @endforeach
    </tbody>
</table>

@endsection