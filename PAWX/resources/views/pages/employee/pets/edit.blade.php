@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Pet</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employee.pets.update', $pet->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Pet Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $pet->name) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input
                    type="date"
                    id="birthdate"
                    name="birthdate"
                    class="form-control"
                    value="{{ old('birthdate', $pet->birthdate) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', $pet->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $pet->gender) == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="medical_history">Medical History</label>
                <textarea
                    id="medical_history"
                    name="medical_history"
                    class="form-control">{{ old('medical_history', $pet->medical_history) }}</textarea>
            </div>

            <div class="form-group">
                <label>Spay/Neuter Status</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="spay_neuter_status" id="spayed" value="1" {{ old('spay_neuter_status', $pet->spay_neuter_status) == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="spayed">
                        Spayed/Neutered
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="spay_neuter_status" id="not_spayed" value="0" {{ old('spay_neuter_status', $pet->spay_neuter_status) == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="not_spayed">
                        Not Spayed/Neutered
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="">Select Status</option>
                    <option value="active" {{ old('status', $pet->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $pet->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="obs">Observations</label>
                <textarea
                    id="obs"
                    name="obs"
                    class="form-control">{{ old('obs', $pet->obs) }}</textarea>
            </div>

            <div class="form-group">
                <label for="client_id">Client</label>
                <select id="client_id" name="client_id" class="form-control" required>
                    <option value="">Select a Client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id', $pet->client_id) == $client->id ? 'selected' : '' }}>
                            {{ $client->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Pet</button>
        </form>
    </div>
@endsection
