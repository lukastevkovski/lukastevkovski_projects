@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Уреди Натпревар</h1>
    <form action="{{ route('matches.update', $match) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Home Team</label>
            <select name="home_team_id" class="form-control">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id == $match->home_team_id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Away Team</label>
            <select name="away_team_id" class="form-control">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id == $match->away_team_id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Датум на натпревар</label>
            <input type="datetime-local" name="match_date" value="{{ \Carbon\Carbon::parse($match->match_date)->format('Y-m-d\TH:i') }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Home Score</label>
            <input type="number" name="home_score" value="{{ $match->home_score }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Away Score</label>
            <input type="number" name="away_score" value="{{ $match->away_score }}" class="form-control">
        </div>
        <button class="btn btn-success">Ажурирај</button>
    </form>
</div>
@endsection
