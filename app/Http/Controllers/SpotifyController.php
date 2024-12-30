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
            'scope' => 'user-read-private user-read-email playlist-read-private playlist-modify-public playlist-modify-private',
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

            // Simpan access token ke session
            session(['spotify_access_token' => $accessToken]);

            // Ambil profil user Spotify
            $userResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get('https://api.spotify.com/v1/me');

            if ($userResponse->successful()) {
                $userId = $userResponse->json()['id']; // Spotify user ID
                session(['spotify_user_id' => $userId]); // Simpan ke session
            } else {
                return response()->json(['error' => 'Failed to fetch user profile'], 500);
            }

            return redirect()->route('home')->with('success', 'Berhasil login dengan Spotify!');
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

    public function create(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:300',
        ]);

        $accessToken = session('spotify_access_token');
        $userId = session('spotify_user_id');

        if (!$accessToken || !$userId) {
            return redirect()->route('home')->with('error', 'Spotify user tidak ditemukan.');
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description ?? '',
            'public' => true,
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->post("https://api.spotify.com/v1/users/{$userId}/playlists", $data);
        
        if ($response->successful()) {
            return redirect()->route('playlist')->with('success', 'Playlist berhasil dibuat!');
        } else {
            return redirect()->route('home')->with('error', 'Gagal membuat playlist. Coba lagi.');
        }
    }
    public function removeSongFromPlaylist($playlistId, $trackId)
    {
        $accessToken = session('spotify_access_token');
        
        if (!$accessToken) {
            return redirect()->route('home')->with('error', 'Akses Spotify tidak ditemukan.');
        }

        // Track URI
        $trackUri = 'spotify:track:' . $trackId;

        // Mengirim permintaan DELETE ke Spotify API untuk menghapus lagu dari playlist
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->delete("https://api.spotify.com/v1/playlists/{$playlistId}/tracks", [
            'tracks' => [
                [
                    'uri' => $trackUri
                ]
            ]
        ]);

        // Mengecek apakah permintaan berhasil
        if ($response->successful()) {
            return redirect()->route('playlist')->with('success', 'Lagu berhasil dihapus dari playlist.');
        } else {
            return redirect()->route('playlist')->with('error', 'Gagal menghapus lagu dari playlist.');
        }
    }







    public function getSpotifyCategories($accessToken){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get("https://api.spotify.com/v1/browse/categories");

        return $response->json();
    }

    public function getSongbyCategory($categoryId){
        $accessToken = session('spotify_access_token');
    
        $category = $this->getSpotifyCategories($accessToken); 
        $categoryName = '';
    
        foreach ($category['categories']['items'] as $item) {
            if ($item['id'] === $categoryId) {
                $categoryName = $item['name'];
                break;
            }
        }
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://api.spotify.com/v1/search', [
            'query' => $categoryName,
            'type' => 'track',
            'limit' => 30
        ]);
    
        $song = $response->json();
        $user = $this->getUserProfile($accessToken);
        $playlists = $this->getUserPlaylist($accessToken);
        return view('categoriessong', compact('song', 'user','playlists'));
    }

    public function getUserTracks($id){
        $accessToken = session('spotify_access_token');

        if (!$accessToken) {
            return redirect()->route('home')->with('error', 'Akses Spotify tidak ditemukan.');
        }

        // Mendapatkan data playlist berdasarkan ID
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get("https://api.spotify.com/v1/playlists/{$id}");

        // Cek apakah respons berhasil
        if ($response->successful()) {
            $playlist = $response->json();  // Ambil data playlist
        } else {
            return redirect()->route('home')->with('error', 'Gagal mendapatkan playlist.');
        }

        // Mendapatkan tracks dari playlist
        $tracksResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get("https://api.spotify.com/v1/playlists/{$id}/tracks");

        $tracks = $tracksResponse->json()['items'] ?? [];

        // Kirim data playlist dan tracks ke view

        $user = $this->getUserProfile($accessToken);
        return view('playlisttracks', compact('playlist', 'tracks', 'user'));
    }

    public function renamePlaylist(Request $request, $id){
        $accessToken = session('spotify_access_token');

        if (!$accessToken) {
            return redirect()->route('home')->with('error', 'Akses Spotify tidak ditemukan.');
        }

        $newName = $request->input('name');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->put("https://api.spotify.com/v1/playlists/{$id}", [
            'name' => $newName,
        ]);

        if ($response->successful()) {
            return redirect()->route('playlist')->with('success', 'Nama playlist berhasil diubah.');
        } else {
            return redirect()->route('playlist')->with('error', 'Gagal mengubah nama playlist.');
        }
    }
    public function home(Request $request){
        $accessToken = session('spotify_access_token');

        $user = $this->getUserProfile($accessToken);
        $playlists = $this->getUserPlaylist($accessToken);
        return view('home', compact('user','playlists'));
    }

    public function categories(Request $request){
        $accessToken = session('spotify_access_token');

        $user = $this->getUserProfile($accessToken);
        $categories = $this->getSpotifyCategories($accessToken);

        return view('categories',compact('user','categories'));
    }

    public function playlist(Request $request){
        $accessToken = session('spotify_access_token');

        $user = $this->getUserProfile($accessToken);
        $playlists = $this->getUserPlaylist($accessToken);

        return view('playlist',compact('user','playlists'));
    }
    
}
