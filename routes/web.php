<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;

// login user
Route::get('/login-spotify',[SpotifyController::class, 'login'])->name('login.spotify');
Route::get('/callback',[SpotifyController::class,'callback']);


// page
Route::get('/',[SpotifyController::class,'home'])->name('home');
Route::get('/categories',[SpotifyController::class, 'categories'])->name('categories');
Route::get('/categories/{id}',[SpotifyController::class, 'getSongbyCategory'])->name('song');
Route::get('/playlist',[SpotifyController::class, 'playlist'])->name('playlist');
Route::get('/playlist/{id}',[SpotifyController::class,'getUserTracks'])->name('tracks');

Route::post('/home/store-review', [SpotifyController::class, 'store'])->name('store.review');
Route::post('/login', [AdminController::class, 'login']);
Route::get('/logout',[SpotifyController::class,'logout'])->name('logout');
Route::get('/login',function(){
    return view('auth/login');
})->name('login');



