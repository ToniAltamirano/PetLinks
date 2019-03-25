@extends('auth.admin.admin')

@section('datos')
    <p>
        <h4>USUARIOS</h4>
    </p>

    <div class="crud m-2">
        <a  class="btn btn-success align-self-middle" role="button" href="{{ url('/campaigns/create') }}">
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
                <th class="id">ID</th>
                <th>Título CA</th>
                <th>EN</th>
                <th>ES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns as $campaign)
                <tr>
                    <td>{{ $campaign->id }}</td>
                    <td>{{ $campaign->titulo_ca }}</td>
                    <td>{{ $campaign->titulo_en }}</td>
                    <td>{{ $campaign->titulo_es }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
