@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<h3>Edit Project</h3>
<form action="{{ route('admin.projects.update', $project) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $project->name }}" class="form-control mb-2" required>
    <input type="text" name="subtitle" value="{{ $project->subtitle }}" class="form-control mb-2" required>
    <textarea name="description" class="form-control mb-2" maxlength="200" required>{{ $project->description }}</textarea>
    <input type="text" name="image" value="{{ $project->image }}" class="form-control mb-2" required>
    <input type="url" name="url" value="{{ $project->url }}" class="form-control mb-2" required>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
