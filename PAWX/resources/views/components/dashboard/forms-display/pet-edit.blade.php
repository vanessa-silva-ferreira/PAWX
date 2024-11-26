@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="mx-10 my-10 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 uppercase" style="color: #81C784">Editar Animal</h1>

    <div class="container mx-auto px-4 lg:px-5">

        @if ($errors->any())
            <div class="alert alert-danger mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pets.update', $pet->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex flex-col space-y-6">
                <div class="flex space-x-4">
                    <!-- Left Column -->
                    <div class="flex-1 space-y-4">
                        <div class="form-group">
                            <label for="name" class="text-gray-700 font-semibold">Name</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control rounded h-8 w-full ring-1 ring-gray-300"
                                value="{{ old('name', $pet->name) }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="birthdate" class="text-gray-700 font-semibold">Birthdate</label>
                            <input
                                type="date"
                                id="birthdate"
                                name="birthdate"
                                class="form-control rounded h-8 w-full ring-1 ring-gray-300"
                                value="{{ old('birthdate', $pet->birthdate) }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="text-gray-700 font-semibold">Gender</label>
                            <select
                                id="gender"
                                name="gender"
                                class="form-control rounded h-8 w-full ring-1 ring-gray-300"
                                required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', $pet->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $pet->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="medical_history" class="text-gray-700 font-semibold">Medical History</label>
                            <textarea
                                id="medical_history"
                                name="medical_history"
                                class="form-control w-full rounded border-gray-300"
                                placeholder="Enter medical history">{{ old('medical_history', $pet->medical_history) }}</textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="flex-1 space-y-4">
                        <div class="form-group">
                            <label for="status" class="text-gray-700 font-semibold">Status</label>
                            <select
                                id="status"
                                name="status"
                                class="form-control rounded h-8 w-full ring-1 ring-gray-300"
                                required>
                                <option value="">Select Status</option>
                                <option value="active" {{ old('status', $pet->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $pet->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="obs" class="text-gray-700 font-semibold">Observations</label>
                            <textarea
                                id="obs"
                                name="obs"
                                class="form-control w-full rounded border-gray-300"
                                placeholder="Enter observations (optional)">{{ old('obs', $pet->obs) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="client_id" class="text-gray-700 font-semibold">Client</label>
                            <select
                                id="client_id"
                                name="client_id"
                                class="form-control rounded h-8 w-full ring-1 ring-gray-300"
                                required>
                                <option value="">Select a Client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('client_id', $pet->client_id) == $client->id ? 'selected' : '' }}>
                                        {{ $client->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-700 font-semibold">Spay/Neuter Status</label>
                            <div class="space-y-2">
                                <div class="form-check flex space-x-4">
                                    <div class="flex items-center">
                                        <input
                                            type="radio"
                                            name="spay_neuter_status"
                                            id="spayed"
                                            value="1"
                                            class="form-check-input"
                                            {{ old('spay_neuter_status', $pet->spay_neuter_status) == '1' ? 'checked' : '' }}>
                                        <label for="spayed" class="form-check-label ml-2 text-gray-700 font-semibold">
                                            Spayed/Neutered
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input
                                            type="radio"
                                            name="spay_neuter_status"
                                            id="not_spayed"
                                            value="0"
                                            class="form-check-input"
                                            {{ old('spay_neuter_status', $pet->spay_neuter_status) == '0' ? 'checked' : '' }}>
                                        <label for="not_spayed" class="form-check-label ml-2 text-gray-700 font-semibold">
                                            Not Spayed/Neutered
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit and Back Buttons -->
                <div class="flex justify-end space-x-4">
                    <a
                        href="{{ route('admin.pets.index') }}"
                        class="py-2 px-4 bg-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-400">
                        Back to Table
                    </a>
                    <button
                        type="submit"
                        class="py-2 px-4 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600">
                        Update Pet
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
