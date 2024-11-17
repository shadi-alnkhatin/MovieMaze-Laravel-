<header class="header">
    <a href="{{url('/home')}}" class="logo">
      <img

        src="{{asset('assets')}}/images/moviemaze-high-resolution-logo-transparent.png"

        width="140"
        height="32"
        alt="MovieMaze home"
      />
    </a>



    <div class="search-box" search-box>
      <div class="search-wrapper" search-wrapper>
        <form action="{{ route('movie.search') }}" method="GET" class="w-full max-w-md mx-auto mt-8">
            <div class="flex items-center bg-gray-100 rounded-lg overflow-hidden shadow-md">
                <input
                    type="text"
                    name="search"
                    aria-label="search movies"
                    placeholder="Search any movies..."
                    autocomplete="off"
                    min="1"
                    class="w-full px-4 py-2 text-gray-700 bg-transparent border-none focus:outline-none focus:ring-0"
                />
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300"
                >
                <img
                src="{{asset('assets')}}/images/search.png"
                width="24"
                height="24"
                alt="search"
                class="leading-icon"
              />
                </button>
            </div>
        </form>



      </div>

      <button class="search-btn" search-toggler>
        <img
          src="{{asset('assets')}}/images/close.png"
          width="24"
          height="24"
          alt="close search box"
        />
      </button>
    </div>

    <div class="search-btn" search-toggler menu-close>
      <img
        src="{{asset('assets')}}/images/search.png"
        width="24"
        height="24"
        alt="open search box"
      />
    </div>

    <button class="menu-btn" menu-btn menu-toggler>
      <img
        src="{{asset('assets')}}/images/menu.png"
        width="24"
        height="24"
        alt="open menu"
        class="menu"
      />
      <img
        src="{{asset('assets')}}/images/menu-close.png"
        width="24"
        height="24"
        alt="close menu"
        class="close"
      />
    </button>
  </header>
