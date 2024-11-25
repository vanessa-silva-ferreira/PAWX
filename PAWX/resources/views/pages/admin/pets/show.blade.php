@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection


<div class="container">
    <h1 class="display-4 text-center">Pet Details: {{ $pet->name }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pet->name }}</h5>
            <p class="card-text"><strong>Breed:</strong> {{ $pet->breed }}</p>
            <p class="card-text"><strong>Age:</strong> {{ $pet->age }}</p>
            <p class="card-text"><strong>Owner:</strong> {{ $pet->client->name }}</p>
            <p class="card-text"><strong>Added On:</strong> {{ $pet->created_at->format('F j, Y') }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $pet->description ?? 'No description available.' }}</p>
            <a href="{{ route('admin.pets.index') }}" class="btn btn-primary">Back to Pets</a>
        </div>
    </div>
</div>
