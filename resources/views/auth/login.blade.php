<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
    <script>
        function handleRoleSelection(role) {
            if (role === 'user') {
              window.location.assign('{{ url("/login-spotify") }}');
            } 
            
    }
    </script>
</head>

<body class="bg-gradient-to-br from-[#0B0E15] via-[#1A2A37] to-[#2a3e4e] h-screen flex items-center justify-center">
    <div id="roleSelection" class="text-center">
        <h1 class="text-3xl font-bold text-white mb-6">Login as Spotify User</h1>
        <div class="flex justify-center gap-6">
          <button onclick="handleRoleSelection('user')" 
            class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg font-semibold transition">
            <img src="{{asset('icons/spotify.svg')}}" alt="" class="w-8 h-8">
          </button>
        </div>
    </div>
    
</body>
</html>