@extends('auth.admin.admin')

@section('datos')
    <div class="container">
        <p>
            <h4>{{ __('admin/tipos.edit_tittle') }}</h4>
        </p>
        @include('partial.errores')
        <form action="{{ action('TipoController@update', [$tipo->id]) }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputNombre">{{ __('admin/tipos.edit_input_name') }} *</label>
                    <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="{{ $tipo->nombre }}" required>
                </div>
            </div>
            <div class="col-12 m-0 p-0 mt-2 mb-1">
                <a href="{{ url('/tipos') }}" class="btn btn-danger">{{ __('admin/tipos.edit_bntReturn') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('admin/tipos.edit_btnEdit') }}</button>
            </div>
            <small class="m-0 p-0 mt-2">{{ __('admin/tipos.required_fields') }}</small>
        </form>
    </div>
@endsection
