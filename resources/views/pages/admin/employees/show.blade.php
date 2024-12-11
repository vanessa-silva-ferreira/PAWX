
@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')

    <div class="mx-24 my-16 bg-white p-6">
{{--        <x-dashboard.title>Editar Colaborador</x-dashboard.title>--}}

        <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative w-full md:col-span-2">
                    <x-form.input
                        id="name"
                        name="name"
                        value="{{ old('name', $employee->user->name) }}"
                        readonly
                    />
                    <x-form.label for="name">Nome <span class="text-pawx-orange">*</span></x-form.label>
                </div>

                <div class="relative w-full">
                    <x-form.input
                        id="nif"
                        name="nif"
                        value="{{ old('nif', $employee->user->nif) }}"
                        readonly
                    />
                    <x-form.label for="nif">Número de Identificação Fiscal</x-form.label>
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

            <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative w-full md:col-span-2">
                    <x-form.input
                        id="email"
                        name="email"
                        value="{{ old('email', $employee->user->email) }}"
                        readonly
                    />
                    <x-form.label for="email">Email <span class="text-pawx-orange">*</span></x-form.label>
                </div>

                <div class="relative w-full mb-6">
                    <x-form.input
                        id="phone_number"
                        name="phone_number"
                        value="{{ old('phone_number', $employee->user->phone_number) }}"
                        readonly
                    />
                    <x-form.label for="phone_number">Contacto Telefónico</x-form.label>
                </div>
            </div>

            <div class="flex justify-start space-x-4 mt-6">
                <a href="{{ route('admin.employees.edit', $employee->id) }}" class="px-8 py-2 bg-pawx-orange text-white rounded-lg">
                    Editar Colaborador
                </a>
                <a href="{{ route('admin.employees.index') }}" class="px-8 py-2 bg-pawx-brown/10 text-black rounded-lg">
                    Voltar
                </a>
            </div>
        </form>
    </div>

@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
