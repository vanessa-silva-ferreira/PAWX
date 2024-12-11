@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="flex flex-col space-y-4 mt-16 py-6 px-6">
    <div class="overflow-x-auto">
        <div class="container mx-auto">
            <div class="mb-4">
                <x-utilities.title>Editar Marcação</x-utilities.title>
                <div class="mt-10">
                    <form action="{{ route($rolePrefix .'.appointments.update', $appointment->id) }}" method="POST" class="space-y-6 mt-16">
                        @csrf
                        @method('PUT')

                        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Cliente -->
                            <div class="relative w-full">
                                <x-form.input
                                    id="client_id"
                                    name="client_id"
                                    value="{{ $appointment->pet->client->user->name }}"
                                    disabled
                                />
                                <x-form.label for="client_id">Cliente</x-form.label>
                            </div>

                            <div class="relative w-full">
                                <x-form.input
                                    id="pet_id"
                                    name="pet_id"
                                    value="{{ $appointment->pet->name }}"
                                    disabled
                                />
                                <x-form.label for="pet_id">Animal</x-form.label>
                            </div>
                        </div>

                        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
                            <div class="relative w-full">
                                <x-form.input
                                    id="employee_id"
                                    name="employee_id"
                                    value="{{ $appointment->employee ? $appointment->employee->user->name : '' }}"
                                    disabled
                                />
                                <x-form.label for="employee_id">Funcionário</x-form.label>
                            </div>

                            <div class="relative w-full">
                                <x-form.label for="service_id">Serviço</x-form.label>
                                <x-form.select
                                    id="service_id"
                                    name="service_id"
                                    class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2"
                                    required
                                >
                                    @foreach ($services as $service)
                                        <option
                                            value="{{ $service->id }}"
                                            {{ $service->id == $appointment->service->id ? 'selected' : '' }}
                                        >
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </x-form.select>
                            </div>
                        </div>

                        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Status -->
                            <div class="relative w-full">
                                <x-form.select
                                    id="status"
                                    name="status"
                                    :options="[
                                        ['value' => App\Enums\AppointmentStatus::PENDING->value, 'label' => App\Enums\AppointmentStatus::PENDING->value],
                                        ['value' => App\Enums\AppointmentStatus::CONFIRMED->value, 'label' => App\Enums\AppointmentStatus::CONFIRMED->value]
                                    ]"
                                    selected="{{ old('status', $appointment->status) }}"
                                    valueKey="value"
                                    labelKey="label"
                                    required
                                />
                                <x-form.label for="status">Estado</x-form.label>
                            </div>

                            <div class="relative w-full">
                                <x-form.input
                                    type="number"
                                    id="total_price"
                                    name="total_price"
                                    value="{{ old('total_price', $appointment->total_price) }}"
                                    step="0.01"
                                    min="0"
                                />
                                <x-form.label for="total_price">Custo</x-form.label>
                            </div>
                        </div>

                        <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
                            <div class="relative w-full">
                                <x-form.input
                                    type="datetime-local"
                                    id="appointment_date"
                                    name="appointment_date"
                                    value="{{ old('appointment_date', $appointment->appointment_date->setTimezone('Europe/Lisbon')->format('Y-m-d\TH:i')) }}"
                                    required
                                />
                                <x-form.label for="appointment_date">Data da Marcação</x-form.label>
                            </div>
                        </div>

                        <div>
                            <div class="flex gap-4 mt-6">
                                <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg mt-6">
                                    Editar Marcação
                                </x-form.button>

                                <a href="{{ route($rolePrefix . '.appointments.index') }}"
                                   class="px-8 py-2 text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none mt-6 flex items-center justify-center">
                                    Voltar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
