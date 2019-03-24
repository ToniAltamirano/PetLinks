@extends('auth.admin.admin')

@section('datos')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Nueva donación</h5>
    </div>
    <div class="card-body">
        <form action="">
            <div class="form-row">
                <!-- Descripcion animal -->
                <div class="form-group col-xl-4">
                    <label for="animal">Animal</label>
                    <textarea type="text" id="animal" class="form-control"></textarea>
                </div>

                <!-- Persona receptora -->
                <div class="form-group col-xl-4">
                    <label for="personaReceptora">Persona receptora</label>
                    <input type="text" id="personaReceptora" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <!-- select para el tipo-->
                <div class="form-froup col-xl-2">
                    <label for="tipo">Tipo de donación</label>
                    <select id="tipo" class="form-control" required>
                        <option></option>
                        @foreach ($tiposDonacion as $tipoDonacion)
                            <option value="{{ $tipoDonacion->id }}">{{ $tipoDonacion->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- select para el subtipo-->
                <div class="form-group col-xl-4" id="formGroupSubtipos">
                    <label for="subtipo">Subtipo de donación</label>
                    <select id="subtipo" class="form-control" required>
                        <option></option>
                        @foreach ($subtiposDonacion as $subtipoDonacion)
                            <option value="{{ $subtipoDonacion->tipos_id }}">{{ $subtipoDonacion->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-xl-4">
                    <label for="masDetalles">+ Detalles</label>
                    <textarea type="text" id="masDetalles" class="form-control"></textarea>
                </div>

                {{-- <div class="form-group col-xl-2">
                    <label for="gama">Gama</label>
                    <select id="gama" class="form-control">
                        <option>Baja</option>
                        <option selected>Media</option>
                        <option>Alta</option>
                    </select>
                </div>

                <!-- Detalles del tipo de donacion -->
                <div class="form-group col-xl-4">
                    <label for="detallesDonacion">Detalles</label>
                    <textarea type="text" id="detallesDonacion" class="form-control"></textarea>
                </div> --}}

            </div>

            <div class="form-row">
                <!-- centro receptor -->
                <div class="form-group col-xl-6" id="formGroupCentroReceptor">
                    <label for="centroReceptor">Centro receptor</label>
                    <select id="centroReceptor" class="form-control">
                        @foreach ($centros as $centro)
                            <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                        @endforeach
                        <option value="otro">Otro</option>
                    </select>
                </div>
                {{-- centro receptor otro --}}
                <div class="form-group col-xl-4" id="groupOtroCentroReceptor" hidden="true">
                    <label for="otroCentroReceptor">Especifica el centro Receptor</label>
                    <input type="text" id="otroCentroReceptor" class="form-control">
                </div>

                <!-- centro de destino -->
                <div class="form-group col-xl-6">
                    <label for="centroDestino">Centro de destino</label>
                    <select id="centroDestino" class="form-control">
                        @foreach ($centros as $centro)
                            <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <!-- coste estimado -->
                <div class="form-group col-xl-4">
                    <label for="coste">Coste (€)</label>
                    <input type="number" id="coste" class="form-control">
                </div>

                <!-- unidades -->
                <div class="form-group col-xl-4">
                    <label for="unidades">Unidades</label>
                    <input type="number" id="unidades" class="form-control">
                </div>

                <!-- peso -->
                <div class="form-group col-xl-4">
                    <label for="peso">Peso</label>
                    <input type="text" id="peso" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-xl-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="hayFactura">
                        <label class="form-check-label" for="hayFactura">Factura</label>
                    </div>
                </div>

                <div class="form-group col-xl-9">
                    <label for="detallesFactura">Detalles de la factura</label>
                    <textarea type="text" id="detallesFactura" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-xl-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="coordinada">
                        <label class="form-check-label" for="coordinada">Coordinada</label>
                    </div>
                </div>
            </div>

            <div class="form-row">


            </div>
            <a href="{{ url('/donaciones') }}" class="btn btn-secondary">Volver</a>
            <button class="btn btn-primary" type="submit">Añadir</button>
        </form>
    </div>
</div>


@endsection

@section('scripts')
    <script src="{{ asset('js/events/newDonate.js') }}"></script>
@endsection
