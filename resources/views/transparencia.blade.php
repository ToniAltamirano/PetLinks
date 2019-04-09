@extends('template.master')

@section('titulo', 'TRANSPARÈNCIA')

@section('contenidor')
    <div class="card col-11 mx-auto mb-1">
        <div class="card-body">
            <div class="card-title">
                <h3>Tipos de donación por fecha</h3>
            </div>
            <div id="groupFechasTipos" class="form-group row">
                <div class="col-xl-4 m-auto">
                    <label for="fechaInicioTipos" class="">De: </label>
                    <input type="month" name="fechaInicioTipos" id="fechaInicioTipos" class="form-control d-inline" value="{{ $fecha_anterior }}">
                </div>

                <div class="col-xl-4 m-auto">
                    <label for="fechaFinalTipos" class="d-inline">Hasta: </label>
                    <input type="month" name="fechaFinalTipos" id="fechaFinalTipos" class="form-control" value="{{ $fecha_actual }}">
                </div>

            </div>
            <div id="barChartTipos" class="text-center" style="width: 100%; height: 500px;"></div>
        </div>
    </div>

    <div class="card col-11 mx-auto mb-1">
        <div class="card-body">
            <div class="card-title">
                <h3>Balance Donaciones/dinero</h3>
            </div>
            <div id="groupFechas" class="form-group row">
                <div class="col-xl-4 m-auto">
                    <label for="fechaInicio" class="">De: </label>
                    <input type="month" name="fechaInicio" id="fechaInicio" class="form-control d-inline" value="{{ $fecha_anterior }}">
                </div>

                <div class="col-xl-4 m-auto">
                    <label for="fechaFinal" class="d-inline">Hasta: </label>
                    <input type="month" name="fechaFinal" id="fechaFinal" class="form-control" value="{{ $fecha_actual }}">
                </div>

            </div>
            <div id="barLinesDonationsMoney" class="text-center" style="width: 100%; height: 500px;"></div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('js/events/graphics/donations/typeDonationsBar.js') }}"></script>
    <script src="{{ asset('js/events/graphics/donations/dinero_donacionesDonationsCombo.js') }}"></script>
@endsection
