@extends('auth.admin.admin')

<script> var titulo = 'Donacions'; </script>
@section('datos')

<p>
    <h4>{{ __('admin/donaciones.index_tittle') }}</h4>
</p>
@include('partial.errores')

<div class="crud m-2">

    <a href="{{ url('/donaciones/create') }}" class="btn btn-success">
        <button type="button" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>
        </button>
    </a>

    <button type="button" class="btn btn-info" id="editButton">
        <i class="fas fa-edit"></i>
        <form action="" id="formularioEdit" method="GET"></form>
    </button>

    <button type="button" class="btn btn-danger" onclick="eliminar()">
        <i class="fas fa-trash-alt"></i>
        <form action="" id="formularioDelete" method="POST">
            @method('delete')
            @csrf
        </form>
    </button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" title="Filtrar">
        <i class="fas fa-filter"></i>
    </button>
</div>

<table id="tablePag" class="table hover stripe display responsive nowrap w-100">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('admin/donaciones.index_table_donor') }}</th>
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
                    <td>{{ $donativo->id}}</td>
                    @if ($donativo->donante->nombre != null)
                        <td>{{ $donativo->donante->nombre }}</td>
                    @else
                        <td></td>
                    @endif

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
<script src="{{ asset('js/events/tabla.js') }}"></script>
    <script type="text/javaScript">
        $('#editButton').on('click', function() {
            var row = $("#tablePag").DataTable().row('.selected').data();
            var id = row[0];
            $('#formularioEdit').attr('action', "donaciones/" + id + "/edit");
            $('#formularioEdit').submit();
        });

        function eliminar() {
            var row = $("#tablePag").DataTable().row('.selected').data();
            var id = row[0];
            var action = "donaciones/" + id;
            $('#formularioDelete').attr('action', action);
            $('#formularioDelete').submit();
        }
    </script>
@endsection
