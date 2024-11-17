<?php

use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;

// Public routes that are accessible without login
Route::get('/', function () {
    return view('index');
});

Route::get('/home', [MovieController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/favorites',[MovieController::class, 'favoriteList'])->name('favorites');
    Route::post('favorites/{movie}', [FavoriteController::class, 'add'])->name('favorites.add');
    Route::delete('favorites/{movie}', [FavoriteController::class, 'remove'])->name('favorites.remove');

    // Movie-related routes
    Route::get('/details/{id}', [MovieController::class, 'detail'])->name('movie.details');
    Route::get('/filter/{id}', [GenreController::class, 'getMoviesBasedGenre'])->name('movie.filter');
    Route::get('/search', [MovieController::class, 'search'])->name('movie.search');
});

require __DIR__.'/auth.php';
