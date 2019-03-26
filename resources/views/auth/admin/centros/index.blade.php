@extends('auth.admin.admin')

@section('datos')

<p>
    <h4>{{ __('centros/index.title') }}</h4>
</p>

<div class="crud m-2">
    <a  class="btn btn-success align-self-middle" role="button" href="{{ url('/centros/create') }}">
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

<table id="tablePag" class="table hover stripe display responsive nowrap col-12">
    <thead>
        <tr>
            <th> {{ __('centros/index.name') }}</th>
            <th> {{ __('centros/index.desc') }}</th>
            <th> {{ __('centros/index.telephone') }}</th>
            <th> {{ __('centros/index.address') }}</th>
            <th> {{ __('centros/index.city') }}</th>
            <th> {{ __('centros/index.zipcode') }}</th>
            <th> {{ __('centros/index.province') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($centros as $centro)
            <tr>
                <td>{{ $centro->nombre }}</td>
                <td>{{ $centro->descripcion }}</td>
                <td>{{ $centro->telefono }}</td>
                <td>{{ $centro->direccion }}</td>
                <td>{{ $centro->ciudad }}</td>
                <td>{{ $centro->codigo_postal }}</td>
                <td>{{ $centro->provincia }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
