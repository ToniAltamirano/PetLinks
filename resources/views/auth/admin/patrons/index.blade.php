@extends('auth.admin.admin')
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <script> var titulo = 'Patrons'; </script>
@section('datos')
<link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
    <p>
        <h4 class="display-4 text-center mt-5">{{ __('admin/macropadrins.title') }}</h4>
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

        <button type="button" class="btn btn-danger" id="delete" title="Eliminar">
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
    <input id="lan" hidden value="{{ Config::get('app.locale') }}">
    <table id="tablePag" class="table hover stripe display responsive nowrap w-100">
        <thead>
            <tr>
                <th class="id" hidden>ID</th>
                <th>{{ __('admin/macropadrins.name') }}</th>
                <th>{{ __('admin/macropadrins.url') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patrons as $patron)
                <tr>
                    <td hidden>{{ $patron->id }}</td>
                    <td>{{ $patron->nombre }}</td>
                    <td>{{ $patron->url }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script type="text/javaScript">

        $('#createButton').on('click', function(event) {
            $('#formularioCreate').attr('action', "patrons/create");
            $('#formularioCreate').submit();
        });

        $('#editButton').on('click', function() {

            var rowMultiple = $("#tablePag").DataTable().rows('.selected').data();
            var row = $("#tablePag").DataTable().row('.selected').data();

            if(row == null || row == 'undefined'){
                $('#modalInfoEdit').modal('show');
            }else if(rowMultiple.length > 1){
                $('#modalInfoEditMultiple').modal('show');
            }else{
            //Llamamos al modal
                var id = row[0];
                $('#formularioEdit').attr('action', "patrons/" + id + "/edit");
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

        function eliminar() {
            var row = $("#tablePag").DataTable().row('.selected').data();
            var id = row[0];

            $('#formularioDelete').attr('action', "patrons/" + id );
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
