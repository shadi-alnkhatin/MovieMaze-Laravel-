@extends('layout')
    @section('content')


      <section class="container" id="container">

            <div class="genre-list movie-list">
                <div id="start" class="title-wrapper">
                    <h1 class="heading">All {{$genre->name}} Movies</h1>
                  </div>
                  <div  href="#start" class="pagination"></div>

            <div  class="grid-list">
                    @foreach ($movies as $movie)
                        <x-movie-card :movie="$movie"/>
                     @endforeach

            </div>


                  <div class="pagination">
                    <button class="btn prev" >Previous</button>
                    <button class="btn next">Next</button>
                  </div>
            </div>

      </section>
      @endsection
