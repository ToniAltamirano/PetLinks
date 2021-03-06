@extends('template.master')

@section('titulo', 'PETLINKS')

@section('contenidor')
    <div class="container my-5">
        <div class="jumbotron">
            <div class="row text-center">
                <img class="h-auto mx-auto" src="{{ asset('img/spam_logo.png') }}" alt="imagen">
                <div class="col-md-7 mx-auto text-justify">
                    <p class="lead">{{ __('index.presentation') }}</p>
                    <p class="lead">{{ __('index.presentation2') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3 mb-3 mr-auto ml-auto p-2">
        <h1 class="my-3 display-4 text-center">{{ __('index.challenges_title') }}</h1>
        <h6>{{ __('index.challenge_food_title') }}</h6>

        <div class="row m-3">
            <div class="progress bg-secondary col-10 p-0 m-auto">
                <div id="progressBarPinso" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="col-2">
                <h6 class="m-auto">1000 kg</h6>
            </div>
        </div>

        <h6>{{ __('index.challenge_money_title') }}</h6>
        <div class="row m-3">
            <div class="progress bg-secondary col-10 p-0 m-auto">
                <div id="progressBarDiners" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="col-2">
                <h6 class="m-auto">10000 €</h6>
            </div>
        </div>
    </div>

    <h1 class="my-5 display-4 text-center">{{ __('index.campaigns') }}</h1>
    @foreach($campaigns as $key=>$campaign)
        <a href="{{ $campaign->url }}">
            <div class="jumbotron rounded-0 bg-cover w-100 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url('{{ asset('storage/'. $campaign->imagen) }}')">
                <div class="row">
                    @switch(Config::get('app.locale'))
                        @case('ca')
                            <h2 class="col-12">{{ $campaign->titulo_ca }} </h2>
                            <h4 class="col-12 lead">{{ $campaign->subtitulo_ca }}</h4>
                        @break
                        @case('es')
                            <h2 class="col-12">{{ $campaign->titulo_es }}</h2>
                            <h4 class="col-12 lead">{{ $campaign->subtitulo_es }}</h4>
                        @break
                        @case('en')
                            <h2 class="col-12">{{ $campaign->titulo_en }}</h2>
                            <h4 class="col-12 lead">{{ $campaign->subtitulo_en }}</h4>
                        @break
                        @default
                            <h2 class="col-12">{{ $campaign->titulo_ca }}</h2>
                            <h4 class="col-12 lead">{{ $campaign->subtitulo_ca }}</h4>
                        @break
                    @endswitch
                </div>
            </div>
        </a>
    @endforeach
    {{-- <div class="jumbotron bg-cover w-100 text-white text-center">
        <div class="row">
            <h1 class="display-3 mx-auto">Societat Protectora D'Animals de Mataró</h1>
            {{-- <img class="h-auto ml-3" src="{{ asset('img/spam_logo.png') }}" alt="imagen"> --}}
            {{-- <p class="lead col-md-7 mx-auto text-justify">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
        {{-- </div>
    </div> --}}
    {{-- <div class="container my-4">
        <h1 class="my-5 text-center">CAMPANYES</h1>
        @foreach($campaigns as $key=>$campaign)
        <a href="{{ $campaign->url }}">
            <div class="card col mx-auto text-dark border-0 my-2 mx-0 p-0">
                <img src="{{ asset('storage/'. $campaign->imagen) }}" class="card-img card-campaign" alt="{{ $campaign->titulo_ca }}">
                <div class="card-img-overlay">
                    <div class="card bg-caption d-inline-block p-3">
                        <h2 class="">{{ $campaign->titulo_ca }}</h2>
                        <h4 class="">{{ $campaign->subtitulo_ca }}</h4>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div> --}}

    {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators" sytle="z-index: -1;">
            @for($i=0; $i< count($campaigns);$i++)
                @if($i==0)
                    <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="active"></li>
                @else
                    <li data-target="#myCarousel" data-slide-to="{{ $i }}"></li>
                @endif
            @endfor
        </ol>
    <div class="carousel-inner">
        @foreach($campaigns as $key=>$campaign)
            @if($key == 0)
                <div class="carousel-item active" style="z-index: -1;">
            @else
                <div class="carousel-item" style="z-index: -1;">
            @endif
                <img class="d-block w-100 h-auto slide" src="{{ asset('storage/'. $campaign->imagen) }}" alt="Second slide">
                <div class="carousel-caption align-items-center">
                    <div class="bg-caption card h-100 col-lg-4 col-xl-3 p-3 text-left">
                        @switch(Config::get('app.locale'))
                            @case('ca')
                                <h2 class="title-font title-corousel2 text-dark">{{ $campaign->titulo_ca }} </h2>
                                <h4 class="text-font text-corousel2 text-dark blood">{{ $campaign->subtitulo_ca }}</h4>
                            @break
                            @case('es')
                                <h2 class="title-font title-corousel2 bg-dark">{{ $campaign->titulo_es }}</h2>
                                <h4 class="text-font text-corousel2 blood text-dark">{{ $campaign->subtitulo_es }}</h4>
                            @break
                            @case('en')
                                <h2 class="title-font title-corousel2 bg-dark">{{ $campaign->titulo_en }}</h2>
                                <h4 class="text-font text-corousel2 blood text-dark">{{ $campaign->subtitulo_en }}</h4>
                            @break
                            @default
                                <h2 class="title-font title-corousel2 text-dark">{{ $campaign->titulo_es }}</h2>
                                <h4 class="text-font text-corousel2 blood text-dark">{{ $campaign->subtitulo_es }}</h4>
                            @break
                        @endswitch
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-link" href="gamesGrid.php">
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> --}}



@endsection

@section('scripts')
    <script src="{{ asset('libs/bcSwipe/jquery.bcSwipe.min.js') }}"></script>
    <script src="{{ asset('js/events/carousel.js') }}"></script>
    <script src="{{ asset('js/events/reptes.js') }}"></script>
@endsection
