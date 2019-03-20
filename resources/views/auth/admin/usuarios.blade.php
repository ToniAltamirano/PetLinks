@extends('auth.admin.admin')


@section('datos')

<p>
    <h4>USUARIOS</h4>
</p>

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
