<nav class="sidebar" id="sidebar" >
    <div class="sidebar-inner">
        <div class="sidebar-list">
            <p class="title">Genre</p>
            @foreach ($genres as $genre )
            <a href="{{route('movie.filter',$genre->id)}}" menu-close class="sidebar-link"
            >{{$genre->name}}</a>
            @endforeach


        </div>
          <div class="sidebar-list">
            <a href="{{route('favorites')}}" menu-close="" class="sidebar-link" style="color: crimson;" >Watch Later list</a>

            {{-- <p class="title">Language</p> --}}

            {{-- <a href="./movie-list.html" menu-close class="sidebar-link"
              onclick='getMovieList("with_original_language=en", "English")'>English</a>
               <a href="./movie-list.html" menu-close class="sidebar-link"
              onclick='getMovieList("with_original_language=ar", "Arabic")'>Arabic</a>
            <a href="./movie-list.html" menu-close class="sidebar-link"
              onclick='getMovieList("with_original_language=tr", "Turkish")'>Turkish</a> --}}

            @auth
           <p class="title">Account</p>
           <a href="{{route('profile.edit')}}" class="sidebar-link">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sidebar-link" menu-close>Logout</button>
        </form>
        @endauth
    </div>
  </nav>
  <div class="overlay" id="overlay" menu-toggler></div>
