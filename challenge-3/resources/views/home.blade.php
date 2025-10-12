@extends('layouts.app')

@section('title', 'Brainster Projects')

@section('content')
<div class="row mb-4">
    <div class="col text-center">
        <img src="https://via.placeholder.com/1200x300" class="img-fluid mb-3" alt="Banner">
        <h2>Our Amazing Projects</h2>
    </div>
</div>

<div class="row">
    @foreach($projects as $project)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <img src="{{ $project->image }}" class="card-img-top" alt="{{ $project->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $project->subtitle }}</h6>
                <p class="card-text">{{ $project->description }}</p>
                <a href="{{ $project->url }}" class="btn btn-primary" target="_blank">View Project</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
