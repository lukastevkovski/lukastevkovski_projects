@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Натпревари</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @auth
        @if(auth()->user()->is_admin)
            <a href="{{ route('matches.create') }}" class="btn btn-primary mb-3">Додај Натпревар</a>
        @endif
    @endauth
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Home Team</th>
                <th>Away Team</th>
                <th>Датум</th>
                <th>Резултат</th>
                @auth
                    @if(auth()->user()->is_admin)
                        <th>Акции</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match->homeTeam->name }}</td>
                    <td>{{ $match->awayTeam->name }}</td>
                    <td>{{ $match->match_date }}</td>
                    <td>{{ $match->home_score ?? '-' }} : {{ $match->away_score ?? '-' }}</td>
                    @auth
                        @if(auth()->user()->is_admin)
                            <td>
                                <a href="{{ route('matches.edit', $match) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('matches.destroy', $match) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Дали сте сигурни?')">Delete</button>
                                </form>
                            </td>
                        @endif
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
