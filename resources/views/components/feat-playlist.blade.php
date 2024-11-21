<div class="container mx-auto bg-hover rounded-xl mt-20 ml-64">
    <h2 class="px-2 text-2xl font-bold mt-5 text-white ">Playlist Unggulan</h2>
    {{-- <div class="flex items-center mb-2 mt-2">
        <button id="scroll-left" class="mx-2 text-white bg-gray-600 p-3 rounded-md hover:bg-gray-500">
            &lt;
        </button>
        <button id="scroll-right" class="text-white bg-gray-600 p-3 rounded-md hover:bg-gray-500">
            &gt;
        </button>
    </div> --}}
    
    <div id="playlist-container" class="flex overflow-x-scroll whitespace-nowrap space-x-5 py-4">
        @foreach($featPlaylist->playlists->items as $playlist)
            <div class="w-36 rounded-xl p-4 shadow-lg hover:scale-105 transform transition">
                <img class="rounded-lg mb-4" src="{{ $playlist->images[0]->url }}" alt="{{ $playlist->name }}" width="100">
                <p class="text-white text-base font-semibold">{{ $playlist->name }}</p>
            </div>
        @endforeach
    </div>
</div>
