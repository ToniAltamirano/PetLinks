@extends('auth.admin.admin')
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <script> var titulo = 'Donants'; </script>
@section('datos')
<link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
<p>
    <h4 class="display-4 text-center mt-5">{{ __('admin/donantes.title') }}</h4>
</p>
@include('partial.errores')
<div class="crud m-2">

    <button type="button" class="btn btn-success" id="createButton" title="Crear">
        <i class="fas fa-plus-circle"></i>
        <form action="" id="formularioCreate" method="GET" hidden></form>
    </button>

    <button type="button" class="btn btn-info " id="editBtnDonantes" title="Editar" style="padding: 0 0 1px 2px">
        <i class="fas fa-edit"></i>
        <form action="" id="editFormDonante" method="GET" hidden></form>
    </button>

    <button type="button" class="btn btn-danger" id="delete" title="Borrar">
        <i class="fas fa-trash-alt"></i>
    </button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" title="Filtrar">
        <i class="fas fa-filter"></i>
    </button>

    Buscador:
    <input type="text" id="buscador" placeholder="Búsqueda por DNI/Email">

</div>
<input id="lan" hidden value="{{ Config::get('app.locale') }}">
<table id="tablePag" class="table hover stripe display responsive nowrap w-100">
    <thead>
        <tr>
            {{-- .{{ __('admin/usuarios.username') }} --}}
            <th >{{ __('admin/donantes.nombre') }}</th>
            <th hidden>id</th>
            <th hidden>tipos_donante_id</th>
            <th hidden>es_habitual</th>
            <th hidden>tiene_animales</th>
            <th hidden>poblacion</th>
            <th hidden>pais</th>
            <th hidden>colaborador</th>
            <th hidden>tipoColaboracion</th>
            <th>{{ __('admin/donantes.telefono') }}</th>
            <th>{{ __('admin/donantes.correo') }}</th>
            <th>{{ __('admin/donantes.poblacion') }}</th>
            <th>{{ __('admin/donantes.fechaAlta') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($donantes as $donante)
            <tr>
                <td>{{ $donante->nombre }}</td>
                <td hidden>{{ $donante->id}}</td>
                <td hidden>{{ $donante->tipos_donantes_id }}</td>
                <td hidden>{{ $donante->es_habitual}}</td>
                <td hidden>{{ $donante->tiene_animales}}</td>
                <td hidden>{{ $donante->poblacion }}</td>
                <td hidden>{{ $donante->pais}}</td>
                <td hidden>{{ $donante->es_colaborador}}</td>
                <td hidden>{{ $donante->tipo_colaboracion }}</td>
                <td>{{ $donante->telefono }}</td>
                <td>{{ $donante->correo }}</td>
                <td>{{ $donante->poblacion }}</td>
                <td>{{ $donante->fecha_alta }}</td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Filtros usuarios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-froup col-md-4">
                        <label for="tipoDonante">Tipo donante: </label>
                        <select id="tipoDonante" name="donante" class="form-control">
                            <option value="0" selected>Todos</option>
                            <option value="1">Anonim</option>
                            <option value="2">Particular</option>
                            <option value="3">Empresa</option>
                        </select>
                    </div>
                    <div class="form-froup col-md-4">
                        <label for="habitual">Habituals? </label>
                        <select id="habitual" name="habitual" class="form-control">
                            <option value="0" selected>Ambos</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                    <div class="form-froup col-md-4">
                        <label for="tieneAnimales">Tiene animales? </label>
                        <select id="tieneAnimales" name="habitual" class="form-control">
                            <option value="0" selected>Ambos</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-froup col-md-4">
                        <label for="poblacion">Poblacion: </label>
                        <input type="text" class="form-control" id="inputPoblacion" name="poblacio" placeholder="{{ __('admin/donantes.placeholder_poblacion') }}">
                    </div>
                    <div class="form-froup col-md-4">
                        <label for="inputHabitual">Pais </label>
                        <input type="text" class="form-control" id="inputPais" name="pais" placeholder="{{ __('admin/donantes.placeholder_pais') }}">
                    </div>
                    <div class="form-froup col-md-4">
                        <label for="esColaborador">Es colaborador? </label>
                        <select id="esColaborador" name="esColaborador" class="form-control">
                            <option value="0" selected>Ambos</option>
                            <option value="1">Si</option>
                            <option value="2" >No</option>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-froup col-md-5">
                        <label for="inputHabitual">Fecha inicio </label>
                        <input type="date" id="datepicker_from" class="form-control" style="width:100%">
                    </div>
                    <div class="form-froup col-md-5">
                        <label for="inputHabitual">Fecha final</label>
                        <input type="date" id="datepicker_to" class="form-control" style="width:100%">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-froup col-md-4">
                        <label for="tipoColaboracion">Tipo colaboracion: </label>
                        <select id="tipoColaboracion" name="tipoColaboracion" class="form-control">
                            <option value="0" selected>Todos</option>
                            <option value="1">Adoptant</option>
                            <option value="2">Padrí</option>
                            <option value="3">Voluntario</option>
                            <option value="4">RRSS</option>
                            <option value="5">Patrocini</option>
                            <option value="6">Altres</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="filtrar" id="filtroDonantes" class="btn btn-primary">Aplicar</button>
            </div>
        </div>
        </div>
    </div>


@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javaScript">

    $('#createButton').on('click', function(event) {
        $('#formularioCreate').attr('action', "donantes/create");
        $('#formularioCreate').submit();
    });

    $('#editBtnDonantes').on('click', function(){

        var rowMultiple = $("#tablePag").DataTable().rows('.selected').data();
        var row = $("#tablePag").DataTable().row('.selected').data();

        if(row == null || row == 'undefined'){
            $('#modalInfoEdit').modal('show');
        }else if(rowMultiple.length > 1){
            $('#modalInfoEditMultiple').modal('show');
        }else{
        //Llamamos al modal
            var id = row[1];
            $('#editFormDonante').attr('action', "donantes/" + id + "/edit");
            $('#editFormDonante').submit();
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
        var id = row[1];
        $('#formularioDelete').attr('action', "donantes/" + id);
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
