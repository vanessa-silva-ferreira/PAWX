<div class="container mt-5">
    <div class="row">
        <div class="col-6 mx-auto">
            <h2>Edit Pet</h2>
            <form method="POST" action="{{ url('pets/' . $pet->id) }}">
                @csrf
                @method('PUT')

                <!-- Client -->
                <div class="form-group">
                    <label for="client_id">Client</label>
                    <select id="client_id" name="client_id" class="form-control @error('client_id') is-invalid @enderror">
                        <option value="" disabled selected>Select a client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}"
                                    @if($pet->client_id == $client->id) selected @endif>
                                {{ $client->user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('client_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Name -->
                <div class="form-group mt-3">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $pet->name) }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Birthdate -->
                <div class="form-group mt-3">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate"
                           class="form-control @error('birthdate') is-invalid @enderror"
                           value="{{ old('birthdate', $pet->birthdate ? \Carbon\Carbon::parse($pet->birthdate)->format('Y-m-d') : '') }}">
                    @error('birthdate')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="form-group mt-3">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror">
                        <option value="">Select gender</option>
                        <option value="male" @if(old('gender', $pet->gender) == 'male') selected @endif>Male</option>
                        <option value="female" @if(old('gender', $pet->gender) == 'female') selected @endif>Female</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Medical History -->
                <div class="form-group mt-3">
                    <label for="medical_history">Medical History</label>
                    <input type="text" id="medical_history" name="medical_history"
                           class="form-control @error('medical_history') is-invalid @enderror"
                           value="{{ old('medical_history', $pet->medical_history) }}">
                    @error('medical_history')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Spay/Neuter Status -->
                <div class="form-group mt-3">
                    <label for="spay_neuter_status">Spay/Neuter Status</label>
                    <select id="spay_neuter_status" name="spay_neuter_status"
                            class="form-control @error('spay_neuter_status') is-invalid @enderror">
                        <option value="1" @if(old('spay_neuter_status', $pet->spay_neuter_status) == 1) selected @endif>Yes</option>
                        <option value="0" @if(old('spay_neuter_status', $pet->spay_neuter_status) == 0) selected @endif>No</option>
                    </select>
                    @error('spay_neuter_status')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group mt-3">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="active" @if(old('status', $pet->status) == 'active') selected @endif>Active</option>
                        <option value="inactive" @if(old('status', $pet->status) == 'inactive') selected @endif>Inactive</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Observations -->
                <div class="form-group mt-3">
                    <label for="obs">Observations</label>
                    <input type="text" id="obs" name="obs" class="form-control @error('obs') is-invalid @enderror"
                           value="{{ old('obs', $pet->obs) }}">
                    @error('obs')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mt-4">Update Pet</button>
            </form>
        </div>
    </div>
</div>
