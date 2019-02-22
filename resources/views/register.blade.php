@extends('template.master')

@section('contenidor')
<div class="container">
    <div class="card mt-2">
        <div class="card-header bg-secondary text-light text-center">Registro</div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="form-group col-lg-6 col-sm-12 m-auto">
                        <label for="label1" class="col-form-label">Label1</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group col-lg-6 col-sm-12 m-auto">
                        <label for="label2" class="col-form-label">Label2</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 col-sm-12 m-auto">
                        <label for="label3" class="col-form-label">Label3</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group col-lg-6 col-sm-12 m-auto">
                        <label for="label4" class="col-form-label">Label4</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 col-sm-12 m-auto">
                        <label for="label5" class="col-form-label">Label5</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group col-lg-6 col-sm-12 m-auto">
                        <label for="label6" class="col-form-label">Label6</label>
                        <input type="file" class="form-control border-0">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 col-sm-12 m-0">
                        <label for="label7" class="col-form-label">Label7</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row align-content-center">
                    <div class="form-group m-auto">
                        <a href="#" class="btn btn-danger m-2">Cancelar</a>
                        <button type="submit" class="btn btn-info m-2">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
