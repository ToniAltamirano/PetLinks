@extends('auth.admin.admin')

@section('datos')
    <div class="container">
        <p>
            <h4>{{ __('admin/donaciones.create_tittle') }}</h4>
        </p>
        @include('partial.errores')
        <form action="{{ action('DonativoController@store') }}" enctype="multipart/form-data" method="POST" id="formInsert">
            @csrf
            <div class="card-title">
                <h5>{{ __('admin/donaciones.create_subtittle_donor') }}</h5>
            </div>
            <label>{{ __('admin/donaciones.create_donatedBefore') }} *</label>
            <div class="form-row">
                <label class="radio-inline col-xl-2">
                    <input type="radio" id="rbSoyDonante" name="soyDonante" value="si" checked class="mr-1">{{ __('admin/donaciones.create_yesDonated') }}
                </label>
                <label class="radio-inline col-xl-2">
                    <input type="radio" id="rbNoSoyDonante" name="soyDonante" value="no" class="mr-1">{{ __('admin/donaciones.create_noDonated') }}
                </label>
            </div>
            <div class="form-row" id="formGroupDonante">
                <!-- select para tipos de donantes-->
                <div class="form-froup col-xl-6">
                    <label for="tipoDonante">{{ __('admin/donaciones.create_donorType') }} *</label>
                    <select id="tipoDonante" class="form-control" name="tipoDonacion" required>
                        @foreach ($tiposDonante as $tipoDonante)
                            <option value="{{ $tipoDonante->id }}">{{ $tipoDonante->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <input hidden type="text" value="anonimo" id="donante" name="donante">
            </div>
            {{-- boton para ir a añadir donante --}}
            <a href="{{ url('/donantes/create') }}" class="btn btn-success" id="btnAñadirDonante" hidden>
                <i class="fas fa-plus-circle"></i>{{ __('admin/donaciones.create_addDonor') }}
            </a>
            <!-- inputs para los campos de busqueda del donante -->
            <div class="card mt-2 bg-transparent mt-2" id="infoDonante" hidden>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-xl-4" id="groupCifDni">
                            <label for="inputDNICIF" class="d-block">{{ __('admin/donaciones.create_dniCif') }}</label>
                            <input type="text" class="form-control d-inline" id="inputDNICIF" name="dnicif" maxLength=9 minLength=9 placeholder="{{ __('admin/donaciones.create_dniCif') }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputNombre">{{ __('admin/donantes.name') }}</label>
                            <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="{{ __('admin/donantes.placeholder_name') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputApellidos">{{ __('admin/donantes.surnames') }}</label>
                            <input type="text" class="form-control" id="inputApellidos" name="apellidos" placeholder="{{ __('admin/donantes.placeholder_surnames') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail">{{ __('admin/donantes.email') }}</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="{{ __('admin/donantes.placeholder_email') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputTelefono">{{ __('admin/donantes.telefon') }}</label>
                            <input type="text" class="form-control" id="inputTelefono" name="inputTelefono" placeholder="{{ __('admin/donantes.placeholder_telefon') }}">
                        </div>
                        <button class="btn btn-primary m-auto" type="button" id="btnBuscarDonante">Buscar</button>
                        <hr class="col-12">
                        <div class="form-group col-12">
                            <label for="resultDonantes">{{ __('admin/donaciones.create_resultDonors') }} *</label>
                            <select id="resultDonantes" class="form-control" name="resultDonantes"></select>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-title">
                <h5>{{ __('admin/donaciones.create_subtittle_center') }}</h5>
            </div>
            <div class="form-row">
                <!-- centro receptor -->
                <div class="form-group col-xl-6" id="formGroupCentroReceptor">
                    <label for="centroReceptor">{{ __('admin/donaciones.create_receiverCenter') }} *</label>
                    <select id="centroReceptor" class="form-control" name="centroReceptor" required>
                        <option></option>
                        @foreach ($centros as $centro)
                            <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                        @endforeach
                        <option value="otro">{{ __('admin/donaciones.create_other') }}</option>
                    </select>
                </div>
                {{-- centro receptor otro --}}
                <div class="form-group col-xl-4" id="groupOtroCentroReceptor" hidden="true">
                    <label for="otroCentroReceptor">{{ __('admin/donaciones.create_receiverCenterOther') }} *</label>
                    <input type="text" id="otroCentroReceptor" class="form-control" name="otroCentroReceptor">
                </div>

                <!-- centro de destino -->
                <div class="form-group col-xl-6">
                    <label for="centroDestino">{{ __('admin/donaciones.create_destinationCenter') }} *</label>
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
                <div class="form-group col-xl-6">
                    <label for="idPersonaReceptora">{{ __('admin/donaciones.create_receiverPerson') }} *</label>

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
                <h5>{{ __('admin/donaciones.create_subtittle_donation') }}</h5>
            </div>
            <div class="form-row">
                <!-- Tipo animal -->
                <div class="form-group col-xl-6">
                    <label for="tipoAnimal">{{ __('admin/donaciones.create_animalType') }}</label>
                    <select id="tipoAnimal" class="form-control" name="tipoAnimal[]" multiple>
                        <option></option>
                        @foreach ($animales as $animal)
                            <option value="{{ $animal->id }}">{{ $animal->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Descripcion animal -->
                <div class="form-group col-xl-6">
                    <label for="animal">{{ __('admin/donaciones.create_animal') }}</label>
                    <textarea name="animal" type="text" class="form-control h-auto" id="animal"></textarea>
                    {{-- <input type="text" id="animal" class="form-control" name="animal"> --}}
                </div>
            </div>
            <div class="form-row">
                <!-- select para el tipo-->
                <div class="form-froup col-xl-2">
                    <label for="tipo">{{ __('admin/donaciones.create_donationType') }} *</label>
                    <select id="tipo" class="form-control" name="tipo" required>
                        <option></option>
                        @foreach ($tiposDonacion as $tipoDonacion)
                            <option value="{{ $tipoDonacion->id }}">{{ $tipoDonacion->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- select para el subtipo-->
                <div class="form-group col-xl-6" id="formGroupSubtipos">
                    <label for="subtipo">{{ __('admin/donaciones.create_donationSubtype') }} *</label>
                    <select id="subtipo" class="form-control" name="subtipo" required>
                        <option></option>
                        @foreach ($subtiposDonacion as $subtipoDonacion)
                            @if ($subtipoDonacion->gama != null)
                                <option data-tipoId={{ $subtipoDonacion->tipos_id }} data-coste={{ $subtipoDonacion->precio_estimado }} value="{{ $subtipoDonacion->id }}">{{ $subtipoDonacion->nombre }} - {{ $subtipoDonacion->gama }}</option>
                            @else
                                <option data-tipoId={{ $subtipoDonacion->tipos_id }} data-coste={{ $subtipoDonacion->precio_estimado }} value="{{ $subtipoDonacion->id }}">{{ $subtipoDonacion->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-xl-4">
                    <label for="masDetalles">{{ __('admin/donaciones.create_moreDetails') }}</label>
                    <textarea type="text" id="masDetalles" class="form-control" name="masDetalles"></textarea>
                </div>
            </div>
            <div class="form-row">
                <!-- coste estimado -->
                <div class="form-group col-xl-4">
                    <label for="coste">{{ __('admin/donaciones.create_price') }}</label>
                    <input type="number" step="0.01" id="coste" class="form-control" name="coste">
                </div>
                <!-- unidades -->
                <div class="form-group col-xl-4" id="groupUnidades">
                    <label for="unidades">{{ __('admin/donaciones.create_units') }}</label>
                    <input type="number" id="unidades" class="form-control" name="unidades">
                </div>
                <!-- peso -->
                <div class="form-group col-xl-4" id="groupPeso">
                    <label for="peso">{{ __('admin/donaciones.create_weight') }}</label>
                    <input type="number" step="0.01" id="peso" class="form-control" name="peso">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xl-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="coordinada" name="coordinada">
                        <label class="form-check-label" for="coordinada">{{ __('admin/donaciones.create_coordinated') }}</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xl-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="hayFactura" name="hayFactura">
                        <label class="form-check-label" for="hayFactura">{{ __('admin/donaciones.create_bill') }}</label>
                    </div>
                </div>
                <div class="form-group col-xl-12" id="groupDetallesFactura">
                    <label class="custom-file-label" for="detallesFactura">{{ __('admin/donaciones.edit_file') }}</label>
                    <div class="custom-file">
                        <input type="file" class="detallesFactura custom-file-input" name="detallesFactura" id="detallesFactura">
                    </div>
                </div>
            </div>
            <div class="col-12 m-0 p-0 mt-2 mb-1">
                <a href="{{ url('/donaciones') }}" class="btn btn-danger">{{ __('admin/donaciones.create_bntReturn') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('admin/donaciones.create_btnCreate') }}</button>
            </div>
            <small class="m-0 p-0 mt-2 mb-4">{{ __('admin/donaciones.create_required_fields') }}</small>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/events/newDonate.js') }}"></script>
@endsection
