@extends('auth.admin.admin')

@section('datos')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('admin/tipos.create_tittle') }}</h5>
        </div>
        <div class="card-body">
            <form class="" action="{{ action('TipoController@store') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputNombre">{{ __('admin/tipos.create_input_name') }}</label>
                        <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre tipo">
                    </div>
                </div>

                <a href="{{ url('/tipos') }}" class="btn btn-secondary mt-4">{{ __('admin/tipos.create_btnReturn') }}</a>
                <button class="btn btn-primary mt-4" type="submit">{{ __('admin/tipos.create_btnCreate') }}</button>
            </form>
        </div>
    </div>
@endsection
