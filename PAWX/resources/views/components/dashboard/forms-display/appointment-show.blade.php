@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="flex flex-col space-y-6">
    <div class="flex-1 space-y-4 content-start">
        <x-utilities.title>Detalhes Marcação</x-utilities.title>
    </div>
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <div class="space-y-4">
            <div>
                <x-form.label for="client_id" class="text-gray-700 font-semibold">Cliente:</x-form.label>
                <p class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                    {{ optional(optional($appointment->pet->client)->user)->name ?? 'N/A' }}
                </p>
            </div>
            <div>
                <x-form.label for="pet_id" class="text-gray-700 font-semibold">Animal:</x-form.label>
                <p class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                    {{ $appointment->pet->name }}
                </p>
            </div>
            <div>
                <x-form.label for="service" class="text-gray-700 font-semibold">Serviço:</x-form.label>
                <p class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                    {{ $appointment->service->name }}
                </p>
            </div>
        </div>

        <div class="flex space-x-4">
            <div class="flex-1">
                <x-form.label for="date" class="text-gray-700 font-semibold">Data:</x-form.label>
                <p class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d-m-Y') }}
                </p>
            </div>
            <div class="flex-1">
                <x-form.label for="time" class="text-gray-700 font-semibold">Hora:</x-form.label>
                <p class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">

                </p>
            </div>
        </div>
        <div class="flex space-x-4">
            <div class="flex-1">
                <x-form.label for="status" class="text-gray-700 font-semibold">Estado:</x-form.label>
                <p class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                    {{ $appointment->status }}
                </p>
            </div>
            <div class="flex-1">
                <x-form.label for="total_price" class="text-gray-700 font-semibold">Custo:</x-form.label>
                <p class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                    {{ $appointment->total_price }}
                </p>
            </div>
        </div>
    </div>
</div>
