<?php

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

Route::post('/playlist/create', [SpotifyController::class, 'create'])->name('playlist.create');
Route::put('/playlist/{id}/rename', [SpotifyController::class, 'renamePlaylist'])->name('playlist.rename');



Route::delete('/playlist/{playlist_id}/song/{track_id}', [SpotifyController::class, 'removeSongFromPlaylist'])->name('playlist.remove_song');




Route::get('/logout',[SpotifyController::class,'logout'])->name('logout');
Route::get('/login',function(){
    return view('auth/login');
})->name('login');



