<?php

use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;

// login
Route::get('/login-spotify',[SpotifyController::class, 'login'])->name('login.spotify');
Route::get('/callback',[SpotifyController::class,'callback']);


// page
Route::get('/',[SpotifyController::class,'home'])->name('home');
Route::get('/categories',[SpotifyController::class, 'categories'])->name('categories');
Route::get('/artist',[SpotifyController::class, 'artist'])->name('artist');
Route::get('/playlist',[SpotifyController::class, 'playlist'])->name('playlist');
Route::get('/logout',[SpotifyController::class,'logout'])->name('logout');

Route::get('/login',function(){
    return view('auth/login');
})->name('login');




