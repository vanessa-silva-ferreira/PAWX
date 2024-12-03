@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="mx-10 my-10 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 uppercase" style="color: #81C784">Adicionar Novo Animal</h1>

    <div class="container mx-auto px-4 lg:px-5">
        <h1 class="text-2xl font-bold text-center mb-6">Pet Details: {{ $pet->name }}</h1>
        <form>
            <div class="flex flex-col space-y-6">
                <div class="flex space-x-4">
                    <!-- Left Column -->
                    <div class="flex-1 space-y-4">
                        <div class="form-group">
                            <label class="text-gray-700 font-semibold">Name</label>
                            <input
                                type="text"
                                class="form-control rounded h-8 w-full ring-1 ring-gray-300 bg-gray-100"
                                value="{{ $pet->name }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-700 font-semibold">Birthdate</label>
                            <input
                                type="date"
                                class="form-control rounded h-8 w-full ring-1 ring-gray-300 bg-gray-100"
                                value="{{ $pet->birthdate }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-700 font-semibold">Gender</label>
                            <input
                                type="text"
                                class="form-control rounded h-8 w-full ring-1 ring-gray-300 bg-gray-100"
                                value="{{ ucfirst($pet->gender) }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-700 font-semibold">Medical History</label>
                            <textarea
                                class="form-control w-full rounded border-gray-300 bg-gray-100"
                                disabled>{{ $pet->medical_history ?? 'No medical history available.' }}</textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="flex-1 space-y-4">
                        <div class="form-group">
                            <label class="text-gray-700 font-semibold">Status</label>
                            <input
                                type="text"
                                class="form-control rounded h-8 w-full ring-1 ring-gray-300 bg-gray-100"
                                value="{{ ucfirst($pet->status) }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-700 font-semibold">Observations</label>
                            <textarea
                                class="form-control w-full rounded border-gray-300 bg-gray-100"
                                disabled>{{ $pet->obs ?? 'No observations available.' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-700 font-semibold">Client</label>
                            <input
                                type="text"
                                class="form-control rounded h-8 w-full ring-1 ring-gray-300 bg-gray-100"
                                value="{{ $pet->client->id }}"
                                disabled>
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
                                            {{ $pet->spay_neuter_status == '1' ? 'checked' : '' }}
                                            disabled>
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
                                            {{ $pet->spay_neuter_status == '0' ? 'checked' : '' }}
                                            disabled>
                                        <label for="not_spayed" class="form-check-label ml-2 text-gray-700 font-semibold">
                                            Not Spayed/Neutered
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
