@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="flex mx-10 my-10 bg-white">
        <div class="flex-grow">
            <div class="container mx-auto p-6">
                <div class="flex items-center justify-between mb-16">
                    <x-dashboard.title>Colaboradores</x-dashboard.title>
{{--                    <h1 class="text-2xl font-bold uppercase text-pawx-orange tracking-wider">Colaboradores</h1>--}}
                    <div class="flex items-center space-x-4 w-1/2">
                        <form method="GET" action="{{ route('admin.employees.index') }}" class="relative flex-grow">
                            <input
                                type="text"
                                name="search"
                                placeholder="Procure por nome, email, contacto, nif, morada ..."
                                class="text-sm w-full px-4 py-2 border border-pawx-grey  rounded-lg focus:outline-none focus:ring-2 focus:ring-pawx-orange"
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
                            href="{{ route('admin.employees.create') }}"
                            class="px-4 py-2 text-white rounded-lg bg-pawx-orange">
                            Adicionar
                        </a>
                    </div>

                </div>

                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead>
                        <tr class="bg-white-100 text-stone-400">
                            <th>#</th>
                            <th>NOME</th>
                            <th>USERNAME</th>
                            <th>EMAIL</th>
                            <th>CONTACTO</th>
                            <th>NIF</th>
                            <th>MORADA</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($employees as $employee)
                            <tr class="hover:bg-stone-100 text-stone-700">
                                <th class="py-6 px-6">{{ $employee->employee->id }}</th>
                                <td class="py-6 px-6">{{ $employee->name }}</td>
                                <td class="py-6 px-6">{{ $employee->username }}</td>
                                <td class="py-6 px-6">{{ $employee->email }}</td>
                                <td class="py-6 px-6">{{ $employee->phone_number }}</td>
                                <td class="py-6 px-6">{{ $employee->nif }}</td>
                                <td class="py-6 px-6">{{ $employee->address }}</td>
                                <td class="flex space-x-1">
                                    <a href="{{ route('admin.employees.show', $employee->employee->id) }}" class="text-stone-400 hover:text-blue-800" title="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.employees.edit', $employee->employee->id) }}" class="text-stone-400 hover:text-yellow-800" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                            <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                            <path d="m15 5 4 4"/>
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-2">
                                    <form method="POST" action="{{ route('admin.employees.destroy', $employee->employee->id) }}">
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
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('notifications')
    @include('partials.dashboard.notification-bar')
    {{--    @include('partials.dashboard.notifications', ['notifications' => $notifications])--}}
@endsection

