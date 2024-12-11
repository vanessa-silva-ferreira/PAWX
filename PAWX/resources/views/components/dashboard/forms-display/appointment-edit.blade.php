@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="flex flex-col space-y-6">
    <div class="flex-1 space-y-4 content-start">
        <x-utilities.title>Editar Marcação</x-utilities.title>
    </div>
    <form action="{{ route( $rolePrefix .'.appointments.update', $appointment->id) }}" method="POST" class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <div>
                <x-form.label for="client_id" class="text-gray-700 font-semibold">Cliente:</x-form.label>
                <select id="client_id" name="client_id" class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ $client->id == $appointment->pet->client_id ? 'selected' : '' }}>
                            {{ $client->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-form.label for="pet_id" class="text-gray-700 font-semibold">Animal:</x-form.label>
                <select id="pet_id" name="pet_id" class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                    @foreach ($pets as $pet)
                        <option value="{{ $pet->id }}" {{ $pet->id == $appointment->pet->id ? 'selected' : '' }}>
                            {{ $pet->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-form.label for="service_id" class="text-gray-700 font-semibold">Serviço:</x-form.label>
                <select id="service_id" name="service_id" class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ $service->id == $appointment->service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex space-x-4">
            <div class="flex-1">
                <x-form.label for="appointment_date" class="text-gray-700 font-semibold">Data:</x-form.label>
                <input type="date" id="appointment_date" name="appointment_date"
                       value="{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}"
                       class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
            </div>
        </div>

        <div class="flex space-x-4">
            <div class="flex-1">
                <x-form.label for="status" class="text-gray-700 font-semibold">Estado:</x-form.label>
                <select id="status" name="status" class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                    <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pendente</option>
                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Concluído</option>
                    <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>
            <div class="flex-1">
                <x-form.label for="total_price" class="text-gray-700 font-semibold">Custo:</x-form.label>
                <input type="number" id="total_price" name="total_price" value="{{ $appointment->total_price }}" step="0.01" class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-orange-600 text-white font-bold rounded hover:bg-orange-500">
                Salvar Alterações
            </button>
        </div>
    </form>
</div>
