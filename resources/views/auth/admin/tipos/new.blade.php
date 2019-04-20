@extends('auth.admin.admin')

@section('datos')
    <div class="container">
        <p>
            <h4>{{ __('admin/tipos.index_tittle') }}</h4>
        </p>
        @include('partial.errores')
        <form class="" action="{{ action('TipoController@store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputNombre">{{ __('admin/tipos.create_input_name') }} *</label>
                    <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre tipo" required>
                </div>
            </div>
            <div class="col-12 m-0 p-0 mt-2 mb-1">
                <a href="{{ url('/tipos') }}" class="btn btn-danger">{{ __('admin/tipos.create_btnReturn') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('admin/tipos.create_btnCreate') }}</button>
            </div>
            <small class="m-0 p-0 mt-2">{{ __('admin/tipos.required_fields') }}</small>
        </form>
    </div>
@endsection
