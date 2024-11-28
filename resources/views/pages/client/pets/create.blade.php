@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="container">
        <h1>Add a New Pet</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('client.pets.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Pet Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ old('birthdate') }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="medical_history">Medical History</label>
                <textarea id="medical_history" name="medical_history" class="form-control">{{ old('medical_history') }}</textarea>
            </div>

            <div class="form-group">
                <label>Spay/Neuter Status</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="spay_neuter_status" id="spayed" value="1" {{ old('spay_neuter_status') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="spayed">
                        Spayed/Neutered
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="spay_neuter_status" id="not_spayed" value="0" {{ old('spay_neuter_status') == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="not_spayed">
                        Not Spayed/Neutered
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="">Select Status</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="obs">Observations</label>
                <textarea id="obs" name="obs" class="form-control">{{ old('obs') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Pet</button>
        </form>
    </div>
@endsection
