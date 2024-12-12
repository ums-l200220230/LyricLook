<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-BGHome">
    <x-header/>
    <x-sidebar/>
    <div class="container bg-[#313237] rounded-xl mt-20 ml-60 p-3 w-auto">
        <h2 class="text-2xl font-bold text-white mb-6">Categories</h2>
        <div class="grid grid-cols-4 gap-6">
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