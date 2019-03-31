@extends('auth.admin.admin')

@section('datos')
    <p>
        <h4>{{ __('admin/tipos.index_tittle') }}</h4>
    </p>

    <div class="crud m-2">

        <a href="{{ url('/tipos/create') }}" class="btn btn-success" title="">
            <button type="button" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i>
            </button>
        </a>

        <button type="button" class="btn btn-info " id="editBtnTipo">
            <i class="fas fa-edit"></i>
            <form action="" id="editFormTipo" method="GET"></form>
        </button>
        <button type="button" class="btn btn-danger" onclick="eliminarTipo();">
            <i class="fas fa-trash-alt"></i>
            <form action="" id="tipoDelete" method="POST">
                @method('delete')
                @csrf
            </form>
        </button>
    </div>

    <table id="tablePag" class="table hover stripe display responsive nowrap">
        <thead>
            <tr>
                <th hidden>id</th>
                <th>{{ __('admin/tipos.index_table_name') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipos as $tipo)
                <tr>
                    <td hidden>{{ $tipo->id}}</td>
                    <td>{{ $tipo->nombre }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection

@section('scripts')
    <script type="text/javaScript">

        $('#editBtnTipo').on('click', function(){

            var row = $("#tablePag").DataTable().row('.selected').data();
            var id = row[0];

            $('#editFormTipo').attr('action', "tipos/" + id + "/edit");
            $('#editFormTipo').submit();

        });

        function eliminarTipo(){
            var row = $("#tablePag").DataTable().row('.selected').data();
            var id = row[0];

            $('#tipoDelete').attr('action', "tipos/" + id);
            $('#tipoDelete').submit();
        }
    </script>
@endsection
