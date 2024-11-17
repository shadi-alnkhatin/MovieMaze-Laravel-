<div class="movie-card">
    <figure class="poster-box card-banner" style="display: relative;">
        <a href="{{ route('movie.details', $movie->id) }}" title="{{ $movie->title }}">
            <img src="{{ $movie->poster_url }}" class="img-cover" width="100%"  loading="lazy">
        </a>
    </figure>

    <a href="{{ route('movie.details', $movie->id) }}" title="{{ $movie->title }}">
        <h4 class="title">{{ $movie->title }}</h4>
    </a>



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

    <div class="meta-list">
        <div class="meta-item">
            <img src="{{asset('assets')}}/images/star.png" width="20" height="20" loading="lazy" alt="rating">
            <span class="span">4.5</span>
        </div>

        <div class="card-badge">{{ $movie->release_year }}</div>
    </div>
</div>
