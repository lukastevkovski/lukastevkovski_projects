<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-bold text-center mb-4">Welcome, Admin!</h1>
        <p class="text-center text-gray-600 mb-6">You are logged in as <b>{{ auth()->user()->email }}</b></p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
        </form>
    </div>
</body>
</html>
