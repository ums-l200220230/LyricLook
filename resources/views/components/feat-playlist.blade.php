<div>
    <h1>Playlist Unggulan</h1>
    <div>
        @foreach($featPlaylist->playlists->items as $playlist)
            <div>
                <img src="{{ $playlist->images[0]->url }}" alt="{{ $playlist->name }}" width="100">
                <p>{{ $playlist->name }}</p>
            </div>
        @endforeach
    </div>
</div>