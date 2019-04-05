@extends('auth.admin.admin')

@section('datos')

<p>
    <h4>{{ __('admin/subtipos.title') }}</h4>
</p>
@include('partial.errores')
<div class="crud m-2">

    <a href="{{ url('/subtipos/create') }}" class="btn btn-success">
        <button type="button" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>
        </button>
    </a>

    <button type="button" class="btn btn-info " id="editBtnSuptipo">
        <i class="fas fa-edit"></i>
        <form action="" id="editFormSubtipo" method="GET"></form>
    </button>
    <button type="button" class="btn btn-danger" onclick="eliminarSubtipo();">
        <i class="fas fa-trash-alt"></i>
        <form action="" id="suptipoDelete" method="POST">
            @method('delete')
            @csrf
        </form>
    </button>
</div>

<table id="tablePag" class="table hover stripe display responsive nowrap">
    <thead>
        <tr>
            <th hidden>id</th>
            <th>Nombre</th>
            <th>Gama</th>
            <th>Tipo Unidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subtipos as $subtipo)
            <tr>
                <td hidden>{{ $subtipo->id}}</td>
                <td>{{ $subtipo->nombre }}</td>
                <td>{{ $subtipo->gama }}</td>
                <td>{{ $subtipo->tipo_unidad }}</td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection


@section('scripts')

<script src="{{ asset('js/events/tabla.js') }}"></script>
<script type="text/javaScript">

    $('#editBtnSuptipo').on('click', function(){

        var row = $("#tablePag").DataTable().row('.selected').data();
        var id = row[0];

        $('#editFormSubtipo').attr('action', "subtipos/" + id + "/edit");
        $('#editFormSubtipo').submit();

    });


    function eliminarSubtipo(){
        var row = $("#tablePag").DataTable().row('.selected').data();
        var id = row[0];

        $('#suptipoDelete').attr('action', "subtipos/" + id);
        $('#suptipoDelete').submit();
    }

</script>
@endsection
