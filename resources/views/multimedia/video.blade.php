@extends('template.master')

@section('titulo', 'Multimedia')

@section('own_CSS')

@endsection

@section('contenidor')

<div class="crud mt-2" style="text-align: center;">
    <button type="button" class="btn btn-light" id="Inici">
        {{ __('video.inici') }}
    </button>

    <button type="button" class="btn btn-light" id="GPP">
       {{ __('video.gpp') }}
    </button>

    <button type="button" class="btn btn-light" id="Gatos">
        {{ __('video.gatos') }}
    </button>
</div>

<div style="text-align: center;">
    <video id="video" width="700" height="300" autoplay="autoplay"  controls class="mx-auto mt-4" style="width: 60%; height: 50%; ">
        <source src="{{ asset('video/spam_24042019.mp4')}}" type="video/mp4">
    </video>
</div>

<div style="text-align: center;" class="Question">
    {{ __('video.pregunta') }}
    <div class="crud mt-2 mb-5" style="text-align: center;">
        <button type="button" class="btn btn-light" id="si">
            {{ __('video.answerYes') }}
        </button>
        <button type="button" class="btn btn-light" id="no">
            {{ __('video.answerNo') }}
        </button>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/events/video.js') }}"></script>
@endsection
