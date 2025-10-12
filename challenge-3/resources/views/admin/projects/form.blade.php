@extends('admin.layouts.app')

@section('content')
<h1>{{ isset($project) ? 'Edit Project' : 'Add Project' }}</h1>

<form action="{{ isset($project) ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}" method="POST">
    @csrf
    @if(isset($project))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $project->name ?? old('name') }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Subtitle</label>
        <input type="text" name="subtitle" value="{{ $project->subtitle ?? old('subtitle') }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" maxlength="200" required>{{ $project->description ?? old('description') }}</textarea>
    </div>
    <div class="mb-3">
        <label>Link</label>
        <input type="url" name="link" value="{{ $project->link ?? old('link') }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Image URL</label>
        <input type="text" name="image" value="{{ $project->image ?? old('image') }}" class="form-control" required>
    </div>

    <button class="btn btn-success" type="submit">{{ isset($project) ? 'Update' : 'Save' }}</button>
</form>
@endsection
