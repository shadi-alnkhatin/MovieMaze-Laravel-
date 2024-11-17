@extends('layout')

     @section('content')
      <section class="container" id="container">

            <div class="movie-detail">
                <div class="backdrop-image" style="background-image: url('{{$movie->poster_url}}')"></div>

                <figure class="poster-box movie-poster">
                  <img src="{{$movie->poster_url}}" alt=" poster" class="img-cover">
                </figure>

                <div class="detail-box">
                  <div class="detail-content">
                    <h1 class="heading">{{$movie->title}}</h1>

                    <div class="meta-list">
                      <div class="meta-item">
                        <img src="{{asset('assets')}}/images/star.png" width="20" height="20" alt="rating">
                        <span class="span">4.4</span>

                      </div>

                      <div class="separator"></div>

                      <div class="meta-item">{{$movie->duration}}m</div>

                      <div class="separator"></div>

                      <div class="meta-item">{{$movie->release_year}}</div>


                       <div class="separator"></div>
                       @auth
                       @if(Auth::user()->hasFavorited($movie))
                           <form action="{{ route('favorites.remove', $movie->id) }}" method="POST" style="display:inline;">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="favorite" style="z-index: 1000; display: absolute;">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                       <path fill="red" fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                   </svg>
                               </button>

                           </form>
                       @else
                           <form action="{{ route('favorites.add', $movie->id) }}" method="POST" style="display:inline;">
                               @csrf
                               <button type="submit"  class="favorite" style="z-index: 1000; display: absolute;">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                       <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                   </svg>
                               </button>
                           </form>
                       @endif
                       @endauth
                    </div>

                    <p class="genre">Action,Comedy</p>
                    <p class="overview">{{$movie->description}}</p>

                  </div>

                  <div class="title-wrapper">
                    <h3 class="title-large">Trailers and Clips</h3>
                  </div>

                  <div class="slider-list">

                    <div class="slider-inner">
                        <iframe width="700" height="500" src="{{$movie->trailer_url}}"
                        frameborder="0" allowfullscreen="1" title="Trailer" class="" loading="lazy"></iframe>
                    </div>

                  </div>
                </div>
            </div>

      </section>
    @endsection
