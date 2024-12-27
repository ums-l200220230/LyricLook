<?php

use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;


// Route::get('/login', [SpotifyController::class, 'redirectToSpotify'])->name('spotify.login');
// Route::get('/callback', [SpotifyController::class, 'handleSpotifyCallback'])->name('spotify.callback');
// Route::get('/{artistId}', [SpotifyController::class, 'popularsong'])->name('home');
Route::get('/',function(){
    return view('home');
});






