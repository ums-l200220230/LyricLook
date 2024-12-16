<div class="max-w-6xl mx-auto my-8">
    <h2 class="text-2xl font-bold mb-6">Popular Songs</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($popularsong as $song)
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                {{-- Gambar Lagu --}}
                @if (isset($song['album']['images'][0]['url']))
                    <img src="{{ $song['album']['images'][0]['url'] }}" alt="{{ $song['name'] ?? 'Unknown Song' }}" class="w-full h-48 object-cover">
                @else
                    <img src="https://via.placeholder.com/150" alt="No Image Available" class="w-full h-48 object-cover">
                @endif

                <div class="p-4">
                    {{-- Nama Lagu --}}
                    <h3 class="text-lg font-bold truncate">{{ $song['name'] ?? 'Unknown Song' }}</h3>

                    {{-- Nama Artis --}}
                    <p class="text-gray-600 text-sm">
                        Artist: {{ $song['artists'][0]['name'] ?? 'Unknown Artist' }}
                    </p>

                    {{-- Tautan Spotify --}}
                    @if (isset($song['external_urls']['spotify']))
                        <a href="{{ $song['external_urls']['spotify'] }}" target="_blank" 
                           class="text-blue-500 hover:underline text-sm mt-2 block">
                            Listen on Spotify
                        </a>
                    @endif
                </div>
            </div>
        @empty
            {{-- Jika Tidak Ada Lagu Populer --}}
            <p class="text-center text-gray-600">No popular songs available for this artist. Please try another one.</p>
        @endforelse
    </div>
</div>
