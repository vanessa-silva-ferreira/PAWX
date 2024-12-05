{{--@extends('layouts.dashboard')--}}

{{--@section('sidebar')--}}
{{--    @include('partials.dashboard.sidebar')--}}
{{--@endsection--}}

{{--@section('content')--}}

{{--    <div class="flex flex-col space-y-6">--}}
{{--        <div class="flex-1 space-y-4 content-start">--}}
{{--            <h2 class="text-center text-3xl font-extrabold text-orange-600">--}}
{{--                Efetuar Marcação--}}
{{--            </h2>--}}
{{--        </div>--}}
{{--        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">--}}
{{--            <form class="space-y-6" action="{{ route('admin.appointments.store') }}" method="POST">--}}
{{--            <form class="space-y-6" action="{{ route('admin.appointments.store') }}" method="POST" novalidate>--}}
{{--            @csrf--}}
{{--                <div class="space-y-4">--}}
{{--                    <div>--}}
{{--                        <x-form.label for="client_id" class="text-gray-700 font-semibold">Selecione o cliente:</x-form.label>--}}
{{--                        <select as="select" id="client_id" name="client_id"--}}
{{--                                      class="rounded h-8 bg-white text-gray-700 w-full ring-1 ring-gray-600 focus:ring-indigo-500" required>--}}
{{--                            <option value="" disabled selected>Selecionar cliente</option>--}}
{{--                            @foreach ($clients as $client)--}}
{{--                                <option value="{{ $client->id }}">{{ $client->id }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <x-form.label for="pet_id" class="text-gray-700 font-semibold">Selecione o animal:</x-form.label>--}}
{{--                        <select as="select" id="pet_id" name="pet_id"--}}
{{--                                      class="rounded h-8 bg-white text-gray-700 w-full ring-1 ring-gray-600 focus:ring-indigo-500" required>--}}
{{--                            <option value="" disabled selected>Select a pet</option>--}}
{{--                            <!--script coloca os pets associados ao cliene-->--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <x-form.label for="service" class="text-gray-700 font-semibold">Selecione o serviço:</x-form.label>--}}
{{--                        <select as="select" id="service_id" name="service"--}}
{{--                                      class="rounded h-8 bg-white text-gray-700 w-full ring-1 ring-gray-600 focus:ring-indigo-500" required>--}}
{{--                            <option value="" disabled selected>Selecione uma opção</option>--}}
{{--                            <option value="banho">Banho</option>--}}
{{--                            <option value="tosquia">Tosquia</option>--}}
{{--                            <option value="ambos">Ambos</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="flex space-x-4">--}}
{{--                    <div class="flex-1">--}}
{{--                        <x-form.label for="date" class="text-gray-700 font-semibold">Select Date:</x-form.label>--}}
{{--                        <input type="date" id="date" name="date"--}}
{{--                               class="rounded h-8 bg-white text-gray-700 w-full ring-1 ring-gray-600 focus:ring-indigo-500" required--}}
{{--                               onchange="updateAppointmentDate()" />--}}
{{--                    </div>--}}
{{--                    <div class="flex-1">--}}
{{--                        <x-form.label for="time" class="text-gray-700 font-semibold">Selecione a hora:</x-form.label>--}}
{{--                        <select as="select" id="time" name="time"--}}
{{--                                class="rounded h-8 bg-white text-gray-700 w-full ring-1 ring-gray-600 focus:ring-indigo-500" required--}}
{{--                                onchange="updateAppointmentDate()">--}}
{{--                            <option value="" disabled selected>Selecione uma opção</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <input type="hidden" id="appointment_date" name="appointment_date">--}}

{{--                <div class="flex space-x-4">--}}
{{--                    <div class="flex-1">--}}
{{--                        <x-form.label for="value" class="text-gray-700 font-semibold">Valor a pagar:</x-form.label>--}}
{{--                        <input type="number" id="total_price" name="value"--}}
{{--                               class="rounded h-8 bg-white text-gray-700 w-full ring-1 ring-gray-600 focus:ring-indigo-500" required />--}}
{{--                    </div>--}}
{{--                    <div class="flex-1">--}}
{{--                        <x-form.label for="time" class="text-gray-700 font-semibold">Selecione o funcionário:</x-form.label>--}}
{{--                        <select as="select" id="employee_id" name="employee_id"--}}
{{--                                class="rounded h-8 bg-white text-gray-700 w-full ring-1 ring-gray-600 focus:ring-indigo-500" required>--}}
{{--                            <option value="" disabled selected>Selecionar funionário</option>--}}
{{--                            @foreach ($employees as $employee)--}}
{{--                                <option value="{{ $employee->id }}">{{ $employee->id }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <input type="hidden" id="status" name="status" value="Marcado">--}}

{{--                <div class="space-y-4">--}}
{{--                    <x-form.button type="submit"--}}
{{--                                   class="w-full py-2 px-4 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                        Book Appointment--}}
{{--                    </x-form.button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <script>--}}
{{--        const clientsWithPets = @json($clients);--}}
{{--        const clientDropdown = document.getElementById('client_id');--}}
{{--        const petDropdown = document.getElementById('pet_id');--}}

{{--        // Vê as mudanças no dropdown do cliente--}}
{{--        clientDropdown.addEventListener('change', function () {--}}
{{--            const clientId = this.value;--}}

{{--            // Encontra o cliente selecionado no array clientsWithPets--}}
{{--            const selectedClient = clientsWithPets.find(client => client.id == clientId);--}}

{{--            if (selectedClient) {--}}
{{--                // Clear existing options in the pet dropdown--}}
{{--                petDropdown.innerHTML = '<option value="" disabled selected>Select a pet</option>';--}}

{{--                // Coloca as pets associadas ao cliente escolhido no dropdwon--}}
{{--                selectedClient.pets.forEach(pet => {--}}
{{--                    const option = document.createElement('option');--}}
{{--                    option.value = pet.id;--}}
{{--                    option.textContent = pet.name;--}}
{{--                    petDropdown.appendChild(option);--}}
{{--                });--}}
{{--            } else {--}}
{{--                petDropdown.innerHTML = '<option value="" disabled>Error loading pets</option>';--}}
{{--            }--}}
{{--        });--}}
{{--        document.addEventListener('DOMContentLoaded', function () {--}}
{{--            const serviceSelect = document.getElementById('service_id');--}}
{{--            const timeSelect = document.getElementById('time');--}}

{{--            serviceSelect.addEventListener('change', function () {--}}
{{--                const selectedService = serviceSelect.value;--}}

{{--                // Clear previous options--}}
{{--                timeSelect.innerHTML = '<option value="" disabled selected>Select a time</option>';--}}

{{--                if (selectedService === 'banho' || selectedService === 'tosquia') {--}}
{{--                    for (let hour = 9; hour <= 17; hour++) {--}}
{{--                        timeSelect.innerHTML += `--}}
{{--                        <option value="${hour}:00-${hour}:30">${hour}:00 - ${hour}:30</option>--}}
{{--                        <option value="${hour}:30-${hour + 1}:00">${hour}:30 - ${hour + 1}:00</option>--}}
{{--                    `;--}}
{{--                    }--}}
{{--                } else if (selectedService === 'ambos') {--}}
{{--                    for (let hour = 9; hour <= 17; hour++) {--}}
{{--                        timeSelect.innerHTML += `--}}
{{--                        <option value="${hour}:00-${hour + 1}:00">${hour}:00 - ${hour + 1}:00</option>--}}
{{--                        <option value="${hour}:30-${hour + 1}:30">${hour}:30 - ${hour + 1}:30</option>--}}
{{--                    `;--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--        function updateAppointmentDate() {--}}
{{--            const dateInput = document.getElementById('date').value;--}}
{{--            const timeInput = document.getElementById('time').value;--}}

{{--            // Combine date and time into the format 'YYYY-MM-DD HH:MM:SS'--}}
{{--            if (dateInput && timeInput) {--}}
{{--                const appointmentDate = `${dateInput} ${timeInput}`;--}}
{{--                document.getElementById('appointment_date').value = appointmentDate;--}}
{{--            }--}}
{{--        }--}}


{{--        document.querySelector('form').addEventListener('submit', (event) => {--}}
{{--            console.log('Form submitted');--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
{{--@endsection--}}

@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')

    <div class="mx-10 my-10 bg-white p-6">
        <x-dashboard.title>New Appointment</x-dashboard.title>

        @if ($errors->any())
            <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.appointments.store') }}" method="POST" class="space-y-6 mt-16">
            @csrf

            <div class="form-group grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Client Dropdown -->
                <div class="relative w-full">
                    <x-form.select
                        id="client_id"
                        name="client_id"
                        :options="$clients"
                        valueKey="id"
                        labelKey="user.name"
                        placeholder="Select a Client"
                        required
                        selected="{{ old('client_id') }}"
                    />
                    <x-form.label for="client_id">Client</x-form.label>
                    @error('client_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative w-full">
                    <x-form.select
                        id="pet_id"
                        name="pet_id"
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
                    <x-form.label for="pet_id">Pet</x-form.label>
                    <x-form.validation-error name="pet_id"/>
                </div>
            </div>

            <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative w-full">
                    <x-form.select
                        id="employee_id"
                        name="employee_id"
                        required
                    >
                        <option value="" disabled hidden>Select an Employee</option>
                        @foreach($employees as $employee)
                            <option
                                value="{{ $employee->id }}"
                                {{ old('employee_id') == $employee->id ? 'selected' : '' }}
                            >
                                {{ $employee->user->name }} <!-- Access employee's name through the user relationship -->
                            </option>
                        @endforeach
                    </x-form.select>
                    <x-form.label for="employee_id">Employee</x-form.label>
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
                    />
                    <x-form.label for="service_id">Service</x-form.label>
                    @error('service_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative w-full">
                    <x-form.input
                        type="datetime-local"
                        id="appointment_date"
                        name="appointment_date"
                        value="{{ old('appointment_date') }}"
                        required
                    />
                    <x-form.label for="appointment_date">Appointment Date</x-form.label>
                    @error('appointment_date')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
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
                    <x-form.label for="total_price">Total Price</x-form.label>
                    @error('total_price')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative w-full">
                    <x-form.select
                        id="status"
                        name="status"
                        :options="[['value' => 'pending', 'label' => 'Pending'], ['value' => 'confirmed', 'label' => 'Confirmed']]"
                        selected="{{ old('status') }}"
                        valueKey="value"
                        labelKey="label"
                        required
                    />
                    <x-form.label for="status">Status</x-form.label>
                    @error('status')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg mt-6">
                    Create Appointment
                </x-form.button>
            </div>
        </form>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>

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
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
    {{--    @include('partials.dashboard.notifications', ['notifications' => $notifications])--}}
@endsection

