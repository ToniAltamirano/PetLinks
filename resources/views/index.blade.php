@extends('template.master')

@section('titulo', 'PETLINKS')

@section('contenidor')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
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
                <img class="d-block w-100 slide" src="{{ asset('storage/'. $campaign->imagen) }}" alt="Second slide">
                <div class="carousel-caption align-items-center text-left float-left">
                    <div class="bg-caption h-100 col-4 p-3">
                        @switch(Config::get('app.locale'))
                            @case('ca')
                                <h1 class="title-font mx-auto mt-3 title-corousel2 text-dark">{{ $campaign->titulo_ca }} </h1>
                                <h3 class="text-font mx-auto text-corousel2 text-dark blood">{{ $campaign->subtitulo_ca }}</h3>
                            @break
                            @case('es')
                                <h1 class="title-font  mt-3  title-corousel2 bg-dark">{{ $campaign->titulo_es }}</h1>
                                <h3 class="text-font text-corousel2 blood text-dark">{{ $campaign->subtitulo_es }}</h3>
                            @break
                            @case('en')
                                <h1 class="title-font  mt-3 title-corousel2 bg-dark">{{ $campaign->titulo_en }}</h1>
                                <h3 class="text-font text-corousel2 blood text-dark">{{ $campaign->subtitulo_en }}</h3>
                            @break
                            @default
                                <h1 class="title-font mt-3  title-corousel2 text-dark">{{ $campaign->titulo_es }}</h1>
                                <h3 class="text-font text-corousel2 blood text-dark">{{ $campaign->subtitulo_es }}</h3>
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
</div>

 {{--  <div class="container">
        <div class="row">
          <div class="col-8">
            <h3 class="pt-5">VISITA NUESTRA PROTECTORA!</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
              <button class="btn btn-primary" target="_blank" onclick="window.location.href='https://www.protectoramataro.org/es/necesitamos-donaciones'"> DONATE !</button>
      </div>
          <div class="col-4">
            <img class="p-5"src="{{ asset('img/img.jpg') }}" alt=" ERROR">
          </div>
        </div>
        </div>  --}}
@endsection
