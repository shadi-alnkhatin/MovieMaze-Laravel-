@extends('layout')

@section('content')

    @if ($movies->count() > 0)
        <div class="genre-list movie-list">
            <div id="start" class="title-wrapper">
                <h2 class="heading">Search Result</h2>
            </div>

            <div class="grid-list">
                @foreach ($movies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach
            </div>
        </div>
    @else
        <h1 class="heading">There are no films based on your search text 😥</h2>
    @endif

@endsection
