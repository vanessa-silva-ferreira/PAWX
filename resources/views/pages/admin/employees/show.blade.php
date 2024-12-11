@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')

    <div class="mx-10 my-10 bg-white p-6">
        <x-utilities.title>Ver Colaborador</x-utilities.title>
        <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST"
              class="space-y-6 mt-16">
            @csrf
            @method('PUT')

            <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="relative w-full lg:col-span-2">
                    <x-form.input
                        id="name"
                        name="name"
                        value="{{ old('name', $employee->user->name) }}"
                        readonly
                    />
                    <x-form.label for="name">Nome</x-form.label>
                </div>

                <div class="relative w-full">
                    <x-form.input
                        id="nif"
                        name="nif"
                        value="{{ old('nif', $employee->user->nif) }}"
                        readonly
                    />
                    <x-form.label for="nif">NIF</x-form.label>
                </div>
            </div>

            <div class="relative w-full">
                <x-form.input
                    id="address"
                    name="address"
                    value="{{ old('address', $employee->user->address) }}"
                    readonly
                />
                <x-form.label for="address">Morada</x-form.label>
            </div>

            <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="relative w-full lg:col-span-2">
                    <x-form.input
                        id="email"
                        name="email"
                        value="{{ old('email', $employee->user->email) }}"
                        readonly
                    />
                    <x-form.label for="email">Email <span class="text-pawx-orange">*</span>
                    </x-form.label>
                </div>

                <div class="relative w-full">
                    <x-form.input
                        id="phone_number"
                        name="phone_number"
                        value="{{ old('phone_number', $employee->user->phone_number) }}"
                        readonly
                    />
                    <x-form.label for="phone_number">Contacto</x-form.label>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <a href="{{ route('admin.employees.edit', $employee->id) }}"
                   class="px-8 py-2 bg-pawx-orange text-white rounded-lg">
                    Editar Colaborador
                </a>

                <a href="{{ route('admin.employees.index') }}"
                   class="px-8 py-2 text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none">
                    Voltar
                </a>
            </div>
        </form>
    </div>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
