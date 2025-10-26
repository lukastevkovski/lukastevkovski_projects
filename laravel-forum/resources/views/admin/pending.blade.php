@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Pending Discussions</h1>

@if($pending->count())
    <div class="space-y-4">
        @foreach($pending as $discussion)
            <div class="bg-white p-4 shadow rounded">
                <h3 class="font-bold text-lg">{{ $discussion->title }}</h3>
                <p class="text-gray-600">By: {{ $discussion->user->name }} | Category: {{ $discussion->category->name }}</p>
                <p class="mt-2">{{ Str::limit($discussion->description, 100) }}</p>
                <div class="mt-2 flex space-x-2">
                    <a href="{{ route('discussions.edit', $discussion) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('discussions.approve', $discussion) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-green-500 hover:underline">Approve</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No pending discussions.</p>
@endif
@endsection
