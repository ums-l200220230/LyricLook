<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#0B0E15]">
    <x-header :user="$user" />
    <x-sidebar/>
    <div class="text-white ml-64 text-3xl font-semibold mb-6">
        Selamat datang, {{ $user['display_name'] }}! 🎧
    </div>
    <x-myplaylist :playlists="$playlists"/>
</body>
</html>
