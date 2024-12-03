@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="mx-24 my-16 bg-white p-6">
    <x-dashboard.title>Serviço No. {{$service->id}}</x-dashboard.title>

    <div class="space-y-6">
        <div class="relative w-full">
            <x-form.label for="name">Nome</x-form.label>
            <x-form.input
                id="name"
                name="name"
                value="{{ old('name', $service->name) }}"
                readonly
            />
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="relative w-full">
                <x-form.label for="price">Preço</x-form.label>
                <x-form.input
                    id="price"
                    name="price"
                    value="{{ old('price', number_format($service->price, 2)) }}"
                    readonly
                />
            </div>

            <div class="relative w-full">
                <x-form.label for="cost">Custo</x-form.label>

                <x-form.input
                    id="cost"
                    name="cost"
                    value="{{ old('cost', number_format($service->cost, 2)) }}"
                    readonly
                />
            </div>
        </div>

        <div class="relative w-full">
            <x-form.label for="obs">Observações</x-form.label>
            <x-form.input
                id="obs"
                name="obs"
                value="{{ $service->obs ?: 'Sem observações' }}"
                readonly
            />
        </div>
    </div>
    <div class="flex justify-start space-x-4 mt-12">
        <a href="{{ route('admin.services.edit', $service->id) }}"
           class="px-8 py-2 bg-pawx-orange text-white rounded-lg">
            Editar Serviço
        </a>
        <a href="{{ route($rolePrefix . '.services.index') }}" class="px-8 py-2 bg-gray-300 text-black rounded-lg">
            Voltar
        </a>
    </div>
</div>
