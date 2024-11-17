<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

namespace App\View\Components;

use Illuminate\View\Component;

class MovieCard extends Component
{

    public $movie;

    /**
     * Create a new component instance.
     *
     * @param $movie 
     */
    public function __construct($movie)
    {
        $this->movie = $movie;  // Store the movie data in the class property
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.movie-card'); // Return the movie-card view
    }
}
