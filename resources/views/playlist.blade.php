<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlist</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#0B0E15]">
    <x-header :user="$user"/>
    <x-sidebar/>
    <x-myplaylist :playlists="$playlists"/>
    <div class="bg-[#23262D] p-6 rounded-xl ml-64 w-auto mt-2 mr-2">
        <h2 class="text-white text-xl mb-4">Buat Playlist Baru</h2>
        <form action="{{ route('playlist.create') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="text-white">Nama Playlist</label>
                <input type="text" id="name" name="name" class="w-full p-2 rounded-lg bg-[#313237] text-white" required>
            </div>
            <div>
                <label for="description" class="text-white">Deskripsi (Opsional)</label>
                <textarea id="description" name="description" rows="3" class="w-full p-2 rounded-lg bg-[#313237] text-white"></textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Buat Playlist</button>
        </form>
    </div>
</body>
</html>