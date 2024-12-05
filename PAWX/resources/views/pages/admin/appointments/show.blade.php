@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')

    <div class="flex flex-col space-y-6">
        <div class="flex-1 space-y-4 content-start">
            <h2 class="text-left text-3xl font-extrabold text-orange-600">
                Detalhes da Marcação
            </h2>
        </div>
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <div class="space-y-4">
                <div>
                    <x-form.label for="client_id" class="text-gray-700 font-semibold">Cliente:</x-form.label>
                    <p class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                        {{ $appointment->client->user->name }}
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
                        {{ $appointment->service }}
                    </p>
                </div>
            </div>

            <div class="flex space-x-4">
                <div class="flex-1">
                    <x-form.label for="date" class="text-gray-700 font-semibold">Data:</x-form.label>
                    <p class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                        {{ $appointment->date }}
                    </p>
                </div>
                <div class="flex-1">
                    <x-form.label for="time" class="text-gray-700 font-semibold">Hora:</x-form.label>
                    <p class="rounded h-8 bg-gray-100 text-gray-700 w-full ring-1 ring-gray-600 p-2">
                        {{ $appointment->time }}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
