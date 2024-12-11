
@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp
<div class="mx-24 my-16 bg-white p-6">
    <x-utilities.title>Cliente No. {{$client->id}}</x-utilities.title>

    <form action="{{ route($rolePrefix .'.clients.update', $client->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="relative w-full">
                <x-form.input
                    id="name"
                    name="name"
                    value="{{ old('name', $client->user->name) }}"
                    readonly
                />
                <x-form.label for="name">Nome <span class="text-pawx-orange">*</span></x-form.label>
            </div>

            <div class="relative w-full">
                <x-form.input
                    id="nif"
                    name="nif"
                    value="{{ old('nif', $client->user->nif) }}"
                    readonly
                />
                <x-form.label for="nif">NIF</x-form.label>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
            <div class="relative w-full">
                <x-form.input
                    id="address"
                    name="address"
                    value="{{ old('address', $client->user->address) }}"
                    readonly
                />
                <x-form.label for="address">Morada</x-form.label>
            </div>
        </div>

        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="relative w-full">
                <x-form.input
                    id="email"
                    name="email"
                    value="{{ old('email', $client->user->email) }}"
                    readonly
                />
                <x-form.label for="email">Email <span class="text-pawx-orange">*</span></x-form.label>
            </div>

            <div class="relative w-full">
                <x-form.input
                    id="phone_number"
                    name="phone_number"
                    value="{{ old('phone_number', $client->user->phone_number) }}"
                    readonly
                />
                <x-form.label for="phone_number">Contacto Telefónico</x-form.label>
            </div>
        </div>

        <div class="flex justify-start space-x-4 mt-6">
            <a href="{{ route($rolePrefix.'.clients.edit', $client->id) }}"
               class="px-8 py-2 bg-pawx-orange text-white rounded-lg">
                Editar Cliente
            </a>
            <a href="{{ route($rolePrefix .'.clients.index') }}" class="px-8 py-2 bg-pawx-brown/10 text-black rounded-lg">
                Voltar
            </a>
        </div>
    </form>
</div>
