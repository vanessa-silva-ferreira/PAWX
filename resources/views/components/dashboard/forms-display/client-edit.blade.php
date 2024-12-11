@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    @php
        $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
    @endphp


    <div class="flex flex-col space-y-4 mt-16 py-6 px-6">
        <div class="overflow-x-auto">
            <div class="container mx-auto">
                <div class="mb-4">
                    <x-utilities.title>Editar Cliente</x-utilities.title>
                    <div class=" mt-10">
                        <form action="{{ route($rolePrefix .'.clients.update', $client->id) }}" method="POST"
                              class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
                                <div class="relative w-full">
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

                            <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
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
                            </div>

                            <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
                                <div class="relative w-full">
                                    <x-form.input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email', $client->user->email) }}"
                                        required
                                    />
                                    <x-form.label for="email">Email <span class="text-pawx-orange">*</span>
                                    </x-form.label>
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
                            <div class="mt-1"></div>
                            <div>
                                <div class="flex gap-4 mt-6">
                                    <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg mt-6">
                                        Editar Cliente
                                    </x-form.button>

                                    <a href="{{ route($rolePrefix . '.clients.index') }}"
                                       class="px-8 py-2 text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none mt-6 flex items-center justify-center">
                                        Voltar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
