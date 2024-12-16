@forelse ($newreleases as $album)
    <div class=" shadow-md rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
        {{-- Validasi Gambar --}}
        @if (isset($album->images) && count($album->images) > 0 && isset($album->images[0]->url))
            <img src="{{ $album->images[0]->url }}" alt="{{ $album->name ?? 'Unknown Album' }}" class="w-full h-48 object-cover">
        @else
            <img src="https://via.placeholder.com/150" alt="No Image" class="w-full h-48 object-cover">
        @endif

        <div class="p-4">
            {{-- Validasi Nama Album --}}
            <h3 class="text-lg font-bold truncate">{{ $album->name ?? 'Unknown Album' }}</h3>
            
            {{-- Validasi Artis --}}
            <p class="text-gray-600 text-sm">
                Artist: 
                {{ $album->artists[0]->name ?? 'Unknown Artist' }}
            </p>

            {{-- Validasi Link Spotify --}}
            @if (isset($album->external_urls->spotify))
                <a href="{{ $album->external_urls->spotify }}" target="_blank" 
                   class="text-blue-500 hover:underline text-sm mt-2 block">
                    Listen on Spotify
                </a>
            @endif
        </div>
    </div>
@empty
    <p class="text-center text-gray-600">No new releases available at the moment.</p>
@endforelse
