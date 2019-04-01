@extends('auth.admin.admin')

@section('datos')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Nueva donación</h5>
    </div>
    <div class="card-body">
        <form action="{{ action('DonativoController@store') }}" enctype="multipart/form-data" method="POST" id="formInsert">
        @csrf
            <div class="card-title">
                <h5>Donante</h5>
            </div>
            <label>¿Has donado anteriormente?</label>
            <div class="form-row">
                <label class="radio-inline col-xl-2">
                    <input type="radio" id="rbSoyDonante" name="soyDonante" value="si" checked class="mr-1">He donado
                </label>
                <label class="radio-inline col-xl-2">
                    <input type="radio" id="rbNoSoyDonante" name="soyDonante" value="no" class="mr-1">No he donado
                </label>
            </div>

            <div class="form-row" id="formGroupDonante">
                <!-- select para tipos de donantes-->
                <div class="form-froup col-xl-2">
                    <label for="tipoDonante">Tipo de donante</label>
                    <select id="tipoDonante" class="form-control" name="tipoDonacion" required>
                        <option></option>
                        @foreach ($tiposDonante as $tipoDonante)
                            <option value="{{ $tipoDonante->id }}">{{ $tipoDonante->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- input para el dni o cif -->
                <div class="form-group col-xl-4" id="groupCifDni" hidden>
                    <label for="inputDNICIF" class="d-block">DNI/CIF: </label>
                    <input type="text" class="form-control d-inline" id="inputDNICIF" name="dnicif" maxLength=9 minLength=9>
                    <div class="valid-feedback">
                        Donante correcto!
                    </div>
                    <div class="invalid-feedback">
                        Donante no existe!
                    </div>
                </div>
                <input hidden type="text" value="" id="donante" name="donante">
            </div>

            <a href="{{ url('/donantes/create') }}" class="btn btn-success" id="btnAñadirDonante" hidden>
                <i class="fas fa-plus-circle"></i>Añadir donante
            </a>

            <hr>

            <div class="card-title">
                <h5>Centro</h5>
            </div>

            <div class="form-row">
                <!-- centro receptor -->
                <div class="form-group col-xl-6" id="formGroupCentroReceptor">
                    <label for="centroReceptor">Centro receptor</label>
                    <select id="centroReceptor" class="form-control" name="centroReceptor" required>
                        <option></option>
                        @foreach ($centros as $centro)
                            <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                        @endforeach
                        <option value="otro">Otro</option>
                    </select>
                </div>
                {{-- centro receptor otro --}}
                <div class="form-group col-xl-4" id="groupOtroCentroReceptor" hidden="true">
                    <label for="otroCentroReceptor">Especifica el centro Receptor</label>
                    <input type="text" id="otroCentroReceptor" class="form-control" name="otroCentroReceptor">
                </div>

                <!-- centro de destino -->
                <div class="form-group col-xl-6">
                    <label for="centroDestino">Centro de destino</label>
                    <select id="centroDestino" class="form-control" name="centroDestino" required>
                        <option></option>
                        @foreach ($centros as $centro)
                            <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <!-- Persona receptora -->
                <div class="form-group col-xl-4">
                    <label for="idPersonaReceptora">Persona receptora</label>

                    <select id="idPersonaReceptora" class="form-control" name="idPersonaReceptora" required>
                        @foreach ($usuarios as $usuario)
                            @if (Auth::user()->id == $usuario->id)
                                <option value="{{ $usuario->id }}" selected>{{ $usuario->nombre_usuario }}</option>
                            @else
                                <option value="{{ $usuario->id }}">{{ $usuario->nombre_usuario }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <hr>

            <div class="card-title">
                <h5>Donativo</h5>
            </div>

            <div class="form-row">
                <!-- Descripcion animal -->
                <div class="form-group col-xl-6">
                    <label for="animal">Animal</label>
                    <input type="text" id="animal" class="form-control" name="animal">
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
                <div class="form-group col-xl-6" id="formGroupSubtipos">
                    <label for="subtipo">Subtipo de donación</label>
                    <select id="subtipo" class="form-control" required name="subtipo">
                        <option></option>
                        @foreach ($subtiposDonacion as $subtipoDonacion)
                            @if ($subtipoDonacion->gama != null)
                                <option data-tipoId={{ $subtipoDonacion->tipos_id }} value="{{ $subtipoDonacion->id }}">{{ $subtipoDonacion->nombre }} - {{ $subtipoDonacion->gama }}</option>
                            @else
                                <option data-tipoId={{ $subtipoDonacion->tipos_id }} value="{{ $subtipoDonacion->id }}">{{ $subtipoDonacion->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-xl-4">
                    <label for="masDetalles">+ Detalles</label>
                    <textarea type="text" id="masDetalles" class="form-control" name="masDetalles"></textarea>
                </div>

            </div>

            <div class="form-row">
                <!-- coste estimado -->
                <div class="form-group col-xl-4">
                    <label for="coste">Precio (€)</label>
                    <input type="number" step="0.01" id="coste" class="form-control" name="coste">
                </div>

                <!-- unidades -->
                <div class="form-group col-xl-4" id="groupUnidades">
                    <label for="unidades">Unidades</label>
                    <input type="number" id="unidades" class="form-control" name="unidades">
                </div>

                <!-- peso -->
                <div class="form-group col-xl-4" id="groupPeso">
                    <label for="peso">Peso</label>
                    <input type="text" id="peso" class="form-control" name="peso">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-xl-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="coordinada" name="coordinada">
                        <label class="form-check-label" for="coordinada">Coordinada</label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-xl-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="hayFactura" name="hayFactura">
                        <label class="form-check-label" for="hayFactura">Factura</label>
                    </div>
                </div>

                <div class="form-group col-xl-9" id="groupDetallesFactura">
                    <label for="detallesFactura">Detalles de la factura</label>
                    <input type="file" name="detallesFactura" id="detallesFactura" class="form-control border-0">
                </div>
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
