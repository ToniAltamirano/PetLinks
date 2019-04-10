@extends('auth.admin.admin')
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <script> var titulo = 'Donacions'; </script>
@section('datos')
<link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
<p>
    <h4 class="display-4 text-center mt-5">{{ __('admin/donaciones.index_tittle') }}</h4>
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

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" title="Filtrar">
        <i class="fas fa-filter"></i>
    </button>
</div>
<input id="lan" hidden value="{{ Config::get('app.locale') }}">
<table id="tablePag" class="table hover stripe display responsive nowrap w-100">
        <thead>
            <tr>
                <th>{{ __('admin/donaciones.index_table_donor') }}</th>
                <th hidden>ID</th>
                <th>{{ __('admin/donaciones.index_table_receiverCenter') }}</th>
                <th>{{ __('admin/donaciones.index_table_destinationCenter') }}</th>
                <th>{{ __('admin/donaciones.index_table_receiverPerson') }}</th>
                <th>{{ __('admin/donaciones.index_table_subtype') }}</th>
                <th>{{ __('admin/donaciones.index_table_creationDate') }}</th>
                <th>{{ __('admin/donaciones.index_table_bill') }}</th>
                <th>{{ __('admin/donaciones.index_table_animal') }}</th>
                <th>{{ __('admin/donaciones.index_table_price') }}</th>
                <th>{{ __('admin/donaciones.index_table_units') }}</th>
                <th>{{ __('admin/donaciones.index_table_weight') }}</th>
                <th>{{ __('admin/donaciones.index_table_moreDetails') }}</th>               
            </tr>
        </thead>
        <tbody>
            @foreach ($donativos as $donativo)
                <tr>

                    @if ($donativo->donante->nombre != null)
                        <td>{{ $donativo->donante->nombre }}</td>
                    @else
                        <td></td>
                    @endif
                    <td hidden>{{ $donativo->id}}</td>
                    @if ($donativo->centros_receptor_id == null)
                        <td>{{ $donativo->centro_receptor_altres }}</td>
                    @else
                        <td>{{ $donativo->centroReceptor->nombre }}</td>
                    @endif
                    <td>{{ $donativo->centroDestino->nombre }}</td>
                    <td>{{ $donativo->usuario_receptor }}</td>
                    <td>{{ $donativo->subtipos->nombre }}</td>
                    <td>{{ $donativo->fecha_donativo }}</td>
                    @if ($donativo->ruta_factura != null)
                        <td><a download="{{ $donativo->ruta_factura }}" href="{{ asset('storage/imagenes/facturas/' . $donativo->ruta_factura) }}">{{ $donativo->ruta_factura }}</a></td>
                    @else
                        <td></td>
                    @endif
                    <td>{{ $donativo->desc_animal }}</td>
                    <td>{{ $donativo->coste }}</td>
                    <td>{{ $donativo->unidades }}</td>
                    <td>{{ $donativo->peso }}</td>
                    <td>{{ $donativo->mas_detalles }}</td>                   
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
            <div class="form-row mt-3">
                <div class="form-froup col-md-4">
                    <label for="inputHabitual">Coste mínimo </label>
                    <input type="text" id="costeMinimo" class="form-control" style="width:100%">
                </div>
                <div class="form-froup col-md-4">
                    <label for="inputHabitual">Coste máximo</label>
                    <input type="text" id="costeMaximo"  class="form-control" style="width:100%">
                </div>
                <div class="form-froup col-md-4">
                    <label for="habitual">Es coordinada? </label>
                    <select id="habitual" name="habitual" class="form-control">
                        <option value="0" selected>Ambos</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-froup col-md-6">
                    <label for="inputHabitual">Fecha inicio </label>
                    <input type="date" id="datepicker_from" class="form-control" style="width:100%">
                </div>
                <div class="form-froup col-md-6">
                    <label for="inputHabitual">Fecha final</label>
                    <input type="date" id="datepicker_to" class="form-control" style="width:100%">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-froup col-md-6">
                    <label for="inputHabitual">Centro Destí </label>
                    <select id="centroDesti" class="form-control" name="centroDesti" required>
                            <option value="0">Todos</option>
                            @foreach ($centros as $centro)
                                <option value="{{ $centro->nombre }}">{{ $centro->nombre }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-froup col-md-6">
                    <label for="inputHabitual">Centro Receptor</label>
                    <select id="centroReceptor" class="form-control" name="centroReceptor" required>
                        <option value="0">Todos</option>
                        @foreach ($centros as $centro)
                            <option value="{{ $centro->nombre }}">{{ $centro->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row mt-3 col-11">
                <div class="form-froup col-6">
                    <label for="inputHabitual">Tipos</label>
                    <select id="tipo" class="form-control" required name="tipo">
                    <option value="0">Todos</option>
                    @foreach ($tiposDonacion as $tipoDonacion)
                        <option value="{{ $tipoDonacion->id }}">{{ $tipoDonacion->nombre }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-froup col-6" id="formGroupSubtipos">
                    <label for="inputHabitual">Subtipos </label>
                    <select id="subtipo" class="form-control" required name="subtipo">
                    <option value="0">Todos</option>
                    @foreach ($subtiposDonacion as $subtipoDonacion)
                        @if ($subtipoDonacion->gama != null)
                            <option data-tipoId={{ $subtipoDonacion->tipos_id }} value="{{ $subtipoDonacion->nombre }}">{{ $subtipoDonacion->nombre }}</option>
                        @else
                            <option data-tipoId={{ $subtipoDonacion->tipos_id }} value="{{ $subtipoDonacion->nombre }}">{{ $subtipoDonacion->nombre }}</option>
                        @endif
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="filtrar" id="filtroDonaciones" class="btn btn-primary">Aplicar</button>
        </div>
    </div>
    </div>
</div>

@section('scripts')
<script src="{{ asset('js/events/newDonate.js') }}"></script>
    <script type="text/javaScript">

        $('#createButton').on('click', function(event) {
            $('#formularioCreate').attr('action', "donaciones/create");
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
                var id = row[1];
                $('#formularioEdit').attr('action', "donaciones/" + id + "/edit");
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
            var id = row[1];
            var action = "donaciones/" + id;
            $('#formularioDelete').attr('action', action);
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
