@extends('auth.admin.admin')
@section('datos')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('admin/donaciones.edit_tittle') }}</h5>
        </div>
        @include('partial.errores')
        <div class="card-body">
            <form action="{{ action('DonativoController@update', [$donativo->id]) }}" enctype="multipart/form-data" method="POST" id="formUpdate">
                @method('put')
                @csrf

                <div class="card-title">
                    <h5>{{ __('admin/donaciones.edit_subtittle_donor') }}</h5>
                </div>

                <div class="form-row">
                    <!-- Donante -->
                    <div class="form-group col-xl-4">
                        <label for="nombreDonante">{{ __('admin/donaciones.edit_donorName') }}</label>
                        <input type="text" id="nombreDonante" class="form-control" name="nombreDonante" readonly value="{{ $donativo->donante->nombre }}">
                    </div>
                </div>

                <hr>

                <div class="card-title">
                    <h5>{{ __('admin/donaciones.edit_subtittle_center') }}</h5>
                </div>

                <div class="form-row">
                    <!-- centro receptor -->
                    <div class="form-group col-xl-6" id="formGroupCentroReceptor">
                        <label for="centroReceptor">{{ __('admin/donaciones.edit_receiverCenter') }}</label>
                        <select id="centroReceptor" class="form-control" name="centroReceptor" required>
                            <option></option>
                            @foreach ($centros as $centro)
                                @if ($centro->id == $donativo->centros_receptor_id)
                                    <option value="{{ $centro->id }}" selected>{{ $centro->nombre }}</option>
                                @else
                                    <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                @endif
                            @endforeach

                            @if ($donativo->centros_receptor_id == null)
                                <option value="otro" selected>{{ __('admin/donaciones.edit_other') }}</option>
                            @else
                                <option value="otro">{{ __('admin/donaciones.edit_other') }}</option>
                            @endif
                        </select>
                    </div>
                    {{-- centro receptor otro --}}
                    <div class="form-group col-xl-4" id="groupOtroCentroReceptor" hidden="true">
                        <label for="otroCentroReceptor">{{ __('admin/donaciones.edit_receiverCenterOther') }}</label>
                        @if ($donativo->centros_receptor_id == null)
                            <input type="text" id="otroCentroReceptor" class="form-control" name="otroCentroReceptor" value="{{ $donativo->centro_receptor_altres }}">
                        @else
                            <input type="text" id="otroCentroReceptor" class="form-control" name="otroCentroReceptor">
                        @endif
                    </div>

                    <!-- centro de destino -->
                    <div class="form-group col-xl-6">
                        <label for="centroDestino">{{ __('admin/donaciones.edit_destinationCenter') }}</label>
                        <select id="centroDestino" class="form-control" name="centroDestino" required>
                            <option></option>
                            @foreach ($centros as $centro)
                                @if ($centro->id == $donativo->centros_desti_id)
                                    <option value="{{ $centro->id }}" selected>{{ $centro->nombre }}</option>
                                @else
                                    <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Persona receptora -->
                    <div class="form-group col-xl-4">
                        <label for="idPersonaReceptora">{{ __('admin/donaciones.edit_receiverPerson') }}</label>

                        <select id="idPersonaReceptora" class="form-control" name="idPersonaReceptora" required>
                            @foreach ($usuarios as $usuario)
                                @if ($donativo->users_id == $usuario->id)
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
                    <h5>{{ __('admin/donaciones.edit_subtittle_donation') }}</h5>
                </div>

                <div class="form-row">
                    <!-- Tipo animal -->
                    <div class="form-group col-xl-3">
                        <label for="tipoAnimal">{{ __('admin/donaciones.edit_animalType') }}</label>
                        <select id="tipoAnimal" class="form-control" name="tipoAnimal[]" multiple>
                            <option></option>
                            @foreach ($animales as $animal)
                            @if (in_array($animal->id, $donantivo_animales))
                                <option value="{{ $animal->id }}" selected>{{ $animal->nombre }}</option>
                            @else
                                <option value="{{ $animal->id }}">{{ $animal->nombre }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <!-- Descripcion animal -->
                    <div class="form-group col-xl-6">
                        <label for="animal">{{ __('admin/donaciones.edit_animal') }}</label>
                        @if ($donativo->desc_animal != null)
                            <input type="text" id="animal" class="form-control" name="animal" value="{{ $donativo->desc_animal }}">
                        @else
                            <input type="text" id="animal" class="form-control" name="animal">
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <!-- select para el tipo-->
                    <div class="form-froup col-xl-2">
                        <label for="tipo">{{ __('admin/donaciones.edit_donationType') }}</label>
                        <select id="tipo" class="form-control" required name="tipo">
                            <option></option>
                            @foreach ($tiposDonacion as $tipoDonacion)
                                @if ($tipoDonacion->id == $donativo->subtipos->tipos_id)
                                    <option value="{{ $tipoDonacion->id }}" selected>{{ $tipoDonacion->nombre }}</option>
                                @else
                                    <option value="{{ $tipoDonacion->id }}">{{ $tipoDonacion->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <!-- select para el subtipo-->
                    <div class="form-group col-xl-6" id="formGroupSubtipos">
                        <label for="subtipo">{{ __('admin/donaciones.edit_donationSubtype') }}</label>
                        <select id="subtipo" class="form-control" required name="subtipo">
                            <option></option>
                            @foreach ($subtiposDonacion as $subtipoDonacion)
                                @if ($subtipoDonacion->gama != null)
                                    @if ($subtipoDonacion->id == $donativo->subtipos->id)
                                        <option data-tipoId={{ $subtipoDonacion->tipos_id }} value="{{ $subtipoDonacion->id }}" selected>{{ $subtipoDonacion->nombre }} - {{ $subtipoDonacion->gama }}</option>
                                    @else
                                        <option data-tipoId={{ $subtipoDonacion->tipos_id }} value="{{ $subtipoDonacion->id }}">{{ $subtipoDonacion->nombre }} - {{ $subtipoDonacion->gama }}</option>
                                    @endif
                                @else
                                    @if ($subtipoDonacion->id == $donativo->subtipos->id)
                                        <option data-tipoId={{ $subtipoDonacion->tipos_id }} value="{{ $subtipoDonacion->id }}" selected>{{ $subtipoDonacion->nombre }}</option>
                                    @else
                                        <option data-tipoId={{ $subtipoDonacion->tipos_id }} value="{{ $subtipoDonacion->id }}">{{ $subtipoDonacion->nombre }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <!-- mas detalles de la donacion-->
                    <div class="form-group col-xl-4">
                        <label for="masDetalles">{{ __('admin/donaciones.edit_moreDetails') }}</label>
                        @if ($donativo->mas_detalles != null)
                            <textarea type="text" id="masDetalles" class="form-control" name="masDetalles">{{ $donativo->mas_detalles }}</textarea>
                        @else
                            <textarea type="text" id="masDetalles" class="form-control" name="masDetalles"></textarea>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <!-- coste estimado -->
                    <div class="form-group col-xl-4">
                        <label for="coste">{{ __('admin/donaciones.edit_price') }}</label>
                        @if ($donativo->coste != null)
                            <input type="number" step="0.01" id="coste" class="form-control" name="coste" value="{{ $donativo->coste }}">
                        @else
                            <input type="number" step="0.01" id="coste" class="form-control" name="coste">
                        @endif

                    </div>

                    <!-- unidades -->
                    <div class="form-group col-xl-4" id="groupUnidades">
                        <label for="unidades">{{ __('admin/donaciones.edit_units') }}</label>
                        @if ($donativo->unidades != null)
                            <input type="number" id="unidades" class="form-control" name="unidades" value="{{ $donativo->unidades }}">
                        @else
                           <input type="number" id="unidades" class="form-control" name="unidades">
                        @endif
                    </div>

                    <!-- peso -->
                    <div class="form-group col-xl-4" id="groupPeso">
                        <label for="peso">{{ __('admin/donaciones.edit_weight') }}</label>
                        @if ($donativo->peso != null)
                            <input type="text" id="peso" class="form-control" name="peso" value="{{ $donativo->peso }}">
                        @else
                            <input type="text" id="peso" class="form-control" name="peso">
                        @endif
                    </div>
                </div>

                <!-- es coordinada-->
                <div class="form-row">
                    <div class="form-group col-xl-3">
                        <div class="form-check">
                            @if ($donativo->es_coordinada == 1)
                                <input class="form-check-input" type="checkbox" value="1" id="coordinada" name="coordinada" checked>
                            @else
                                <input class="form-check-input" type="checkbox" value="1" id="coordinada" name="coordinada">
                            @endif
                            <label class="form-check-label" for="coordinada">{{ __('admin/donaciones.edit_coordinated') }}</label>
                        </div>
                    </div>
                </div>

                <!--tiene factura-->
                <div class="form-row">
                    <div class="form-group col-xl-3">
                        <div class="form-check">
                            @if ($donativo->hay_factura == 1)
                                <input class="form-check-input" type="checkbox" value="1" id="hayFactura" name="hayFactura" checked>
                            @else
                                <input class="form-check-input" type="checkbox" value="1" id="hayFactura" name="hayFactura">
                            @endif
                            <label class="form-check-label" for="hayFactura">{{ __('admin/donaciones.edit_bill') }}</label>
                        </div>
                    </div>
                </div>

                <!-- detalles de la factura-->
                <div class="form-row">
                    <div class="form-group col-xl-12" id="groupDetallesFactura">
                        <label for="inputNombre">{{ __('admin/donaciones.edit_billDetails') }}</label>
                        @if ($donativo->ruta_factura != null)
                            <label id="facturaName" class="custom-file-label" for="detallesFactura">{{ $donativo->ruta_factura }}</label>
                        @else
                            <label id="facturaName" class="custom-file-label" for="detallesFactura">{{ __('admin/donaciones.edit_file') }}</label>
                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="detallesFactura" id="detallesFactura">
                        </div>
                    </div>
                </div>

                <a href="{{ url('/donaciones') }}" class="btn btn-secondary">{{ __('admin/donaciones.edit_bntReturn') }}</a>
                <button class="btn btn-primary" type="submit">{{ __('admin/donaciones.edit_btnEdit') }}</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/events/editDonate.js') }}"></script>
@endsection

