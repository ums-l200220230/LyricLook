@props(['user'])

<header class="z-10 top-0 ml-60 flex items-center justify-between">
    <div class="px-6 py-4">
        <div class="flex">
            <input class="rounded-l-full px-4 py-3 text-white outline-none bg-[#23262D] flex-grow " type="text" placeholder="Search for a song" id="search">
            <button class="rounded-r-full bg-[#23262D] px-4 py-3"><img src="{{asset('icons/search.svg')}}" alt="SearchIcon"></button>
        </div>
    </div>
    <div class="flex items-center p-5">
        <div class="mr-2 flex text-white p-2 items-center space-x-2">
            <img src="{{$user['images'][0]['url'] ?? ''}}" alt="UserImg" class="w-10 rounded-full">
            <div>{{$user['display_name']}}</div>
        </div>
    </div>
</header>