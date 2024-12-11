
@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    @php
        $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
    @endphp

    <div class="mx-24 my-16 bg-white p-6">
        <x-utilities.title>Editar Cliente</x-utilities.title>

        <form action="{{ route($rolePrefix .'.clients.update', $client->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative w-full md:col-span-2">
                    <x-form.input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $client->user->name) }}"
                        required
                    />
                    <x-form.label for="name">Nome <span class="text-pawx-orange">*</span></x-form.label>
                    <x-form.validation-error name="name"/>
                </div>

                <div class="relative w-full">
                    <x-form.input
                        type="text"
                        id="nif"
                        name="nif"
                        value="{{ old('nif', $client->user->nif) }}"
                        maxlength="9"
                    />
                    <x-form.label for="nif">NIF</x-form.label>
                    <x-form.validation-error name="nif"/>
                </div>
            </div>

            <div class="relative w-full">
                <x-form.input
                    type="text"
                    id="address"
                    name="address"
                    value="{{ old('address', $client->user->address) }}"
                />
                <x-form.label for="address">Morada</x-form.label>
                <x-form.validation-error name="address"/>
            </div>

            <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative w-full md:col-span-2">
                    <x-form.input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $client->user->email) }}"
                        required
                    />
                    <x-form.label for="email">Email <span class="text-pawx-orange">*</span></x-form.label>
                    <x-form.validation-error name="email"/>
                </div>

                <div class="relative w-full">
                    <x-form.input
                        type="text"
                        id="phone_number"
                        name="phone_number"
                        value="{{ old('phone_number', $client->user->phone_number) }}"
                        maxlength="9"
                    />
                    <x-form.label for="phone_number">Contacto Telefónico</x-form.label>
                    <x-form.validation-error name="phone_number"/>
                </div>
            </div>

            <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative w-full mb-6">
                    <x-form.input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Insira se quiser alterar"
                    />
                    <x-form.label for="password">Palavra-passe</x-form.label>
                    <x-form.validation-error name="password"/>
                </div>

                <div class="relative w-full mb-6">
                    <x-form.input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirme se quiser alterar"
                    />
                    <x-form.label for="password_confirmation">Confirmar Palavra-passe</x-form.label>
                    <x-form.validation-error name="password_confirmation"/>
                </div>
            </div>


            <div class="flex justify-start space-x-4 mt-6">
                <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg">
                    Atualizar Cliente
                </x-form.button>

                <a href="{{ route( $rolePrefix .'.clients.index') }}" class="px-8 py-2 bg-pawx-brown/10 text-black rounded-lg">
                    Voltar
                </a>
            </div>
        </form>
    </div>

@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
