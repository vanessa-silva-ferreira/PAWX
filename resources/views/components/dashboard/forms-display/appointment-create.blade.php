@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="mx-10 my-10 bg-white p-6">
    <x-utilities.title>Criar Marcação</x-utilities.title>
    <form action="{{ route($rolePrefix .'.appointments.store') }}" method="POST" class="space-y-6 mt-16">
        @csrf

        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="relative w-full">
                <x-form.select
                    id="client_id"
                    name="client_id"
                    :options="$clients"
                    valueKey="id"
                    labelKey="user.name"
                    class="w-full"
                    placeholder="Select a Client"
                    required
                    selected="{{ old('client_id') }}"
                />
                <x-form.label for="client_id">Cliente</x-form.label>
                @error('client_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative w-full">
                <x-form.select
                    id="pet_id"
                    name="pet_id"
                    class="w-full"
                    required
                >
                    <option value="" disabled hidden>Select a Pet</option>
                    @foreach($pets as $pet)
                        <option
                            value="{{ $pet->id }}"
                            data-client-id="{{ $pet->client_id }}"
                            {{ old('pet_id') == $pet->id ? 'selected' : '' }}
                        >
                            {{ $pet->name }}
                        </option>
                    @endforeach
                </x-form.select>
                <x-form.label for="pet_id">Animal</x-form.label>
                <x-form.validation-error name="pet_id"/>
            </div>
        </div>

        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="relative w-full">
                <x-form.select
                    id="employee_id"
                    name="employee_id"
                    required
                    class="w-full"
                >
                    <option value="" disabled hidden>Select an Employee</option>
                    @foreach($employees as $employee)
                        <option
                            value="{{ $employee->id }}"
                            {{ old('employee_id') == $employee->id ? 'selected' : '' }}
                        >
                            {{ $employee->user->name }}
                        </option>
                    @endforeach
                </x-form.select>
                <x-form.label for="employee_id">Funcionário</x-form.label>
                @error('employee_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative w-full">
                <x-form.select
                    id="service_id"
                    name="service_id"
                    :options="$services"
                    valueKey="id"
                    labelKey="name"
                    placeholder="Select a Service"
                    required
                    selected="{{ old('service_id') }}"
                    class="w-full"
                />
                <x-form.label for="service_id">Serviço</x-form.label>
                @error('service_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="relative w-full">
                <x-form.select
                    id="status"
                    name="status"
                    :options="[
['value' => App\Enums\AppointmentStatus::PENDING->value, 'label' => App\Enums\AppointmentStatus::PENDING->value],
['value' => App\Enums\AppointmentStatus::CONFIRMED->value, 'label' => App\Enums\AppointmentStatus::CONFIRMED->value]
]"
                    selected="{{ old('status') }}"
                    valueKey="value"
                    labelKey="label"
                    required
                />

                <x-form.label for="status">Estado</x-form.label>
                @error('status')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative w-full">
                <x-form.input
                    type="number"
                    id="total_price"
                    name="total_price"
                    value="{{ old('total_price') }}"
                    step="0.01"
                    min="0"
                    required
                />
                <x-form.label for="total_price">Valor</x-form.label>
                @error('total_price')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
            <div class="relative w-full">
                <x-form.input
                    type="datetime-local"
                    id="appointment_date"
                    name="appointment_date"
                    value="{{ old('appointment_date') }}"
                    required
                />
                <x-form.label for="appointment_date">Data da Marcação</x-form.label>
                @error('appointment_date')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <div class="flex gap-4 mt-6">
                <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg mt-6">
                    Criar Marcação
                </x-form.button>

                <a href="{{ route($rolePrefix . '.appointments.index') }}"
                   class="px-8 py-2 text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none mt-6 flex items-center justify-center">
                    Voltar
                </a>
            </div>
        </div>
    </form>
</div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const clientSelect = document.getElementById('client_id');
                        const petSelect = document.getElementById('pet_id');
                        const allPets = [...petSelect.querySelectorAll('option[data-client-id]')];

                        function updatePets(clientId) {
                            petSelect.innerHTML = '<option value="" disabled hidden>Select a Pet</option>';

                            const matchingPets = allPets.filter(pet => pet.getAttribute('data-client-id') === clientId);

                            if (matchingPets.length === 0) {
                                const noPetsOption = document.createElement('option');
                                noPetsOption.value = "";
                                noPetsOption.textContent = "No pets available for this client";
                                noPetsOption.disabled = true;
                                petSelect.appendChild(noPetsOption);
                            } else {
                                matchingPets.forEach(pet => petSelect.appendChild(pet));
                            }

                            petSelect.value = '';
                        }

                        clientSelect.addEventListener('change', function () {
                            updatePets(clientSelect.value);
                        });
                    });
                </script>
