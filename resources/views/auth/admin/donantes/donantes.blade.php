@extends('auth.admin.admin')

@section('datos')

<p>
    <h4>DONANTES</h4>
</p>

<div class="crud m-2">

    <a href="{{ url('/donantes/create') }}" class="btn btn-success">
        <button type="button" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>
        </button>
    </a>

    <button type="button" class="btn btn-info " id="editBtnDonantes">
        <i class="fas fa-edit"></i>
        <form action="" id="editFormDonante" method="GET"></form>
    </button>
    <button type="button" class="btn btn-danger" onclick="eliminarDonante();">
        <i class="fas fa-trash-alt"></i>
        <form action="" id="donantesDelete" method="POST">
            @method('delete')
            @csrf
        </form>
    </button>
</div>

<table id="tablePag" class="table hover stripe display responsive nowrap">
    <thead>
        <tr>
            <th hidden>id</th>
            <th >Nombre</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Poblacion</th>
            <th>Fecha alta</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($donantes as $donante)
            <tr>
                <td hidden>{{ $donante->id}}</td>
                <td>{{ $donante->nombre }}</td>
                <td>{{ $donante->telefono }}</td>
                <td>{{ $donante->correo }}</td>
                <td>{{ $donante->poblacion }}</td>
                <td>{{ $donante->fecha_alta }}</td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection


@section('scripts')
<script type="text/javaScript">

    $('#editBtnDonantes').on('click', function(){

        var row = $("#tablePag").DataTable().row('.selected').data();
        var id = row[0];

        $('#editFormDonante').attr('action', "donantes/" + id + "/edit");
        $('#editFormDonante').submit();

    });


    function eliminarDonante(){
        var row = $("#tablePag").DataTable().row('.selected').data();
        var id = row[0];

        $('#donantesDelete').attr('action', "donantes/" + id);
        $('#donantesDelete').submit();
    }

</script>
@endsection
