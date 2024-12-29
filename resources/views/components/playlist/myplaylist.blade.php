@props(['playlists'])
<div class="container ml-64 bg-[#23262D] rounded-xl p-3 w-auto mr-2">
    <div class="text-white">
        <div class="text-xl font-semibold mb-4">My Playlist</div>
        @if (isset($playlists) && count($playlists) > 0)
            <div class="grid grid-cols-2 gap-6">
                @foreach ($playlists as $playlist)
                    <a href="{{route('tracks', ['id' => $playlist['id']])}}" class="bg-[#313237] rounded-lg p-4 flex flex-col items-center">
                        @if ($playlist['image_url'])
                            <img src="{{$playlist['image_url']}}" alt="PlaylistImage" class="h-32 rounded-lg object-cover mb-3">
                        @endif
                        <div class="text-center text-white">{{ $playlist['name'] }}</div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
