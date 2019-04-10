@extends('auth.admin.admin')

<script> var titulo = 'Campanyes'; </script>
@section('datos')
<link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
    <p>
        <h4>{{ __('admin/campañas.index_title') }}</h4>
    </p>
    @include('partial.errores')
    <div class="crud m-2">

        <button type="button" class="btn btn-success" id="createButton" title="Crear">
            <i class="fas fa-plus-circle"></i>
            <form action="" id="formularioCreate" method="GET" hidden></form>
        </button>

        <button type="button" class="btn btn-info" id="editButton" style="padding: 0 0 1px 2px">
            <i class="fas fa-edit"></i>
            <form action="" id="formularioEdit" method="GET" hidden></form>
        </button>

        <button type="button" class="btn btn-danger" id="delete" title="Eliminar">
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
    <input id="lan" hidden value="{{ Config::get('app.locale') }}">
    <table id="tablePag" class="table hover stripe display responsive nowrap">
        <thead>
            <tr>
                <th hidden>ID</th>
                <th>{{ __('admin/campañas.index_title_ca') }}</th>
                <th>{{ __('admin/campañas.index_title_en') }}</th>
                <th>{{ __('admin/campañas.index_title_es') }}</th>
                <th>{{ __('admin/campañas.index_url') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns as $campaign)
                <tr>
                    <td hidden>{{ $campaign->id }}</td>
                    <td>{{ $campaign->titulo_ca }}</td>
                    <td>{{ $campaign->titulo_en }}</td>
                    <td>{{ $campaign->titulo_es }}</td>
                    <td>{{ $campaign->url }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script type="text/javaScript">

        $('#createButton').on('click', function(event) {
            $('#formularioCreate').attr('action', "campaigns/create");
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
                $('#formularioEdit').attr('action', "campaigns/" + id + "/edit");
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

            $('#formularioDelete').attr('action', "campaigns/" + id );
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
