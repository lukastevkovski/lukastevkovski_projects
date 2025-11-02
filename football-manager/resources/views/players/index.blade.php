@extends('layouts.app')

@section('content')
<h1>Играчи</h1>
<a href="{{ route('players.create') }}">Додади играч</a>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Име</th>
            <th>Презиме</th>
            <th>Дата на раѓање</th>
            <th>Тим</th>
            <th>Акции</th>
        </tr>
    </thead>
    <tbody>
        @foreach($players as $player)
        <tr>
            <td>{{ $player->first_name }}</td>
            <td>{{ $player->last_name }}</td>
            <td>{{ $player->date_of_birth }}</td>
            <td>{{ $player->team->name }}</td>
            <td>
                <a href="{{ route('players.edit', $player->id) }}">Edit</a>
                <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
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
