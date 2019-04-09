@extends('template.master')

@section('titulo', 'PETLINKS')

@section('contenidor')
    <div class="container my-4">
        <div class="jumbotron mt-5">
            <div class="row">
                <img class="h-auto ml-3" src="{{ asset('img/spam_logo.png') }}" alt="imagen">
                <p class="lead col-md-7 mx-auto text-justify">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            </div>
        </div>
        <h1 class="my-5 text-center">CAMPANYES</h1>
        @foreach($campaigns as $key=>$campaign)
        <a href="{{ $campaign->url }}">
            <div class="card col-sm-10 mx-auto text-dark border-0 my-2">
                <img src="{{ asset('storage/'. $campaign->imagen) }}" class="card-img" alt="{{ $campaign->titulo_ca }}">
                <div class="card-img-overlay">
                    <div class="card bg-caption d-inline-block p-3">
                        <h1 class="">{{ $campaign->titulo_ca }}</h1>
                        <h4 class="">{{ $campaign->subtitulo_ca }}</h3>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

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
@endsection
