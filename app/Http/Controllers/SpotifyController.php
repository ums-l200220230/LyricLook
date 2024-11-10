<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\Session;
class SpotifyController extends Controller
{
    private $session;
    private $api;
    private $spotifyservices;
    
    public function __construct()
    {
        $this->session = new Session(
            config('services.spotify.client_id'),
            config('services.spotify.client_secret'),
            config('services.spotify.redirect')
        );

        $this->api = new SpotifyWebAPI();
    }
    public function redirectToSpotify()
    {
        $options = [
            'scope' => [
                'user-read-email',
                'user-read-private',
                'playlist-read-private',
                'user-library-read',
            ],
        ];

        return redirect($this->session->getAuthorizeUrl($options));
    }

    public function handleSpotifyCallback(Request $request)
    {
       
        if ($request->has('code')) {
            $this->session->requestAccessToken($request->code);
            $accessToken = $this->session->getAccessToken();

            $this->api->setAccessToken($accessToken);

            $user = $this->api->me();

            return view('home', ['user' => $user]);
        }

        return redirect('/')->with('error', 'Gagal autentikasi dengan Spotify');
    }
    
}
