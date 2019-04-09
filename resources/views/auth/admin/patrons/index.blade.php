@extends('auth.admin.admin')

<script> var titulo = 'Patrons'; </script>
@section('datos')
    <p>
        <h4>{{ __('admin/macropadrins.title') }}</h4>
    </p>
    @include('partial.errores')
    <div class="crud m-2">
        <a  class="btn btn-success align-self-middle" role="button" href="{{ url('/patrons/create') }}">
            <i class="fas fa-plus-circle"></i>
        </a>

        <button type="button" class="btn btn-info" id="editButton" title="Editar">
            <i class="fas fa-edit"></i>
            <form action="" id="formularioEdit" method="GET"></form>
        </button>

        <button type="button" class="btn btn-danger" id="delete" title="Eliminar">
            <i class="fas fa-trash-alt"></i>       
        </button>
    </div>
    <input id="lan" hidden value="{{ Config::get('app.locale') }}">
    <table id="tablePag" class="table hover stripe display responsive nowrap">
        <thead>
            <tr>
                <th class="id">ID</th>
                <th>{{ __('admin/macropadrins.name') }}</th>
                <th>{{ __('admin/macropadrins.url') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patrons as $patron)
                <tr>
                    <td>{{ $patron->id }}</td>
                    <td>{{ $patron->nombre }}</td>
                    <td>{{ $patron->url }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script type="text/javaScript">
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