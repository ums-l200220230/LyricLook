<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#0B0E15]">
    <x-header :user="$user"/>
    <x-sidebar/>
    <div class="container mx-auto p-6 ml-64 rounded-xl bg-[#23262D] w-auto mr-2">
        <h1 class="text-2xl font-semibold text-center mb-8 text-white">Songs in categories</h1>
    
        <div class="grid grid-cols-3 gap-6 mt-2">
            @foreach ($song['tracks']['items'] as $track)
                <div class="bg-[#2F343D] hover:bg-[#4F5968] rounded-lg p-4 flex items-center space-x-4">
                    @if (isset($track['album']['images'][0]['url']))
                        <img src="{{ $track['album']['images'][0]['url'] }}" alt="{{ $track['name'] }}" class="w-16 h-16 rounded-lg object-cover">
                    @endif
                    <div>
                        <h5 class="text-white font-semibold">{{ $track['name'] }}</h5>
                        <p class="text-gray-400 text-sm">{{ $track['artists'][0]['name'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
</body>
</html>