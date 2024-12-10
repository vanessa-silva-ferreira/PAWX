@php
    $rolePrefix = auth()->user()->getRole();
@endphp

<div class="mx-24 my-16 bg-white p-6">
            <x-utilities.title>Editar Conta</x-utilities.title>

    @if (session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route($rolePrefix . '.account.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="form-group grid grid-cols-1 md:grid-cols-3 md:gap-6">
            <div class="relative w-full md:col-span-2">
                <x-form.input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
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
                    value="{{ old('nif', $user->nif) }}"
                    maxlength="9"
                />
                <x-form.label
                    for="nif">
                    NIF
                </x-form.label>
                <x-form.validation-error name="nif"/>
            </div>
        </div>

        <div class="relative w-full">
            <x-form.input
                type="text"
                id="address"
                name="address"
                value="{{ old('nif', $user->address) }}"
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
                    value="{{ old('nif', $user->email) }}"
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
                    value="{{ old('nif', $user->phone_number) }}"
                    maxlength="9"
                />
                <x-form.label for="phone_number">Contacto</x-form.label>
                <x-form.validation-error name="phone_number"/>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="relative w-full ">
                <x-form.input
                    type="password"
                    id="password"
                    name="password"
                />
                <x-form.label for="password">Palavra-passe <span class="text-pawx-orange">*</span></x-form.label>
                <x-form.validation-error name="password"/>
            </div>

            <div class="relative w-full">
                <x-form.input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                />
                <x-form.label for="password_confirmation">Confirmar Palavra-passe <span
                        class="text-pawx-orange">*</span></x-form.label>
                <x-form.validation-error name="password_confirmation"/>
            </div>
        </div>

        <div>
            <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg mt-6">
                Atualizar Conta
            </x-form.button>
        </div>
    </form>
</div>
