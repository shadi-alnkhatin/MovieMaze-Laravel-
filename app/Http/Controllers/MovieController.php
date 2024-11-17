<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies=Movie::get();

        $Action = Movie::whereHas('genres', function ($query) {
            $query->where('genres.id', 1);
        })->get();
        $Romance=Movie::whereHas('genres', function ($query) {
            $query->where('genres.id', 2);
        })->get();
        $Drama=Movie::whereHas('genres', function ($query) {
            $query->where('genres.id', 3);
        })->get();

        $genresController = new GenreController();
        $genres = $genresController->index();
        return view('home', compact('movies','genres','Action','Romance','Drama'));

    }

    public function detail($id){
        $movie=Movie::findOrFail($id);
        $genresController = new GenreController();
        $genres = $genresController->index();
        return view('detail', compact('movie','genres'));
    }


    public function favoriteList()
{
    $user = Auth::user();

    // Retrieve all favorites for the authenticated user
    $favorites = $user->favorites()->get(); // Get the actual favorites collection

    // Create an array to store movie objects
    $movies = [];

    // Loop through the favorites and get the related movie
    foreach ($favorites as $favorite) {
        $movie = Movie::find($favorite->movie_id); // Use 'movie_id' (check your column name)
        if ($movie) {
            $movies[] = $movie; // Add the movie to the movies array
        }
    }

    // Get genres (if needed)
    $genresController = new GenreController();
    $genres = $genresController->index();

    return view('favorite', compact('movies', 'genres'));
}



    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        $str = $request->query('search'); // Get the 'search' query parameter
        $movies = Movie::where('title', 'LIKE', '%' . $str . '%')
            ->orWhere('description', 'LIKE', '%' . $str . '%')
            ->get();

        $genresController = new GenreController();
        $genres = $genresController->index();

        return view('search-result', compact('movies', 'genres'));
    }


}
