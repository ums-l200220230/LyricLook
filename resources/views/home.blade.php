<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#0B0E15] overflow-x-hidden">
    <x-header/>
    <x-sidebar/>
   
    
    {{-- <x-new-releases :newReleases="$newReleases"/> --}}
    <x-feat-playlist :featPlaylist="$featPlaylist"/>
    {{-- <x-popular-song :popularSong="$popularSong"/> --}}
    {{-- <script src="{{ asset('js/playlist-scroll.js') }}"></script> --}}
</body>
</html>
