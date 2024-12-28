@props(['playlists'])
<aside class="w-60 bg-[#23262D] text-white fixed rounded-3xl top-0 left-2 mt-4">
    <div class="font-extrabold text-center mt-5 text-xl">LyricLook</div>
    <div class="mt-10 text-center">
        <div class="hover:bg-[#313237] rounded-2xl p-3 mx-2 flex space-x-3 ">
            <img src="{{asset('icons/home.svg')}}" alt="HomeIcon">
            <a href="{{url('/')}}">Home</a> 
        </div>
        <div class="hover:bg-[#313237] rounded-2xl p-3 mt-2 mx-2 flex space-x-3"> 
            <img src="{{asset('icons/categories.svg')}}" alt="CategoriesIcon">
            <a href="{{url('/categories')}}">Categories</a> 
        </div>
        <div class="hover:bg-[#313237] rounded-2xl p-3 mt-2 mx-2 flex space-x-3">
            <img src="{{asset('icons/artist.svg')}}" alt="ArtistsIcon">
            <a href="">Artist</a> 
        </div>
        <div class="hover:bg-[#313237] rounded-2xl p-3 mt-2 mx-2 flex space-x-3">
            <img src="{{asset('icons/list.svg')}}" alt="PlaylistIcon">
            <div>Playlist</div>
            @if (isset($playlists) && count($playlists) > 0)
                <ul>
                    @foreach ($playlists as $playlist)
                    <li>
                        <a href="{{$playlist['external_urls']['spotify']}}" target="_blank">
                            {{$playlist['name']}}
                        </a>
                    </li>
                        
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="hover:bg-[#313237] rounded-2xl p-3 mx-2 flex space-x-3 mt-52 mb-5">
            <img src="{{asset('icons/log-out.svg')}}" alt="LogoutIcon">
            <div>Logout</div>
        </div>
        
    </div>
</aside>
