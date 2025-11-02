@extends('layouts.app')

@section('content')
<h1>Додади Играч</h1>
<form action="{{ route('players.store') }}" method="POST">
    @csrf
    <label>Име:</label>
    <input type="text" name="first_name" required>
    <br>
    <label>Презиме:</label>
    <input type="text" name="last_name" required>
    <br>
    <label>Дата на раѓање:</label>
    <input type="date" name="date_of_birth" required>
    <br>
    <label>Тим:</label>
    <select name="team_id">
        @foreach($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Save</button>
</form>
@endsection
