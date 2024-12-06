@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="flex mx-10 my-10 bg-white">
        <div class="flex-grow">
            <div class="container mx-auto p-6">
                <div class="flex items-center justify-between mb-16">
                    <h1>Appointments</h1>
                    <div class="flex items-center space-x-4 w-1/2">
                        <form method="GET" action="{{ route('admin.appointments.index') }}" class="relative flex-grow">
                            <input
                                type="text"
                                name="search"
                                placeholder="Search by client name, pet name, service, etc."
                                class="text-sm w-full px-4 py-2 border border-pawx-grey rounded-lg focus:outline-none focus:ring-2 focus:ring-pawx-orange"
                                value="{{ request('search') }}"
                            />
                            <button
                                type="submit"
                                class="absolute right-2 top-1/2 transform -translate-y-1/2 text-stone-400 hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                                    <circle cx="11" cy="11" r="8"/>
                                    <line x1="21" x2="16.65" y1="21" y2="16.65"/>
                                </svg>
                            </button>
                        </form>

                        <a
                            href="{{ route('admin.appointments.create') }}"
                            class="px-4 py-2 text-white rounded-lg bg-pawx-orange">
                            Add Appointment
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead>
                        <tr class="bg-white-100 text-stone-400">
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Animal</th>
                            <th>Serviço</th>
                            <th>Data</th>
                            <th>Estado</th>
                            <th>Custo</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($appointments as $appointment)
                            <tr class="hover:bg-stone-100 text-stone-700">
                                <th class="py-6 px-6">{{ $appointment->id }}</th>
                                <td class="py-6 px-6">{{ $appointment->pet->client->user->name }}</td> <!-- Correct client name -->
                                <td class="py-6 px-6">{{ $appointment->pet->name }}</td> <!-- Correct pet name -->
                                <td class="py-6 px-6">{{ $appointment->service->name }}</td> <!-- Correct service name -->
                                <td class="py-6 px-6">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d-m-Y') }}</td>
                                <td class="py-6 px-6">{{ $appointment->status }}</td>
                                <td class="py-6 px-6">{{ $appointment->total_price }} €</td>
                                <td class="flex space-x-1">
                                    <a href="{{ route('admin.appointments.show', $appointment->id) }}" class="text-stone-400 hover:text-blue-800" title="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="text-stone-400 hover:text-yellow-800" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                            <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                            <path d="m15 5 4 4"/>
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-2">
                                    <form method="POST" action="{{ route('admin.appointments.destroy', $appointment->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-800">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $appointments->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
    {{--    @include('partials.dashboard.notifications', ['notifications' => $notifications])--}}
@endsection
