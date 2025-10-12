@extends('layouts.app')

@section('title', 'Add Project')

@section('content')
<h3>Add New Project</h3>
<form action="{{ route('admin.projects.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
    <input type="text" name="subtitle" placeholder="Subtitle" class="form-control mb-2" required>
    <textarea name="description" placeholder="Description" class="form-control mb-2" maxlength="200" required></textarea>
    <input type="text" name="image" placeholder="Image URL" class="form-control mb-2" required>
    <input type="url" name="url" placeholder="Project URL" class="form-control mb-2" required>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
