@extends('auth.admin.admin')

<script> var titulo = 'Centres'; </script>
@section('datos')

<p>
    <h4>{{ __('admin/centros.index_title') }}</h4>
</p>
@include('partial.errores')
<div class="crud m-2">
    <a  class="btn btn-success align-self-middle" role="button" href="{{ url('/centros/create') }}">
        <i class="fas fa-plus-circle"></i>
    </a>

    <button type="button" class="btn btn-info" id="editButton">
        <i class="fas fa-edit"></i>
        <form action="" id="formularioEdit" method="GET"></form>
    </button>

    <button type="button" class="btn btn-danger" onclick="deleteCenter();">
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
            <th class="id" hidden>id</th>
            <th> {{ __('admin/centros.name') }}</th>
            <th> {{ __('admin/centros.desc') }}</th>
            <th> {{ __('admin/centros.telephone') }}</th>
            <th> {{ __('admin/centros.address') }}</th>
            <th> {{ __('admin/centros.city') }}</th>
            <th> {{ __('admin/centros.zipcode') }}</th>
            <th> {{ __('admin/centros.province') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($centros as $centro)
            <tr>
                <td hidden>{{ $centro->id }}</td>
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

@section('scripts')
<script src="{{ asset('js/events/tabla.js') }}"></script>
<script type="text/javaScript">

    $('#editButton').on('click', function(){

        var row = $("#tablePag").DataTable().row('.selected').data();
        var id = row[0];

        $('#formularioEdit').attr('action', "centros/" + id + "/edit");
        $('#formularioEdit').submit();

    });

    function deleteCenter(){
        var row = $("#tablePag").DataTable().row('.selected').data();
        var id = row[0];

        $('#formularioDelete').attr('action', "centros/" + id );
        $('#formularioDelete').submit();
    }

</script>

@endsection
