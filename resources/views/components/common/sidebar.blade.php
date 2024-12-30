<aside class="w-60 bg-[#23262D] text-white fixed rounded-3xl top-0 left-2 mt-4">
    <div class="font-extrabold text-center mt-5 text-xl">LyricLook</div>
    <div class="mt-10 text-center">
        <a href="{{url('/')}}" class="hover:bg-[#313237] rounded-2xl p-3 mx-2 flex space-x-3 ">
            <img src="{{asset('icons/home.svg')}}" alt="HomeIcon">
            <div class="text-lg font-semibold">Home</div> 
        </a>
        <a href="{{url('/categories')}}" class="hover:bg-[#313237] rounded-2xl p-3 mt-2 mx-2 flex space-x-3"> 
            <img src="{{asset('icons/categories.svg')}}" alt="CategoriesIcon">
            <div class="text-lg font-semibold">Categories</div> 
        </a>
        <a href="{{url('/playlist')}}" class="hover:bg-[#313237] rounded-2xl p-3 mt-2 mx-2 flex space-x-3">
            <img src="{{ asset('icons/list.svg') }}" alt="PlaylistIcon">
            <div class="text-lg font-semibold">Playlists</div>
        </a>
        
        <a href="{{route('logout')}}" class="hover:bg-[#313237] rounded-2xl p-3 mx-2 flex space-x-3 mt-60 mb-5">
            <img src="{{asset('icons/log-out.svg')}}" alt="LogoutIcon">
            <div class="text-lg font-semibold">Logout</div>
        </a>
    </div>
</aside>
