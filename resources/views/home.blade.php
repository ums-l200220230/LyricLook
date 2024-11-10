<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Home</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-new-releases :newReleases="$newReleases"/>
    <x-feat-playlist :featPlaylist="$featPlaylist"/>
    <x-popular-song :popularSong="$popularSong"/>

</body>
</html>
