@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Forum Discussions</h1>

@if($discussions->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($discussions as $discussion)
            <div class="bg-white p-4 shadow rounded">
                <img src="{{ asset('storage/' . $discussion->image) }}" alt="{{ $discussion->title }}" class="w-full h-48 object-cover rounded mb-2">
                <h3 class="font-bold text-lg"><a href="{{ route('discussions.show', $discussion) }}" class="hover:underline">{{ $discussion->title }}</a></h3>
                <p class="text-gray-600 text-sm">Category: {{ $discussion->category->name }} | By: {{ $discussion->user->name }}</p>
                <p class="mt-2">{{ Str::limit($discussion->description, 100) }}</p>
                @auth
                    @if(Auth::user()->id === $discussion->user_id || Auth::user()->role === 'admin')
                        <div class="mt-2 flex space-x-2">
                            <a href="{{ route('discussions.edit', $discussion) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('discussions.destroy', $discussion) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
@else
    <p>No discussions yet.</p>
@endif
@endsection
