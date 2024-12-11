@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp


<div class="mx-24 my-16 bg-white p-6">
   <x-utilities.title>Cliente</x-utilities.title>

    <form action="{{ route($rolePrefix .'.clients.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="relative w-full">
                <x-form.input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
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
                    value="{{ old('nif') }}"
                    maxlength="9"
                />
                <x-form.label
                    for="nif">
                    NIF
                </x-form.label>
                <x-form.validation-error name="nif"/>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
            <div class="relative w-full">
                <x-form.input
                    type="text"
                    id="address"
                    name="address"
                    value="{{ old('address') }}"
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
                    value="{{ old('email') }}"
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
                    value="{{ old('phone_number') }}"
                    maxlength="9"
                />
                <x-form.label for="phone_number">Contacto</x-form.label>
                <x-form.validation-error name="phone_number"/>
            </div>
        </div>

        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
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
                Criar Cliente
            </x-form.button>
        </div>
    </form>
</div>
