@extends('layouts.app')

@section('content')
<h1 class="mb-4">Brainster Projects</h1>

<div class="row">
    @foreach($projects as $project)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <img src="{{ $project->image }}" class="card-img-top" alt="{{ $project->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $project->subtitle }}</h6>
                <p class="card-text">{{ $project->description }}</p>
                <a href="{{ $project->link }}" target="_blank" class="btn btn-primary">Go to Project</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
