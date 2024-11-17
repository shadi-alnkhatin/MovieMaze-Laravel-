@extends('layout')

@section('content')
<div class="genre-list movie-list">
    <div id="start" class="title-wrapper">
        <h2 class="heading">Your Favorites Movies</h2>
      </div>


<div  class="grid-list">
        @foreach ($movies as $movie)
            <x-movie-card :movie="$movie"/>
         @endforeach

</div>

@endsection
