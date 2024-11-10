@if (isset($newReleases->albums->items))
    <div>
        <h1>Album Terbaru</h1>
        <div>
            @foreach($newReleases->albums->items as $album)
                <div>
                    <img src="{{ $album->images[0]->url }}" alt="{{ $album->name }}" width="100">
                    <p>{{ $album->name }}</p>
                    <p>Artis: {{ $album->artists[0]->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endif
