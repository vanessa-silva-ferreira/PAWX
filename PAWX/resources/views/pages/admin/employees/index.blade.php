@extends('layouts.admin')

@section('content')
    <h1>Employees</h1>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>
                    <a href="{{ route('admin.employees.show', $employee->employee->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('admin.employees.edit', $employee->employee->id) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $employees->links() }}
    </div>
@endsection
