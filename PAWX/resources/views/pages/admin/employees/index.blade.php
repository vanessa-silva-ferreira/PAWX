@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="mx-10 my-10 bg-white">

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-10 uppercase" style="color: #81C784">Colaboradores</h1>

        <div class="flex items-center justify-between mb-10 space-x-4">
            <form method="GET" action="{{ route('admin.employees.index') }}" class="flex w-full max-w-full">
                <div class="relative flex-grow">
                    <input
                        type="text"
                        name="search"
                        placeholder="Procure por nome, username, email, contacto, nif, morada..."
                        class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
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
                </div>
            </form>

            <a
                href="{{ route('admin.employees.create') }}"
                class="px-4 py-2  text-white font-semibold rounded-lg focus:ring-2 focus:ring-blue-400" style="background-color: #81C784">
                Adicionar
            </a>
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
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->username }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone_number }}</td>
                        <td>{{ $employee->nif }}</td>
                        <td>{{ $employee->address }}</td>
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
