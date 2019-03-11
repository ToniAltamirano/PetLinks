@extends('template.master')

@section('titulo', 'PETLINKS')

@section('contenidor')


<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators" styel="z-index: -1;">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" style="z-index: -1;">
      <img class="d-block w-100 slide" src="{{ asset('img/adopta.jpg')}}" alt="First slide">
      <div class="container">
        <div class="carousel-caption text-left">
          <h1 class="title-font title-corousel">ADOPTA</h1>
          <p class="text-font text-corousel">DONA</p>
        </div>
      </div>
    </div>
    <div class="carousel-item" style="z-index: -1;">
      <img class="d-block w-100 slide" src="{{ asset('img/adopta.jpg')}}" alt="Second slide">
      <div class="carousel-caption text-left">
          <h1 class="title-font title-corousel2">ADOPTA</h1>
          <p class="text-font text-corousel2 blood">DONA</p>
        </div>
    </div>
    <div class="carousel-item" style="z-index: -1;">
      <img class="d-block w-100 slide" src="{{ asset('img/adopta.jpg')}}" alt="Second slide">
      <div class="carousel-caption text-left">
          <h1 class="title-font title-corousel2">ADOPTA</h1>
          <p class="text-font text-corousel2 blood">DONA</p>
        </div>
    </div>
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

<!-- <div class="container">
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
        </div> -->
@endsection




