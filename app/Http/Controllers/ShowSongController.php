<?php

namespace App\Http\Controllers;

use App\Services\SpotifyService;

class ShowSongController extends Controller
{
    private $spotifyservices;

    public function __construct(SpotifyService $spotifyservices)
    {
        $this->spotifyservices = $spotifyservices;
    }
    public function homePage()
    {
        $newReleases = $this->spotifyservices->getNewReleases();
        $featPlaylist = $this->spotifyservices->getFeaturedPlaylists();
        $popularSong = $this->spotifyservices->getPopularSongs('1Xyo4u8uXC1ZmMpatF05PJ');

        return view('home', compact('newReleases','featPlaylist','popularSong'));
    }

}
