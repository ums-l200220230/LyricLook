<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My playlist</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#0B0E15] overflow-x-hidden">
    <x-header :user="$user"/>
    <x-sidebar/>

    <div class="container mx-auto p-6 ml-64 mr-2 rounded-xl w-auto bg-[#23262D]">
        <h2 class="text-white text-2xl font-semibold mb-4">Tracks in Playlist</h2>
        @if (isset($tracks) && count($tracks) > 0)
            <ul class="grid grid-cols-3 gap-4">
                @foreach ($tracks as $track)
                    <li class="bg-[#2F343D] hover:bg-[#4F5968] p-4 rounded-lg text-white flex items-center space-x-4">
                        @if (isset($track['track']['album']['images'][0]['url']))
                            <img src="{{ $track['track']['album']['images'][0]['url'] }}" alt="Album Cover" class="w-16 h-16 rounded-lg object-cover">
                        @endif
                        <div>
                            <div class="font-semibold">{{ $track['track']['name'] }}</div>
                            <div class="text-sm text-gray-400">{{ $track['track']['artists'][0]['name'] }}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-400">No tracks found in this playlist.</p>
        @endif
    </div>
    
    
</body>
</html>