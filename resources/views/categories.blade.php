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
    <div class="container bg-[#23262D] rounded-xl ml-64 p-3 w-auto mr-2">
        <h2 class="text-2xl font-bold text-white mb-6">Categories</h2>
        <div class="grid grid-cols-2 gap-6 text-center">
            <div class="bg-gray-800 p-4 rounded-xl shadow-lg hover:bg-gray-700 transform transition">
                <p class="text-white text-lg font-semibold">Pop</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-xl shadow-lg hover:bg-gray-700 transform transition">
                <p class="text-white text-lg font-semibold">Rock</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-xl shadow-lg hover:bg-gray-700 transform transition">
                <p class="text-white text-lg font-semibold">Hip-Hop</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-xl shadow-lg hover:bg-gray-700 transform transition">
                <p class="text-white text-lg font-semibold">Jazz</p>
            </div>
        </div>
    </div>

</body>
</html>