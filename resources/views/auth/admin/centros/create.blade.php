@extends('auth.admin.admin')

@section('datos')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">NUEVO CENTRO</h5>
        </div>
        <div class="card-body">
            <form action="{{ action('/centros') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group row col-12 col-md-6">
                        <label class="form-control col-md-2" for="nombre">{{ __("admin/centros.name"}})</label>
                        <input type="text" name="nombre" id="txtNombre" class="form-control col-md-4">
                    </div>
                    <div class="form-group row col-12 col-md-6">

                    </div>
                    <div class="form-group row col-12 col-md-6">

                    </div>
                    <div class="form-group row col-12 col-md-6">

                    </div>
                    <div class="form-group row col-12 col-md-6">

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
