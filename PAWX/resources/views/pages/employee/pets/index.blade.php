@extends('layouts.dashboard')

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


<x-action.logout/>
