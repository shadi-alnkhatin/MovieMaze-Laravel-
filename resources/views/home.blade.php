@extends('layout')
@section('content')
      <section class="container" id="container" >

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

          <div class="carousel-inner" > <!-- Adjust the height here -->
            <div class="carousel-item active">
              <img src="https://t3.ftcdn.net/jpg/06/62/88/84/360_F_662888417_FMXrcGIeFkfHIdmOnUfFIcEQYKQoWCne.jpg" class="d-block w-100 h-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
              <img src="https://static.vecteezy.com/system/resources/thumbnails/028/274/915/small/strong-athletic-male-fighter-view-from-the-back-photo.jpg" class="d-block w-100 h-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
              <img src="https://c4.wallpaperflare.com/wallpaper/619/789/88/action-cyborg-film-movie-wallpaper-preview.jpg" class="d-block w-100 h-100" alt="Slide 3">
            </div>
          </div>


        </div>
        <br>
        <h2 class="my-5">Action</h2>
        <div class="slider-list">
          <div class="slider-inner">

            @foreach ($Action as $movie)
            <x-movie-card :movie="$movie" />
            @endforeach

          </div>
        </div>

        <br>
        <h2 class="my-5">Romance</h2>
        <div class="slider-list">
          <div class="slider-inner">
            @foreach ($Romance as $movie)
            <x-movie-card :movie="$movie" />
            @endforeach
          </div>
        </div>


        <h2 class="my-5">Drama</h2>

        <div class="slider-list">
          <div class="slider-inner">
            @foreach ($Drama as $movie)
            <x-movie-card :movie="$movie" />
            @endforeach
          </div>
        </div>


      </section>
      @endsection
