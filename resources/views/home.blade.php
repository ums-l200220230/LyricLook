<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#0B0E15] overflow-x-hidden">
    <x-header :user="$user" />
    <x-sidebar :playlists="$playlists" />  
</body>
</html>
