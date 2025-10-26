@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Create Discussion</h1>

<form action="{{ route('discussions.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow rounded">
    @csrf
    <div class="mb-4">
        <label class="block mb-1 font-bold">Title</label>
        <input type="text" name="title" value="{{ old('title') }}" class="w-full border p-2 rounded">
        @error('title') <p class="text-red-500">{{ $message }}</p> @enderror
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-bold">Category</label>
        <select name="category_id" class="w-full border p-2 rounded">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <p class="text-red-500">{{ $message }}</p> @enderror
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-bold">Description</label>
        <textarea name="description" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
        @error('description') <p class="text-red-500">{{ $message }}</p> @enderror
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-bold">Image</label>
        <input type="file" name="image" class="w-full">
        @error('image') <p class="text-red-500">{{ $message }}</p> @enderror
    </div>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Submit</button>
</form>
@endsection
