@extends('auth.admin.admin')

@section('datos')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Nuevo donante</h5>
    </div>
    <div class="card-body">
        <form action="">
            <div class="form-row">
                <!-- select para tipos de donantes-->
                <div class="form-froup col-xl-2">
                    <label for="tipo">Tipo de donante</label>
                    <select id="tipo" class="form-control" required>
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
                    <input type="text" class="form-control" id="inputDNI" name="dni" placeholder="Introduce el DNI">
                </div>
              </div>
              <div class="form-row mt-3">
                    <div class="form-froup col-xl-2">
                        <label for="tipo">Sexo: </label>
                        <select id="tipo" class="form-control" required>
                            <option></option>
                            @foreach ($sexos as $sexo)
                                <option value="{{ $sexo->id }}">{{ $sexo->sexo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-froup col-xl-2">
                        <label for="inputHabitual">Tiene animales: </label>
                        <select id="inputHabitual" name="habitual" class="form-control">
                            <option value="1" selected >Si</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                    <div class="form-froup col-xl-2">
                        <label for="tipo">Animales: </label>
                        <select id="tipo" class="form-control" required>
                            <option></option>
                            @foreach ($animales as $animal)
                                <option value="{{ $animal->id }}">{{ $animal->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <p></p>
                <h5>Empresas</h5>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="inputNombre">Raón Social: </label>
                        <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Introduce la razón social">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCif">Cif: </label>
                        <input type="text" class="form-control" id="inputCife" name="cid" placeholder="Introduce el cif">
                    </div>
                </div>


                <p></p>
                <h5>General</h5>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="inputDireccion">Direccion: </label>
                        <input type="text" class="form-control" id="inputDireccion" name="direccion" placeholder="Introduce la direccion">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCif">Telefon: </label>
                        <input type="text" class="form-control" id="inputCife" name="cif" placeholder="Introduce el cif">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail">Email: </label>
                        <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Introduce el email">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="inputDireccion">Vincle entitat: </label>
                        <input type="text" class="form-control" id="inputDireccion" name="direccion" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCif">Com ens has conegut?: </label>
                        <input type="text" class="form-control" id="inputCife" name="cif" placeholder="">
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
