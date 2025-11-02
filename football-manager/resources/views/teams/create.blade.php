@extends('layouts.app')

@section('content')
<h1>Додади Тим</h1>
<form action="{{ route('teams.store') }}" method="POST">
    @csrf
    <label>Име:</label>
    <input type="text" name="name" required>
    <br>
    <label>Година на основање:</label>
    <input type="number" name="founded_year" required>
    <br>
    <button type="submit">Save</button>
</form>
@endsection
