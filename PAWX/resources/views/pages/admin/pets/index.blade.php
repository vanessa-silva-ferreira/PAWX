@extends('layouts.admin')

@section('content')
    <h1>Pets</h1>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
{{--            <th>Actions</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach ($pets as $pet)
            <tr>
                <td>{{ $pet->id }}</td>
                <td>{{ $pet->client->id }}</td>
                <td>{{ $pet->name }}</td>
                <td>
                    <!-- View Button -->
                    <a href="{{ route('admin.pets.show', $pet->id) }}" class="btn btn-sm btn-info">View</a>

                    <!-- Edit Button -->
                    <a href="{{ route('admin.pets.edit', $pet->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>

                {{--                    <a href="{{ route('admin.employees.show', $employee->id) }}" class="btn btn-info">View</a>--}}
{{--                    <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $pets->links() }}
    </div>
@endsection

