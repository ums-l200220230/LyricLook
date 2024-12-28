<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;

class SpotifyController extends Controller
{
    
    public function login()
    {
        $authorizeUrl = 'https://accounts.spotify.com/authorize?' . http_build_query([
            'response_type' => 'code',
            'client_id' => env('SPOTIFY_IDCLIENT'),
            'redirect_uri' => env('SPOTIFY_URL'),
            'scope' => 'user-top-read user-library-read playlist-read-private',
            'state' => csrf_token(),  
        ]);

        return redirect($authorizeUrl); 
    }

    
    public function callback(Request $request)
    {
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

        return $response->json()['items'];

    }

    public function home(Request $request){
        $accessToken = session('spotify_access_token');

        $user = $this->getUserProfile($accessToken);
        $playlists = $this->getUserPlaylist($accessToken);

        return view('home', compact('user','playlists'));
    }

    
}
