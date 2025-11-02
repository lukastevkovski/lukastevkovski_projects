@extends('layouts.app')

@section('content')
<h1>Тимови</h1>
<a href="{{ route('teams.create') }}">Додади тим</a>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Име</th>
            <th>Година на основање</th>
            <th>Акции</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teams as $team)
        <tr>
            <td>{{ $team->name }}</td>
            <td>{{ $team->founded_year }}</td>
            <td>
                <a href="{{ route('teams.edit', $team->id) }}">Edit</a>
                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
