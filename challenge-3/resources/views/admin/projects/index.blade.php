@extends('admin.layouts.app')

@section('content')
<h1>Projects</h1>
<a href="{{ route('admin.projects.create') }}" class="btn btn-success mb-3">Add New Project</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Subtitle</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->name }}</td>
            <td>{{ $project->subtitle }}</td>
            <td>
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
