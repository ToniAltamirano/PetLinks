@extends('auth.admin.admin')

@section('datos')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ __('admin/donantes.titleEdit') }}</h5>
    </div>
    @include('partial.errores')
    <div class="card-body">
        <form class="" action="{{ action('DonanteController@update', [$donante->id]) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-row">
                <!-- select para tipos de donantes-->
                <div class="form-froup col-xl-2">
                    <label for="tipoDonante">{{ __('admin/donantes.title') }}</label>
                    <select id="tipoDonante" class="form-control" name="tipoDonacion" required>
                        <option></option>

                        @foreach($tiposDonaciones as $tiposDonacion)
                            @if($tiposDonacion->id == $donante->tipos_donantes_id)
                                <option value="{{ $tiposDonacion->id }}" selected>{{ $tiposDonacion->tipo}}</option>
                            @else
                                <option value="{{ $tiposDonacion->id }}">{{ $tiposDonacion->tipo}}</option>
                            @endif
                        @endforeach

                        {{-- @foreach ($tiposDonaciones as $tipoDonacion)
                            <option value="{{ $tipoDonacion->id }}">{{ $tipoDonacion->tipo }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="form-froup col-xl-2">
                    <label for="inputHabitual">{{ __('admin/donantes.titleHabitual') }}</label>
                    <select id="inputHabitual" name="habitual" class="form-control">
                        @if($donante->es_habitual == 1)
                            <option value="1" selected>Si</option>
                            <option value="2">No</option>
                        @else
                            <option value="1">Si</option>
                            <option value="2" selected>No</option>
                        @endif

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
                <input type="text" class="form-control" id="inputNombre" name="nombre" value="{{$donante->nombre }}" placeholder="{{ __('admin/donantes.placeholder_name') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">{{ __('admin/donantes.surnames') }}</label>
                    <input type="text" class="form-control" id="inputApellidos" name="apellidos" value="{{$donante->apellidos }}" placeholder="{{ __('admin/donantes.placeholder_surnames') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputDNI">{{ __('admin/donantes.dni') }}</label>
                    <input type="text" class="form-control" id="inputDNI" name="dni" value="{{$donante->cif }}" placeholder="{{ __('admin/donantes.placeholder_dni') }}">
                </div>
              </div>

              {{-- TODO Revisar opcion para emprasas --}}
              <div class="form-row mt-3">
                    <div class="form-froup col-xl-2">
                        <label for="tipo">{{ __('admin/donantes.sexo') }}</label>
                        <select id="tipo" class="form-control" name="sexo">
                            <option></option>
                            {{-- @foreach ($sexos as $sexo)
                                <option value="{{ $sexo->id }}">{{ $sexo->sexo }}</option>
                            @endforeach --}}

                            @foreach($sexos as $sexo)
                                @if($sexo->id == $donante->sexos_id)
                                    <option value="{{ $sexo->id }}" selected>{{ $sexo->sexo}}</option>
                                @else
                                    <option value="{{ $sexo->id }}">{{ $sexo->sexo}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-froup col-xl-2" id="tieneAnimales">
                        <label for="tieneAnimales">{{ __('admin/donantes.tieneAnimales') }}</label>
                        <select id="tieneAnimalesSelect" name="tieneAnimales" class="form-control">
                            @if($donante->tiene_animales == 1)
                                <option value="1" selected>Si</option>
                                <option value="2">No</option>
                            @else
                                <option value="1" >Si</option>
                                <option value="2" selected>No</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-froup col-xl-2" id="animales">
                        <label for="animales">{{ __('admin/donantes.animales') }}</label>
                        <select id="animales" class="form-control" name="animales[]"  multiple="multiple" size="3">
                            {{-- @foreach ($animales as $animal)
                                <option value="{{ $animal->id }}">{{ $animal->nombre }}</option>
                            @endforeach --}}

                            @foreach($animales as $animal)
                                @if(in_array($animal->id, $donantes_animales))
                                    <option value="{{ $animal->id }}" selected>{{ $animal->nombre}}</option>
                                @else
                                    <option value="{{ $animal->id }}">{{ $animal->nombre}}</option>
                                @endif
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
                            <label for="inputNombre">{{ __('admin/donantes.razonSocial') }} </label>
                            <input type="text" class="form-control" id="inputNombre" name="razon_social" value="{{ $donante->nombre }}" placeholder="{{ __('admin/donantes.placeholder_razonSocial') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCif">{{ __('admin/donantes.cif') }} </label>
                            <input type="text" class="form-control" id="inputCife" name="cif" value="{{ $donante->cif }}" placeholder="{{ __('admin/donantes.placeholder_cif') }}">
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
                            <input type="text" class="form-control" id="inputDireccion" name="direccion" value="{{ $donante->direccion }}" placeholder="{{ __('admin/donantes.placeholder_direccion') }} ">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCif">{{ __('admin/donantes.telefon') }}</label>
                            <input type="text" class="form-control" id="inputCife" name="telefono" value="{{ $donante->telefono }}" placeholder="{{ __('admin/donantes.placeholder_telefon') }} ">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail">{{ __('admin/donantes.email') }} </label>
                            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $donante->correo }}" placeholder="{{ __('admin/donantes.placeholder_email') }} ">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-2" id="vincleEntitat">
                            <label for="vincleEntitat">{{ __('admin/donantes.vincles') }} </label>
                            <select id="vincleEntitatSelect" name="vincle" class="form-control">
                                @if($donante->vinculo_entidad == null)
                                    <option value="1">Si</option>
                                    <option value="2" selected >No</option>
                                @else
                                    <option value="1" selected>Si</option>
                                    <option value="2">No</option>
                                @endif
                            </select>
                        </div>
                        @if($donante->vinculo_entidad != null)
                        <div class="form-group col-10" id="infoVincle" name="vincleEntitat" >
                            <label for="vincleDescripcion">{{ __('admin/donantes.infoVincles') }} </label>
                            <input type="text" class="form-control" id="vincleDescripcion" value="{{ $donante->vinculo_entidad }}" name="vincleDescripcion" placeholder="{{ __('admin/donantes.placeholder_infoVincles') }}">
                        </div>
                        @endif
                    </div>
                </div>

                {{-- GENERAL 2 --}}
                <div class="general2">
                    <p></p>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="inputDireccion">Població: </label>
                            <input type="text" class="form-control" id="inputDireccion" value="{{ $donante->poblacion }}" name="poblacio" placeholder="Introduce la poblacion">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCif">País: </label>
                            <input type="text" class="form-control" id="inputCife" name="pais" value="{{ $donante->pais }}" placeholder="Introduce el pais">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-2" id="esColaborador">
                            <label for="colaborador">Es colaborador? </label>
                            <select id="colaborador" name="colaborador" class="form-control">
                                @if($donante->es_colaborador == 1)
                                    <option value="1" selected>Si</option>
                                    <option value="2">No</option>
                                @else
                                    <option value="1">Si</option>
                                    <option value="2" selected>No</option>
                                @endif

                            </select>
                        </div>

                        <div class="form-group col-2" id="tipusColaborador" hidden="true">
                            <label for="tipusColaborador">Tipus de colaborador </label>
                            <select id="tipusColaborador" name="tipusColabo" class="form-control">
                                @foreach($tipoColaboradores as $tipoColaborador)
                                    @if($tipoColaborador->id == $donante->tipo_colaboracion)
                                        <option value="{{ $tipoColaborador->id }}" selected>{{ $tipoColaborador->descripcion}}</option>
                                    @else
                                        <option value="{{ $tipoColaborador->id }}">{{ $tipoColaborador->descripcion}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>


            <div class="form-row mt-3">
                <div class="form-group col-xl-3">
                    <div class="form-check">
                        @if($donante->spam == 1)
                            <input class="form-check-input" type="checkbox" value="0" name="spam" checked id="coordinada">
                            <label class="form-check-label" for="coordinada">Vull rebre mes informació</label>
                        @else
                            <input class="form-check-input" type="checkbox" value="1" name="spam" id="coordinada">
                            <label class="form-check-label" for="coordinada">Vull rebre mes informació</label>
                        @endif
                    </div>
                </div>
            </div>

            <a href="{{ url('/donantes') }}" class="btn btn-secondary mt-4">Volver</a>
            <button class="btn btn-primary mt-4" type="submit">Actualizar</button>
        </form>
    </div>
</div>


@endsection

@section('scripts')
    <script src="{{ asset('js/events/newDonante.js') }}"></script>
@endsection
