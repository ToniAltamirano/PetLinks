@extends('auth.admin.admin')

@section('datos')
    <div class="container">
        <p>
            <h4>Crear nueva campaña</h4>
        </p>
        <form action="{{ action('CampaignController@store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNombre">CA: </label>
                    <input type="text" class="form-control" id="inputNombre" name="titulo_ca" placeholder="Títol en català" value="{{ old('titulo_ca') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">EN: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="titulo_en" placeholder="Title in english" value="{{ old('titulo_en') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">ES: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="titulo_es" placeholder="Título en español" value="{{ old('titulo_es') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNombre">CA: </label>
                    <input type="text" class="form-control" id="inputNombre" name="subtitulo_ca" placeholder="Subtítol en català" value="{{ old('subtitulo_ca') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">EN: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="subtitulo_en" placeholder="Subtitle in english" value="{{ old('subtitulo_en') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputApellidos">ES: </label>
                    <input type="text" class="form-control" id="inputApellidos" name="subtitulo_es" placeholder="Subtítulo en español" value="{{ old('subtitulo_es') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputNombre">URL: </label>
                    <input type="text" class="form-control" id="inputNombre" name="url" placeholder="Link de la campaña" value="{{ old('url') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputNombre">Imagen de la campaña: </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagen" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" value="{{ old('imagen') }}">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Crear Campaña</button>
        </form>
    </div>
@endsection
