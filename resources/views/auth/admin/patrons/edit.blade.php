@extends('auth.admin.admin')

@section('datos')
    <div class="container">
        <p>
            <h4>{{ __('admin/macropadrins.title_edit') }}</h4>
        </p>
        @include('partial.errores')
        <form action="{{ action('PatronController@update', [$patron->id]) }}') }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputNombre">{{ __('admin/macropadrins.name') }} *</label>
                    <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="{{ __('admin/macropadrins.name') }}" value="{{ $patron->nombre }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputNombre">{{ __('admin/macropadrins.url') }} *</label>
                    <input type="text" class="form-control" id="inputNombre" name="url" placeholder="{{ __('admin/macropadrins.url_placeholder') }}" value="{{ $patron->url }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputNombre">{{ __('admin/macropadrins.img') }} *</label>
                    <img id="imgCampanya" class="mx-auto col-12 mb-4 d-none" src="" alt="">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagen" id="inputImg" aria-describedby="inputGroupFileAddon01" required>
                        <label id="imgName" class="custom-file-label" for="inputImg">{{ __('admin/macropadrins.chooser') }}</label>
                    </div>
                </div>
            </div>
            <div class="col-12 m-0 p-0 mt-2 mb-1">
                <a href="{{ url('/patrons') }}" class="btn btn-danger">{{ __('admin/macropadrins.cancel_btn') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('admin/macropadrins.edit_btn') }}</button>
            </div>
            <small class="m-0 p-0 mt-2">{{ __('admin/macropadrins.required_fields') }}</small>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/events/campaigns.js') }}"></script>
@endsection
