@extends('auth.admin.admin')

@section('datos')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('admin/tipos.edit_tittle') }}</h5>
        </div>
        <div class="card-body">
            <form class="" action="{{ action('TipoController@update', [$tipo->id]) }}" method="post">
                @method('put')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputNombre">{{ __('admin/tipos.edit_input_name') }}</label>
                        <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="{{ $tipo->nombre }}" required>
                    </div>
                </div>

                <a href="{{ url('/tipos') }}" class="btn btn-secondary mt-4">{{ __('admin/tipos.edit_bntReturn') }}</a>
                <button class="btn btn-primary mt-4" type="submit">{{ __('admin/tipos.edit_btnEdit') }}</button>
            </form>
        </div>
    </div>
@endsection
