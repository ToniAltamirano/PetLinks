@extends('auth.admin.admin')

@section('datos')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Nueva donación</h5>
    </div>
    <div class="card-body">
        <form action="{{ action('DonativoController@store') }}" enctype="multipart/form-data" method="POST">
        @csrf
            <div class="card-title">
                <h5>Donante</h5>
            </div>

            <div class="form-row">
                <div class="form-group col-xl-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="donanteAnonimo" checked>
                        <label class="form-check-label" for="donanteAnonimo">Donante anónimo</label>
                    </div>
                </div>
            </div>



            <hr>

            <div class="card-title">
                <h5>Centro</h5>
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
                <!-- Persona receptora -->
                <div class="form-group col-xl-4">
                    <label for="personaReceptora">Persona receptora</label>

                    <select id="personaReceptora" class="form-control">
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
                    <input type="text" id="animal" class="form-control">
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
                    <select id="subtipo" class="form-control" required>
                        <option></option>
                        @foreach ($subtiposDonacion as $subtipoDonacion)
                            @if ($subtipoDonacion->gama != null)
                                <option value="{{ $subtipoDonacion->tipos_id }}">{{ $subtipoDonacion->nombre }} - {{ $subtipoDonacion->gama }}</option>
                            @else
                                <option value="{{ $subtipoDonacion->tipos_id }}">{{ $subtipoDonacion->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-xl-4">
                    <label for="masDetalles">+ Detalles</label>
                    <textarea type="text" id="masDetalles" class="form-control"></textarea>
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

                <div class="form-group col-xl-9" id="groupDetallesFactura">
                    <label for="detallesFactura">Detalles de la factura</label>
                    <input type="file" name="detallesFactura" id="detallesFactura" class="form-control border-0">
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

            <a href="{{ url('/donaciones') }}" class="btn btn-secondary">Volver</a>
            <button class="btn btn-primary" type="submit">Añadir</button>
        </form>
    </div>
</div>


@endsection

@section('scripts')
    <script src="{{ asset('js/events/newDonate.js') }}"></script>
@endsection
