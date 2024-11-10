<?php

use App\Http\Controllers\ShowSongController;
use Illuminate\Support\Facades\Route;

// Route::get('/',[SpotifyController::class,'redirectToSpotify']);
// Route::get('/callback',[SpotifyController::class,'handleSpotifyCallback']);

Route::get('/', [ShowSongController::class,'homePage']);


