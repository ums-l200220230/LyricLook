<div class="">
    <h1>Lagu Populer</h1>
    <div>
        @foreach($popularSong->tracks as $track)
            <div>
                <p>{{ $track->name }} - {{ $track->artists[0]->name }}</p>
            </div>
        @endforeach
    </div>
</div>