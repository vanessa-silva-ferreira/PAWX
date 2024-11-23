@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection
<form action="{{ route('admin.employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $employee->user->name) }}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $employee->user->email) }}">
    </div>

    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $employee->user->phone_number) }}">
    </div>

    <div class="form-group">
        <label for="nif">NIF</label>
        <input type="text" id="nif" name="nif" class="form-control" value="{{ old('nif', $employee->user->nif) }}">
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $employee->user->username) }}">
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <textarea id="address" name="address" class="form-control">{{ old('address', $employee->user->address) }}</textarea>
    </div>

    <div class="form-group">
        <label for="password">Password (Leave blank to keep current password)</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update User</button>
</form>

