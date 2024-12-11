@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="mx-10 my-10 bg-white p-6">
    <x-utilities.title>Serviço No. {{$service->id}}</x-utilities.title>
    <form class="space-y-6 mt-16">
        <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
            <div class="relative w-full">
                <x-form.label for="name">Nome</x-form.label>
                <x-form.input
                    id="name"
                    name="name"
                    value="{{ old('name', $service->name) }}"
                    readonly
                />
            </div>
        </div>

        <div class="form-group w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
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

        <div class="form-group grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
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

        <div class="flex gap-4 mt-6">
            <a href="{{ route($rolePrefix . '.services.edit', $service->id) }}"
               class="px-8 py-2 bg-pawx-orange text-white rounded-lg">
                Editar Serviço
            </a>

            <a href="{{ route($rolePrefix . '.services.index') }}"
               class="px-8 py-2 text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none">
                Voltar
            </a>
        </div>
    </form>
</div>
