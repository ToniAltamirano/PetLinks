@extends('auth.admin.admin')

@section('datos')
    <div class="container">
        <p>
            <h4>{{ __('admin/campañas.create_title_create') }}</h4>
        </p>
        @include('partial.errores')
        <form action="{{ action('CampaignController@store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNombre">{{ __('admin/campañas.create_title_ca') }} *</label>
                    <input type="text" class="form-control" id="inputNombre" name="titulo_ca" placeholder="{{ __('admin/campañas.create_title_ca_placeholder') }}" value="{{ old('titulo_ca') }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">{{ __('admin/campañas.create_title_en') }} *</label>
                    <input type="text" class="form-control" id="inputApellidos" name="titulo_en" placeholder="{{ __('admin/campañas.create_title_en_placeholder') }}" value="{{ old('titulo_en') }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">{{ __('admin/campañas.create_title_es') }} *</label>
                    <input type="text" class="form-control" id="inputApellidos" name="titulo_es" placeholder="{{ __('admin/campañas.create_title_es_placeholder') }}" value="{{ old('titulo_es') }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNombre">{{ __('admin/campañas.create_subtitle_ca') }} </label>
                    <input type="text" class="form-control" id="inputNombre" name="subtitulo_ca" placeholder="{{ __('admin/campañas.create_subtitle_ca_placeholder') }}" value="{{ old('subtitulo_ca') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">{{ __('admin/campañas.create_subtitle_en') }} </label>
                    <input type="text" class="form-control" id="inputApellidos" name="subtitulo_en" placeholder="{{ __('admin/campañas.create_subtitle_en_placeholder') }}" value="{{ old('subtitulo_en') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">{{ __('admin/campañas.create_subtitle_es') }} </label>
                    <input type="text" class="form-control" id="inputApellidos" name="subtitulo_es" placeholder="{{ __('admin/campañas.create_subtitle_es_placeholder') }}" value="{{ old('subtitulo_es') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputNombre">URL </label>
                    <input type="text" class="form-control" id="inputNombre" name="url" placeholder="{{ __('admin/campañas.create_url_placeholder') }}" value="{{ old('url') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputNombre">{{ __('admin/campañas.create_img_label') }} *</label>
                    <img id="imgCampanya" class="rounded mx-auto d-block col-6 mb-1" style="max-width: 450px; max-height: 300px">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagen" id="inputImg" aria-describedby="inputGroupFileAddon01" required>
                        <label id="imgName" class="custom-file-label" for="inputImg">{{ __('admin/campañas.create_chooser') }}</label>
                    </div>
                </div>
            </div>
            <div class="col-12 m-0 p-0 mt-2 mb-1">
                <a href="{{ url('/campaigns') }}" class="btn btn-danger">{{ __('admin/campañas.create_cancel_btn') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('admin/campañas.create_add_btn') }}</button>
            </div>
            <small class="m-0 p-0 mt-2">Els camps indicats amb un * són obligatoris.</small>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/events/campaigns.js') }}"></script>
@endsection
