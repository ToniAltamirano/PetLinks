@extends('auth.admin.admin')


@section('datos')

<p>
    <h4>DONACIONES</h4>
</p>

<div class="crud m-2">

    <a href="{{ url('/donaciones/create') }}" class="btn btn-success">
        <button type="button" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>
        </button>
    </a>

    <button type="button" class="btn btn-info ">
        <i class="fas fa-edit"></i>
    </button>
    <button type="button" class="btn btn-danger">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>

<table id="tablePag" class="table hover stripe display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donativos as $donativo)
                <tr>
                    <td hidden>{{ $donativo->id}}</td>
                    <td>{{ $donativo->subtipos()->nombre }}</td>
                    <td>{{ $donativo->centros_receptor_id }}</td>
                    <td>{{ $donativo->users_id }}</td>
                    <td>{{ $donativo->usuario_receptor }}</td>
                    <td>{{ $donativo->fecha_donativo }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endsection
