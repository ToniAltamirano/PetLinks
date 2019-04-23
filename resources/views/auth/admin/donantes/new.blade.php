@extends('auth.admin.admin')

@section('datos')
    <div class="container">
        <p>
            <h4>{{ __('admin/donantes.titleCreate') }}</h4>
        </p>
        @include('partial.errores')
        <form action="{{ action('DonanteController@store') }}" method="post">
            @csrf
            <div class="form-row">
                <!-- select para tipos de donantes-->
                <div class="form-froup col-xl-6">
                    <label for="tipoDonante">{{ __('admin/donantes.title') }} *</label>
                    <select id="tipoDonante" class="form-control" name="tipoDonacion" required>
                        <option></option>
                        @foreach ($tiposDonacion as $tipoDonacion)
                            <option value="{{ $tipoDonacion->id }}">{{ $tipoDonacion->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-froup col-xl-6">
                    <label for="inputHabitual">{{ __('admin/donantes.titleHabitual') }} *</label>
                    <select id="inputHabitual" name="habitual" class="form-control" required>
                        <option value="1">Si</option>
                        <option value="2" selected>No</option>
                    </select>
                </div>
            </div>
            {{-- PARTICULARES --}}
            <div class="particulares">
                <h5 class="mt-3">{{ __('admin/donantes.titleParticulares') }}</h5>
                <div class="form-row mt-3">
                    <div class="form-group col-xl-6">
                        <label for="inputNombre">{{ __('admin/donantes.name') }}</label>
                        <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="{{ __('admin/donantes.placeholder_name') }}">
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="inputApellidos">{{ __('admin/donantes.surnames') }}</label>
                        <input type="text" class="form-control" id="inputApellidos" name="apellidos" placeholder="{{ __('admin/donantes.placeholder_surnames') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xl-6">
                        <label for="inputDNI">{{ __('admin/donantes.dni') }}</label>
                        <input type="text" class="form-control" id="inputDNI" maxLength=9 minLength=9 name="dni" placeholder="{{ __('admin/donantes.placeholder_dni') }}">
                    </div>
                    <div class="form-group col-xl-6">
                            <label for="tipo">{{ __('admin/donantes.sexo') }}</label>
                            <select id="tipo" class="form-control" name="sexo">
                                <option></option>
                                @foreach ($sexos as $sexo)
                                    <option value="{{ $sexo->id }}">{{ $sexo->sexo }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                {{-- TODO Revisar opcion para emprasas --}}
                <div class="form-row">
                    <div class="form-froup col-xl-6" id="tieneAnimalesdiv">
                        <label for="tieneAnimalesdiv">{{ __('admin/donantes.tieneAnimales') }}</label>
                        <select id="tieneAnimalesSelect" name="tieneAnimales" class="form-control">
                            <option value="1" >Si</option>
                            <option value="2" selected>No</option>
                        </select>
                    </div>
                    <div class="form-froup col-xl-6" id="animalesdiv">
                        <label for="animales">{{ __('admin/donantes.animales') }}</label>
                        <select id="animales" class="form-control" name="animales[]"  multiple="multiple" size="3">
                            @foreach ($animales as $animal)
                                <option value="{{ $animal->id }}">{{ $animal->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            {{-- EMPRESAS --}}
            <div class="empresas">
                <h5 class="mt-3">{{ __('admin/donantes.titleEmpresa') }}</h5>
                <div class="form-row mt-3">
                    <div class="form-group col-xl-6">
                        <label for="inputNombre">{{ __('admin/donantes.razonSocial') }}</label>
                        <input type="text" class="form-control" id="inputNombre" name="razon_social" placeholder="{{ __('admin/donantes.placeholder_razonSocial') }}">
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="inputCif">{{ __('admin/donantes.cif') }}</label>
                        <input type="text" class="form-control" id="inputCife" maxlength="9" name="cif" placeholder="{{ __('admin/donantes.placeholder_cif') }}">
                    </div>
                </div>
            </div>
            {{-- GENERAL --}}
            <div class="general">
                <h5 class="mt-3">{{ __('admin/donantes.titleGeneral') }}</h5>
                <div class="form-row mt-3">
                    <div class="form-group col-xl-6">
                        <label for="inputDireccion">{{ __('admin/donantes.direccion') }} </label>
                        <input type="text" class="form-control" id="inputDireccion" name="direccion" placeholder="{{ __('admin/donantes.placeholder_direccion') }}">
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="inputCif">{{ __('admin/donantes.telefon') }}</label>
                        <input type="text" class="form-control" id="inputCife" name="telefono" placeholder="{{ __('admin/donantes.placeholder_telefon') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xl-6">
                        <label for="inputEmail">{{ __('admin/donantes.email') }}</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="{{ __('admin/donantes.placeholder_email') }}">
                    </div>
                    <div class="form-group col-xl-6" id="vincleEntitat">
                        <label for="vincleEntitat">{{ __('admin/donantes.vincles') }} *</label>
                        <select id="vincleEntitatSelect" name="vincle" class="form-control" required>
                            <option value="1">Si</option>
                            <option value="2" selected>No</option>
                        </select>
                    </div>
                    <div class="form-group col-12" id="infoVincle" name="vincleEntitat" hidden="true">
                        <label for="vincleDescripcion">{{ __('admin/donantes.infoVincles') }}</label>
                        <input type="text" class="form-control" id="vincleDescripcion" name="vincleDescripcion" placeholder="{{ __('admin/donantes.placeholder_infoVincles') }}">
                    </div>
                </div>
            </div>
            {{-- GENERAL 2 --}}
            <div class="general2">
                <div class="form-row">
                    <div class="form-group col-xl-6">
                        <label for="inputDireccion">{{ __('admin/donantes.poblacion') }}</label>
                        <input type="text" class="form-control" id="inputDireccion" name="poblacio" placeholder="{{ __('admin/donantes.placeholder_poblacion') }}">
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="inputCif">{{ __('admin/donantes.pais') }}</label>
                        <input type="text" class="form-control" id="inputCife" name="pais" placeholder="{{ __('admin/donantes.placeholder_pais') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xl-6" id="esColaborador">
                        <label for="colaborador">{{ __('admin/donantes.esColaborador') }} *</label>
                        <select id="colaborador" name="colaborador" class="form-control" required>
                            <option value="1">Si</option>
                            <option value="2" selected>No</option>
                        </select>
                    </div>
                    <div class="form-group col-xl-6" id="tipusColaborador" hidden="true">
                        <label for="tipusColaborador">{{ __('admin/donantes.tipusColaborador') }}</label>
                        <select id="tipusColaborador" name="tipusColabo" class="form-control">
                            @foreach ($tipoColaboradores as $tipoColaborador)
                                <option value="{{ $tipoColaborador->id }}">{{ $tipoColaborador->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="spam" id="coordinada">
                        <label class="form-check-label" for="coordinada">{{ __('admin/donantes.spam') }}</label>
                    </div>
                </div>
            </div>
            <div class="col-12 m-0 p-0 mt-2 mb-1">
                <a href="{{ url('/donantes') }}" class="btn btn-danger">{{ __('admin/donantes.volver') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('admin/donantes.crear') }}</button>
            </div>
            <small class="m-0 p-0 mt-2 pb-4">{{ __('admin/donantes.required_fields') }}</small>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/events/newDonante.js') }}"></script>
@endsection
