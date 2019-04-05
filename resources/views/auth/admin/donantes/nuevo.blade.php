@extends('auth.admin.admin')

@section('datos')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ __('admin/donantes.titleCreate') }}</h5>
    </div>
    @include('partial.errores')
    <div class="card-body">
        <form class="" action="{{ action('DonanteController@store') }}" method="post">
            @csrf
            <div class="form-row">
                <!-- select para tipos de donantes-->
                <div class="form-froup col-xl-2">
                    <label for="tipoDonante">{{ __('admin/donantes.title') }}</label>
                    <select id="tipoDonante" class="form-control" name="tipoDonacion" required>
                        <option></option>
                        @foreach ($tiposDonacion as $tipoDonacion)
                            <option value="{{ $tipoDonacion->id }}">{{ $tipoDonacion->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-froup col-xl-2">
                    <label for="inputHabitual">{{ __('admin/donantes.titleHabitual') }}</label>
                    <select id="inputHabitual" name="habitual" class="form-control">
                      <option value="1">Si</option>
                      <option value="2" selected>No</option>
                    </select>
                </div>
              </div>

               {{-- PARTICULARES --}}

              <div class="particulares">
                <p></p>
              <h5>{{ __('admin/donantes.titleParticulares') }}</h5>
              <div class="form-row mt-3">
                <div class="form-group col-md-4">
                    <label for="inputNombre">{{ __('admin/donantes.name') }}</label>
                    <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="{{ __('admin/donantes.placeholder_name') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">{{ __('admin/donantes.surnames') }}</label>
                    <input type="text" class="form-control" id="inputApellidos" name="apellidos" placeholder="{{ __('admin/donantes.placeholder_surnames') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputDNI">{{ __('admin/donantes.dni') }}</label>
                    <input type="text" class="form-control" id="inputDNI" maxlength="9" name="dni" placeholder="{{ __('admin/donantes.placeholder_dni') }}">
                </div>
              </div>

              {{-- TODO Revisar opcion para emprasas --}}
              <div class="form-row mt-3">
                    <div class="form-froup col-xl-2">
                        <label for="tipo">{{ __('admin/donantes.sexo') }}</label>
                        <select id="tipo" class="form-control" name="sexo">
                            <option></option>
                            @foreach ($sexos as $sexo)
                                <option value="{{ $sexo->id }}">{{ $sexo->sexo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-froup col-xl-2" id="tieneAnimalesdiv">
                        <label for="tieneAnimalesdiv">{{ __('admin/donantes.tieneAnimales') }}</label>
                        <select id="tieneAnimalesSelect" name="tieneAnimales" class="form-control">
                            <option value="1" >Si</option>
                            <option value="2" selected>No</option>
                        </select>
                    </div>
                    <div class="form-froup col-xl-2" id="animalesdiv">
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
                    <p></p>
                    <h5>{{ __('admin/donantes.titleEmpresa') }}</h5>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="inputNombre">{{ __('admin/donantes.razonSocial') }}</label>
                            <input type="text" class="form-control" id="inputNombre" name="razon_social" placeholder="{{ __('admin/donantes.placeholder_razonSocial') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCif">{{ __('admin/donantes.cif') }}</label>
                            <input type="text" class="form-control" id="inputCife" maxlength="9" name="cif" placeholder="{{ __('admin/donantes.placeholder_cif') }}">
                        </div>
                    </div>
                </div>

                {{-- GENERAL --}}
                <div class="general">
                    <p></p>
                    <h5>{{ __('admin/donantes.titleGeneral') }}</h5>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="inputDireccion">{{ __('admin/donantes.direccion') }} </label>
                            <input type="text" class="form-control" id="inputDireccion" name="direccion" placeholder="{{ __('admin/donantes.placeholder_direccion') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCif">{{ __('admin/donantes.telefon') }}</label>
                            <input type="text" class="form-control" id="inputCife" name="telefono" placeholder="{{ __('admin/donantes.placeholder_telefon') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail">{{ __('admin/donantes.email') }}</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="{{ __('admin/donantes.placeholder_email') }}">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-2" id="vincleEntitat">
                            <label for="vincleEntitat">{{ __('admin/donantes.vincles') }} </label>
                            <select id="vincleEntitatSelect" name="vincle" class="form-control">
                                <option value="1">Si</option>
                                <option value="2" selected>No</option>
                            </select>
                        </div>
                        <div class="form-group col-10" id="infoVincle" name="vincleEntitat" hidden="true">
                            <label for="vincleDescripcion">{{ __('admin/donantes.infoVincles') }}</label>
                            <input type="text" class="form-control" id="vincleDescripcion" name="vincleDescripcion" placeholder="{{ __('admin/donantes.placeholder_infoVincles') }}">
                        </div>
                    </div>
                </div>

                {{-- GENERAL 2 --}}
                <div class="general2">
                    <p></p>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="inputDireccion">{{ __('admin/donantes.poblacion') }}</label>
                            <input type="text" class="form-control" id="inputDireccion" name="poblacio" placeholder="{{ __('admin/donantes.placeholder_poblacion') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCif">{{ __('admin/donantes.pais') }}</label>
                            <input type="text" class="form-control" id="inputCife" name="pais" placeholder="{{ __('admin/donantes.placeholder_pais') }}">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-2" id="esColaborador">
                            <label for="colaborador">{{ __('admin/donantes.esColaborador') }}</label>
                            <select id="colaborador" name="colaborador" class="form-control">
                                <option value="1">Si</option>
                                <option value="2" selected>No</option>
                            </select>
                        </div>
                        <div class="form-group col-2" id="tipusColaborador" hidden="true">
                            <label for="tipusColaborador">{{ __('admin/donantes.tipusColaborador') }} </label>
                            <select id="tipusColaborador" name="tipusColabo" class="form-control">
                                {{-- <option value="1">Adoptant</option>
                                <option value="2">Padrí</option>
                                <option value="3">Voluntario</option>
                                <option value="4">RRSS</option>
                                <option value="5">Patrocini</option>
                                <option value="6">Altres</option> --}}
                                @foreach ($tipoColaboradores as $tipoColaborador)
                                    <option value="{{ $tipoColaborador->id }}">{{ $tipoColaborador->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


            <div class="form-row mt-3">
                <div class="form-group col-xl-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="spam" id="coordinada">
                        <label class="form-check-label" for="coordinada">{{ __('admin/donantes.spam') }}</label>
                    </div>
                </div>
            </div>

            <a href="{{ url('/donantes') }}" class="btn btn-secondary mt-4">{{ __('admin/donantes.volver') }}</a>
            <button class="btn btn-primary mt-4" type="submit">{{ __('admin/donantes.crear') }}</button>
        </form>
    </div>
</div>


  <!-- Default switch -->
  {{-- <div class="custom-control custom-switch mt-3">
        <input type="checkbox" class="custom-control-input" id="customSwitches">
        <label class="custom-control-label" for="customSwitches">Anónimo</label>
    </div> --}}



@endsection

@section('scripts')
    <script src="{{ asset('js/events/newDonante.js') }}"></script>
@endsection
