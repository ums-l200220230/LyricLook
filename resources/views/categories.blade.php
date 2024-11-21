<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @vite('resources/css/app.css')
</head>
<body class="bg-BGHome">
    <x-header/>
    <x-sidebar/>
    <div class="container bg-hover rounded-xl mt-20 ml-60 p-3 w-96">
        <h2 class="text-2xl font-bold text-white mb-6">Categories</h2>
        <div class="grid grid-cols-2 gap-6">
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