<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Forum</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-white shadow mb-6">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="font-bold text-xl text-gray-800">Forum</a>
            <div class="space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
                @else
                    <span class="text-gray-700">Hello, {{ Auth::user()->name }}</span>
                    <a href="{{ route('discussions.create') }}" class="text-green-500 hover:underline">Create Discussion</a>
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.pending') }}" class="text-yellow-500 hover:underline">Pending Reviews</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4">
        @yield('content')
    </div>
</body>
</html>
