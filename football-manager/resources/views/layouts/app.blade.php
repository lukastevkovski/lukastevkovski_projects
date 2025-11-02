<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Manager</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <a href="{{ route('matches.index') }}">Натпревари</a>
        @auth
            @if(auth()->user()->is_admin)
                | <a href="{{ route('teams.index') }}">Тимови</a>
                | <a href="{{ route('players.index') }}">Играчи</a>
                | <a href="{{ route('matches.index') }}">Уреди Натпревари</a>
            @endif
            | <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            | <a href="{{ route('login') }}">Login</a>
            | <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>
    <hr>
    <div>
        @yield('content')
    </div>
</body>
</html>
