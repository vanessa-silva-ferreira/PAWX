@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="mx-4 my-6 bg-white p-6">
    <x-utilities.title>Marcação</x-utilities.title>
    <form class="space-y-6 mt-6">
        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Client Display -->
            <div class="relative w-full">
                <x-form.input
                    id="client_id"
                    name="client_id"
                    valueKey="id"
                    labelKey="user.name"
                    value="{{ $appointment->pet->client->user->name}}"
                    disabled
                />
                <x-form.label for="client_id">Cliente</x-form.label>
            </div>

            <div class="relative w-full">
                <x-form.input
                    id="pet_id"
                    name="pet_id"
                    valueKey="id"
                    labelKey="pet.name"
                    value="{{ $appointment->pet->name}}"
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
                    valueKey="id"
                    labelKey="employee.name"
                    value="{{ $appointment->employee->user->name}}"
                    disabled
                />
                <x-form.label for="employee_id">Funcionário</x-form.label>
            </div>

            <div class="relative w-full">
                <x-form.input
                    id="service_id"
                    name="service_id"
                    valueKey="id"
                    labelKey="name"
                    value="{{ $appointment->service->name }}"
                    disabled
                />
                <x-form.label for="service_id">Serviço</x-form.label>
            </div>
        </div>

        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="relative w-full">
                <x-form.input
                    id="total_price"
                    name="total_price"
                    valueKey="id"
                    labelKey="date"
                    value="{{ number_format($appointment->total_price, 2) }}"
                    disabled
                />
                <x-form.label for="total_price">Valor</x-form.label>
            </div>

            <div class="relative w-full">
                <x-form.input
                    id="status"
                    name="status"
                    valueKey="id"
                    labelKey="name"
                    value="{{ $appointment->status }}"
                    disabled
                />
                <x-form.label for="status">Estado</x-form.label>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
            <div class="relative w-full">
                <x-form.input
                    id="appointment_date"
                    name="appointment_date"
                    valueKey="id"
                    labelKey="date"
                    value="{{$appointment->appointment_date->format('Y-m-d H:i') }}"
                    disabled
                />
                <x-form.label for="appointment_date">Data da Marcação</x-form.label>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.appointments.index') }}" class="px-8 py-2 bg-gray-200 text-gray-800 rounded-lg">
                Voltar
            </a>
        </div>
    </form>
</div>



