@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Employee Details</h1>
        @if ($employee)
            <div class="employee-details">
{{--                <p><strong>ID:</strong> {{ $employee->employee->id }}</p>--}}

                <p><strong>Name:</strong> {{ $employee->user->name }}</p>
                <p><strong>Email:</strong> {{ $employee->user->email }}</p>

                <a href="{{ route('admin.employees.index') }}" class="btn btn-primary">Back to Employees</a>
            </div>
        @else
            <p>No employee data available.</p>
        @endif
    </div>
@endsection
