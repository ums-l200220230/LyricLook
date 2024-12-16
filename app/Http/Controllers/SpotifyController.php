<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SpotifyController extends Controller
{
    private $client;
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->client = new Client();
        $this->clientId = env('SPOTIFY_IDCLIENT');
        $this->clientSecret = env('SPOTIFY_SECRET');
    }

    private function getAccessToken()
    {
        if (Cache::has('spotify_token')) {
            return Cache::get('spotify_token');
        }

        $response = $this->client->post('https://accounts.spotify.com/api/token', [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
            ],
            'form_params' => [
                'grant_type' => 'client_credentials',
            ],
        ]);

        $body = json_decode($response->getBody()->getContents());
        $token = $body->access_token;
        $expiresIn = $body->expires_in;

        Cache::put('spotify_token', $token, now()->addSeconds($expiresIn));

        return $token;
    }

    public function getNewReleases()
    {
        $token = $this->getAccessToken();
        $response = $this->client->get('https://api.spotify.com/v1/browse/new-releases', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function getPopularSongs($artistId)
    {
        $token = $this->getAccessToken();

        $response = $this->client->get("https://api.spotify.com/v1/artists/{$artistId}/top-tracks?market=US", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }
    public function homepage() 
    {
        $newreleases = $this->getNewReleases();
        

        // Debug data dari API
        Log::info('New Releases Data:', (array) $newreleases);

        $newreleases = $newreleases->albums->items ?? [];

        // Debug data albums
        Log::info('Albums Data:', (array) $newreleases);

        return view('home', compact('newreleases'));
    }
    public function popularsong($artistId)
    {
        $popularsong = $this->getPopularSongs($artistId);
        dd($popularsong);
        return view('home', compact('popularsong'));
    }

}
