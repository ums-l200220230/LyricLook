<?php

use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;


Route::get('/login-spotify',[SpotifyController::class, 'login'])->name('login.spotify');
Route::get('/callback',[SpotifyController::class,'callback']);
Route::get('/',[SpotifyController::class,'home'])->name('home');

// Route::get('/',function(){
//     return view('home');
// })->name('home');

Route::get('/login',function(){
    return view('auth/login');
})->name('login');
Route::get('/categories',function(){
    return view('categories');
});

Route::get('/artist', function(){
    return view('artist');
});





