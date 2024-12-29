<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class SpotifyController extends Controller
{
    
    public function login(){
        $authorizeUrl = 'https://accounts.spotify.com/authorize?' . http_build_query([
            'response_type' => 'code',
            'client_id' => env('SPOTIFY_IDCLIENT'),
            'redirect_uri' => env('SPOTIFY_URL'),
            'scope' => 'user-top-read user-library-read playlist-read-private',
            'state' => csrf_token(),  
        ]);

        return redirect($authorizeUrl); 
    }
    public function logout(Request $request){
        $request->session()->forget('spotify_access_token');
        
        return redirect()->route('login');
    }

    
    public function callback(Request $request){
        $code = $request->query('code');
        $state = $request->query('state');

        if ($state !== csrf_token()) {
            return response()->json(['error' => 'Invalid state'], 400);
        }

        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => env('SPOTIFY_URL'),
            'client_id' => env('SPOTIFY_IDCLIENT'),
            'client_secret' => env('SPOTIFY_SECRET'),
        ]);

        if ($response->successful()) {
            $accessToken = $response->json()['access_token'];

            session(['spotify_access_token' => $accessToken]);

            return redirect()->route('home'); 
        } else {
            return response()->json(['error' => 'Failed to get access token'], 500);
        }
    }
    
    public function getUserProfile($accessToken){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://api.spotify.com/v1/me');
        
        return $response->json();


    }
    public function getUserPlaylist($accessToken){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://api.spotify.com/v1/me/playlists');

        if ($response->successful()) {
            $playlists = $response->json()['items'];
    
            foreach ($playlists as $key => $playlist) {
                if (isset($playlist['images'][0]['url'])) {
                    $playlists[$key]['image_url'] = $playlist['images'][0]['url'];
                } else {
                    $playlists[$key]['image_url'] = null;
                }
            }
    
            return $playlists;
        }
    }



    
    public function home(Request $request){
        $accessToken = session('spotify_access_token');

        $user = $this->getUserProfile($accessToken);

        return view('home', compact('user'));
    }

    public function categories(Request $request){
        $accessToken = session('spotify_access_token');

        $user = $this->getUserProfile($accessToken);
        return view('categories',compact('user'));
    }

    public function artist(Request $request){
        $accessToken = session('spotify_access_token');

        $user = $this->getUserProfile($accessToken);
        return view('artist',compact('user'));
    }

    public function playlist(Request $request){
        $accessToken = session('spotify_access_token');

        $user = $this->getUserProfile($accessToken);
        return view('playlist',compact('user'));
    }

    
}
