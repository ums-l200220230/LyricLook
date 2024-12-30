@props(['playlists'])

<div class="container ml-64 bg-[#23262D] rounded-xl p-3 w-auto mr-2">
    <div class="text-white">
        <div class="text-2xl font-semibold mb-4">My Playlist</div>
        @if (isset($playlists) && count($playlists) > 0)
            <div class="grid grid-cols-2 gap-6">
                @foreach ($playlists as $playlist)
                    <div class="relative bg-[#2F343D] hover:bg-[#4F5968] rounded-lg p-4 flex flex-col items-center">
                        <a href="{{ route('tracks', ['id' => $playlist['id']]) }}" class="flex flex-col items-center">
                            @if ($playlist['image_url'])
                                <img src="{{ $playlist['image_url'] }}" alt="PlaylistImage" class="h-32 rounded-lg object-cover mb-3">
                            @endif
                            <div class="text-center text-white font-semibold">{{ $playlist['name'] }}</div>
                        </a>
                        
                        <!-- Form Rename Playlist -->
                        <form action="{{ route('playlist.rename', ['id' => $playlist['id']]) }}" method="POST" class="mt-2">
                            @csrf
                            @method('PUT')

                            <input type="text" name="name" value="{{ $playlist['name'] }}" class="w-full p-2 rounded-lg bg-[#313237] text-white mb-2" required>
                            
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Ubah Nama Playlist</button>
                        </form>

                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-400">Tidak ada playlist yang ditemukan.</p>
        @endif
    </div>
</div>
