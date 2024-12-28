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
            else if (role === 'admin') {
                const loginForm = document.getElementById('loginForm');
                const roleSelection = document.getElementById('roleSelection');
                const roleDisplay = document.getElementById('roleDisplay');
                roleDisplay.innerText = 'Admin';
                loginForm.classList.remove('hidden');
                roleSelection.classList.add('hidden');
      }
    }
    </script>
</head>

<body class="bg-gradient-to-br from-[#0B0E15] via-[#1A2A37] to-[#2a3e4e] h-screen flex items-center justify-center">
    <div id="roleSelection" class="text-center">
        <h1 class="text-3xl font-bold text-white mb-6">Choose Your Role</h1>
        <div class="flex justify-center gap-6">
          <button onclick="handleRoleSelection('user')" 
            class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg font-semibold transition">
            User
          </button>
          <button onclick="handleRoleSelection('admin')" 
            class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-semibold transition">
            Admin
          </button>
        </div>
    </div>
    
    <div id="loginForm" class="hidden bg-[#1E293B] p-8 rounded-lg shadow-lg w-96">
        <h1 class="text-2xl font-bold text-center text-white mb-6">Login as <span id="roleDisplay"></span></h1>
        <form action="/login" method="POST">
          <div class="mb-4 flex space-x-2">
                <img src="{{asset('icons/user.svg')}}" alt="UserIcon">
                <input type="email" id="email" name="email" required placeholder="Username"
              class="w-full px-4 py-2 rounded-lg bg-[#2E3B4E] text-white focus:outline-none focus:ring focus:ring-blue-500">
            
          </div>
          <div class="mb-4 flex space-x-2">
            <img src="{{asset('icons/lock.svg')}}" alt="LockIcon">
            <input type="password" id="password" name="password" required placeholder="password" 
              class="w-full px-4 py-2 rounded-lg bg-[#2E3B4E] text-white focus:outline-none focus:ring focus:ring-blue-500">
          </div>
          <button type="submit" 
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition">
            Login
          </button>
        </form>
    </div>
</body>
</html>