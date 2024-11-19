@extends('layouts.dashboard') <!-- Client-specific layout -->

@section('content')
    <h1>Your Pets</h1>

    <!-- Display a message if there are no pets -->
    @if($pets->isEmpty())
        <p>You have no pets listed.</p>
    @else
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Breed</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pets as $pet)
                <tr>
                    <td>{{ $pet->id }}</td>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->breed }}</td>
                    <td>
                        <a href="{{ route('client.pets.show', $pet->id) }}">View Details</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="pagination">
            {{ $pets->links() }}
        </div>
    @endif
@endsection
