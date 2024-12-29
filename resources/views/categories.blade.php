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
    <x-categories :categories="$categories"/>

</body>
</html>