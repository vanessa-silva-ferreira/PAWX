@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="mx-10 my-10 bg-white p-6">
    <x-utilities.title>Criar Serviço</x-utilities.title>

    <form action="{{ route($rolePrefix . '.services.store') }}" method="POST" class="space-y-6 mt-16">
        @csrf

        <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
            <div class="relative w-full">
                <x-form.input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                />
                <x-form.label for="name">Nome</x-form.label>
                <x-form.validation-error name="name"/>
            </div>
        </div>

        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="relative w-full">
                <x-form.input
                    type="number"
                    id="price"
                    name="price"
                    step="0.01"
                    value="{{ old('price') }}"
                    required
                />
                <x-form.label for="price">Preço</x-form.label>
                <x-form.validation-error name="price"/>
            </div>

            <div class="relative w-full">
                <x-form.input
                    type="number"
                    id="cost"
                    name="cost"
                    step="0.01"
                    value="{{ old('cost') }}"
                />
                <x-form.label for="cost">Custo</x-form.label>
                <x-form.validation-error name="cost"/>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
            <div class="relative w-full">
                <x-form.input
                    type="text"
                    id="obs"
                    name="obs"
                    value="{{ old('obs') }}"
                />
                <x-form.label for="obs">Observações</x-form.label>
                <x-form.validation-error name="obs"/>
            </div>
        </div>

        <div>
            <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg mt-6">
                Criar Serviço
            </x-form.button>
        </div>
    </form>
</div>
