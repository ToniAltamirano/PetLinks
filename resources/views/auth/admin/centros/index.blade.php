@extends('auth.admin.admin')

<script> var titulo = 'Centres'; </script>
@section('datos')
<link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
<p>
    <h4>{{ __('admin/centros.index_title') }}</h4>
</p>
@include('partial.errores')
<div class="crud m-2">

    <button type="button" class="btn btn-success" id="createButton" title="Crear">
        <i class="fas fa-plus-circle"></i>
        <form action="" id="formularioCreate" method="GET" hidden></form>
    </button>

    <button type="button" class="btn btn-info" id="editButton" title="Editar" style="padding: 0 0 1px 2px">
        <i class="fas fa-edit"></i>
        <form action="" id="formularioEdit" method="GET" hidden></form>
    </button>

    <button type="button" class="btn btn-danger" id="delete" title="Borrar">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>
<input id="lan" hidden value="{{ Config::get('app.locale') }}">
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
<script type="text/javaScript">

    $('#createButton').on('click', function(event) {
        $('#formularioCreate').attr('action', "centros/create");
        $('#formularioCreate').submit();
    });

    $('#editButton').on('click', function(){

        var rowMultiple = $("#tablePag").DataTable().rows('.selected').data();
        var row = $("#tablePag").DataTable().row('.selected').data();

        if(row == null || row == 'undefined'){
            $('#modalInfoEdit').modal('show');
        }else if(rowMultiple.length > 1){
            $('#modalInfoEditMultiple').modal('show');
        }else{
        //Llamamos al modal
        var id = row[0];
            $('#formularioEdit').attr('action', "centros/" + id + "/edit");
            $('#formularioEdit').submit();
        }

    });

     $('#delete').on('click', function(event) {
        var row = $("#tablePag").DataTable().row('.selected').data();
        // alert(row);
        if(row == null || row == 'undefined'){
            $('#modalInfo').modal('show');
        }else{
           //Llamamos al modal
           $('#modalDelete').modal('show');
        }
    });

    function eliminar(){
        var row = $("#tablePag").DataTable().row('.selected').data();
        var id = row[0];

        $('#formularioDelete').attr('action', "centros/" + id );
        $('#formularioDelete').submit();
    }
    var opcionesLenguaje
    $(document).ready(function () {
        opcionesLenguaje = $('#lan').val();
    });

</script>
<script src="{{ asset('js/events/tabla.js') }}"></script>

@endsection

@extends('auth.admin.modals.modal')
