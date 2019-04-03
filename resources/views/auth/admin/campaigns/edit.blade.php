@extends('auth.admin.admin')

@section('datos')
    <div class="container">
        <p>
            <h4>{{ __('admin/campañas.update_title_create') }}</h4>
        </p>
        @include('partial.errores')
        <form action="{{ action('CampaignController@update', [$campaign->id]) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNombre">{{ __('admin/campañas.update_title_ca') }}: </label>
                    <input type="text" class="form-control" id="inputNombre" name="titulo_ca" placeholder="{{ __('admin/campañas.update_title_ca_placeholder') }}" value="{{ $campaign->titulo_ca }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">{{ __('admin/campañas.update_title_en') }}: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="titulo_en" placeholder="{{ __('admin/campañas.update_title_en_placeholder') }}" value="{{ $campaign->titulo_en }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">{{ __('admin/campañas.update_title_es') }}: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="titulo_es" placeholder="{{ __('admin/campañas.update_title_es_placeholder') }}" value="{{ $campaign->titulo_es }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNombre">{{ __('admin/campañas.update_subtitle_ca') }}: </label>
                    <input type="text" class="form-control" id="inputNombre" name="subtitulo_ca" placeholder="{{ __('admin/campañas.update_subtitle_ca_placeholder') }}" value="{{ $campaign->subtitulo_ca }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">{{ __('admin/campañas.update_subtitle_en') }}: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="subtitulo_en" placeholder="{{ __('admin/campañas.update_subtitle_en_placeholder') }}" value="{{ $campaign->subtitulo_en }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">{{ __('admin/campañas.update_subtitle_es') }}: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="subtitulo_es" placeholder="{{ __('admin/campañas.update_subtitle_es_placeholder') }}" value="{{ $campaign->subtitulo_es }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputNombre">{{ __('admin/campañas.update_url_label') }}: </label>
                    <input type="text" class="form-control" id="inputNombre" name="url" placeholder="{{ __('admin/campañas.update_url_placeholder') }}" value="{{ $campaign->url }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputNombre">{{ __('admin/campañas.update_img_label') }}: </label>
                    <img id="imgCampanya" class="mx-auto col-12 mb-4" src="" alt="">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagen" id="inputImg" aria-describedby="inputGroupFileAddon01" value="">
                        <label id="imgName" class="custom-file-label" for="inputImg">{{ __('admin/campañas.update_chooser') }}</label>
                    </div>
                </div>
            </div>
            <a href="{{ url('/campaigns') }}" class="btn btn-danger">{{ __('admin/campañas.update_cancel_btn') }}</a>
            <button type="submit" class="btn btn-primary my-3">{{ __('admin/campañas.update_add_btn') }}</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/events/campaigns.js') }}"></script>
@endsection
