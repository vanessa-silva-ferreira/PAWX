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
{{--@endsection--}}

@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <x-dashboard.forms-display.appointment-create :clients="$clients" :pets="$pets" :employees="$employees"
                                                  :services="$services" />
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
    {{--    @include('partials.dashboard.notifications', ['notifications' => $notifications])--}}
@endsection

