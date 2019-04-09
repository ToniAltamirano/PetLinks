@extends('auth.admin.admin')

<script> var titulo = 'Tipos'; </script>
@section('datos')
    <p>
        <h4>{{ __('admin/tipos.index_tittle') }}</h4>
    </p>
    @include('partial.errores')
    <div class="crud m-2">

        <a href="{{ url('/tipos/create') }}" class="btn btn-success" title="">
            <button type="button" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i>
            </button>
        </a>

        <button type="button" class="btn btn-info " id="editBtnTipo" title="Editar">
            <i class="fas fa-edit"></i>
            <form action="" id="editFormTipo" method="GET"></form>
        </button>
        <button type="button" class="btn btn-danger" id="delete" title="Borrar">
            <i class="fas fa-trash-alt"></i>
            <form action="" id="tipoDelete" method="POST">
                @method('delete')
                @csrf
            </form>
        </button>
    </div>
    <input id="lan" hidden value="{{ Config::get('app.locale') }}">
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

            var rowMultiple = $("#tablePag").DataTable().rows('.selected').data();
            var row = $("#tablePag").DataTable().row('.selected').data();

            if(row == null || row == 'undefined'){
                $('#modalInfoEdit').modal('show');
            }else if(rowMultiple.length > 1){
                $('#modalInfoEditMultiple').modal('show');
            }else{
            //Llamamos al modal
                var id = row[0];
                $('#editFormTipo').attr('action', "tipos/" + id + "/edit");
                $('#editFormTipo').submit();
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

            $('#tipoDelete').attr('action', "tipos/" + id);
            $('#tipoDelete').submit();
        }
        var opcionesLenguaje
        $(document).ready(function () {
            opcionesLenguaje = $('#lan').val();
        });
    </script>
    <script src="{{ asset('js/events/tabla.js') }}"></script>
@endsection

@extends('auth.admin.modals.modal')