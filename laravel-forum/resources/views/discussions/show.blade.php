@extends('layouts.app')

@section('content')
<div class="bg-white p-6 shadow rounded">
    <img src="{{ asset('storage/' . $discussion->image) }}" class="w-full h-64 object-cover rounded mb-4">
    <h1 class="text-2xl font-bold mb-2">{{ $discussion->title }}</h1>
    <p class="text-gray-600 mb-2">By: {{ $discussion->user->name }} | Category: {{ $discussion->category->name }}</p>
    <p class="mb-4">{{ $discussion->description }}</p>

    <h2 class="text-xl font-bold mb-2">Comments</h2>
    @foreach($discussion->comments as $comment)
        <div class="border-b mb-2 pb-2">
            <p>{{ $comment->content }}</p>
            <p class="text-sm text-gray-500">By {{ $comment->user->name }} at {{ $comment->created_at->format('d M Y H:i') }}</p>
        </div>
    @endforeach

    @auth
        <form action="{{ route('comments.store', $discussion) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="content" class="w-full border p-2 rounded mb-2" placeholder="Add a comment"></textarea>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Comment</button>
        </form>
    @else
        <p class="mt-4 text-gray-600">Please <a href="{{ route('login') }}" class="text-blue-500 underline">login</a> to comment.</p>
    @endauth
</div>
@endsection
