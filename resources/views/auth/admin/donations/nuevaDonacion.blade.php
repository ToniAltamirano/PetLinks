@extends('auth.admin.admin')

@section('datos')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Nueva donación</h5>
    </div>
    <div class="card-body">
        <form action="">
            <div class="form-row">
                <div class="form-group col-xl-6">
                    <label for="descripcionAnimal">Descripción animal</label>
                    <input type="text" id="inputState" class="form-control">
                </div>


                <div class="form-group col-xl-6">
                    <label for="subtipos">Subtipo donación</label>
                    <select id="subtipos" class="form-control">
                        @foreach ($centros as $centro)
                            <option>{{ $centro->nombre }}</option>
                        @endforeach
                        <option>Otro</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-xl-6">
                    <label for="descripcionAnimal">Descripción animal</label>
                    <input type="text" id="inputState" class="form-control">
                </div>


                <div class="form-group col-xl-6">
                    <label for="centroReceptor">Centro receptor</label>
                    <select id="centroReceptor" class="form-control">
                        @foreach ($centros as $centro)
                            <option>{{ $centro->nombre }}</option>
                        @endforeach
                        <option>Otro</option>
                    </select>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
    </div>
</div>


@endsection
