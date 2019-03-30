@extends('auth.admin.admin')

@section('datos')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Nuevo donante</h5>
    </div>
    <div class="card-body">
        <form class="" action="{{ action('DonanteController@store') }}" method="post">
            @csrf
            <div class="form-row">
                <!-- select para tipos de donantes-->
                <div class="form-froup col-xl-2">
                    <label for="tipoDonante">Tipo de donante</label>
                    <select id="tipoDonante" class="form-control" name="tipoDonacion" required>
                        <option></option>
                        @foreach ($tiposDonacion as $tipoDonacion)
                            <option value="{{ $tipoDonacion->id }}">{{ $tipoDonacion->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-froup col-xl-2">
                    <label for="inputHabitual">Habitual: </label>
                    <select id="inputHabitual" name="habitual" class="form-control">
                      <option value="1">Si</option>
                      <option value="2" selected>No</option>
                    </select>
                </div>
              </div>

               {{-- PARTICULARES --}}

              <div class="particulares">
                <p></p>
              <h5>Particulares</h5>
              <div class="form-row mt-3">
                <div class="form-group col-md-4">
                    <label for="inputNombre">Nombre: </label>
                    <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Introduce el nombre">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">Apellidos: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="apellidos" placeholder="Introduce los apellidos">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputDNI">DNI: </label>
                    <input type="text" class="form-control" id="inputDNI" maxlength="9" name="dni" placeholder="Introduce el DNI">
                </div>
              </div>

              {{-- TODO Revisar opcion para emprasas --}}
              <div class="form-row mt-3">
                    <div class="form-froup col-xl-2">
                        <label for="tipo">Sexo: </label>
                        <select id="tipo" class="form-control" name="sexo">
                            <option></option>
                            @foreach ($sexos as $sexo)
                                <option value="{{ $sexo->id }}">{{ $sexo->sexo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-froup col-xl-2" id="tieneAnimalesdiv">
                        <label for="tieneAnimalesdiv">Tiene animales: </label>
                        <select id="tieneAnimalesSelect" name="tieneAnimales" class="form-control">
                            <option value="1" >Si</option>
                            <option value="2" selected>No</option>
                        </select>
                    </div>
                    <div class="form-froup col-xl-2" id="animalesdiv">
                        <label for="animales">Animales: </label>
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
                    <h5>Empresas</h5>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="inputNombre">Raón Social: </label>
                            <input type="text" class="form-control" id="inputNombre" name="razon_social" placeholder="Introduce la razón social">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCif">Cif: </label>
                            <input type="text" class="form-control" id="inputCife" maxlength="9" name="cif" placeholder="Introduce el cif">
                        </div>
                    </div>
                </div>

                {{-- GENERAL --}}
                <div class="general">
                    <p></p>
                    <h5>General</h5>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="inputDireccion">Direccion: </label>
                            <input type="text" class="form-control" id="inputDireccion" name="direccion" placeholder="Introduce la direccion">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCif">Telefon: </label>
                            <input type="text" class="form-control" id="inputCife" name="telefono" placeholder="Introduce el telefono">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail">Email: </label>
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Introduce el email">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-2" id="vincleEntitat">
                            <label for="vincleEntitat">Vincle entitat: </label>
                            <select id="vincleEntitatSelect" name="vincle" class="form-control">
                                <option value="1">Si</option>
                                <option value="2" selected>No</option>
                            </select>
                        </div>
                        <div class="form-group col-10" id="infoVincle" name="vincleEntitat" hidden="true">
                            <label for="vincleDescripcion">Com ens has conegut?: </label>
                            <input type="text" class="form-control" id="vincleDescripcion" name="vincleDescripcion" placeholder="">
                        </div>
                    </div>
                </div>

                {{-- GENERAL 2 --}}
                <div class="general2">
                    <p></p>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="inputDireccion">Població: </label>
                            <input type="text" class="form-control" id="inputDireccion" name="poblacio" placeholder="Introduce la poblacion">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCif">País: </label>
                            <input type="text" class="form-control" id="inputCife" name="pais" placeholder="Introduce el pais">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-2" id="esColaborador">
                            <label for="colaborador">Es colaborador? </label>
                            <select id="colaborador" name="colaborador" class="form-control">
                                <option value="1">Si</option>
                                <option value="2" selected>No</option>
                            </select>
                        </div>
                        <div class="form-group col-2" id="tipusColaborador" hidden="true">
                            <label for="tipusColaborador">Tipus de colaborador </label>
                            <select id="tipusColaborador" name="tipusColabo" class="form-control">
                                {{-- <option value="1">Adoptant</option>
                                <option value="2">Padrí</option>
                                <option value="3">Voluntario</option>
                                <option value="4">RRSS</option>
                                <option value="5">Patrocini</option>
                                <option value="6">Altres</option> --}}
                                @foreach ($tipoColaboradores as $tipoColaborador)
                                    <option value="{{ $tipoColaborador->descripcion }}">{{ $tipoColaborador->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


            <div class="form-row mt-3">
                <div class="form-group col-xl-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="spam" id="coordinada">
                        <label class="form-check-label" for="coordinada">Vull rebre mes informació</label>
                    </div>
                </div>
            </div>

            <a href="{{ url('/donaciones') }}" class="btn btn-secondary mt-4">Volver</a>
            <button class="btn btn-primary mt-4" type="submit">Añadir</button>
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
