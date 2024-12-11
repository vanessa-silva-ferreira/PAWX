@php
    $role = auth()->user()->getRole();
    $rolePrefix = $role === 'admin' ? 'admin' : ($role === 'employee' ? 'employee' : ($role === 'client' ? 'client' : 'guest'));
@endphp
<div class="flex flex-col space-y-4 mt-16 py-6 px-6">
    <div class="overflow-x-auto">
        <div class="container mx-auto">
            <div class="mb-4">
                <x-utilities.title>Animal</x-utilities.title>
                <div class=" mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-6 md:col-span-2">
                            <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="relative w-full md:col-span-2">
                                    <x-form.label>Nome</x-form.label>
                                    <x-form.input
                                        name="name"
                                        value="{{ $pet->name }}"
                                        readonly
                                    />
                                </div>
                                <div class="relative w-full">
                                    <x-form.label>Espécie</x-form.label>
                                    <x-form.input
                                        name="name"
                                        value="{{ $pet->breed->species->name }}"
                                        readonly
                                    />
                                </div>
                            </div>

                            <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="relative w-full">
                                    <x-form.label>Raça</x-form.label>
                                    <x-form.input
                                        name="name"
                                        value="{{ $pet->breed->name }}"
                                        readonly
                                    />
                                </div>
                                <div class="relative w-full">
                                    <x-form.label>Pelagem</x-form.label>
                                    <x-form.input
                                        name="name"
                                        value="{{ $pet->breed->fur_type }}"
                                        readonly
                                    />
                                </div>
                                <div class="relative w-full">
                                    <x-form.label>Porte</x-form.label>
                                    <x-form.input
                                        name="name"
                                        value="{{ $pet->size->category }}"
                                        readonly
                                    />
                                </div>
                            </div>

                            <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="relative w-full">
                                    <x-form.label>Data de Nascimento</x-form.label>
                                    <x-form.input
                                        name="name"
                                        value="{{ $pet->birthdate->format('d/m/Y')}}"
                                        readonly
                                    />
                                </div>
                                <div class="relative w-full">
                                    <x-form.label>Género</x-form.label>
                                    <x-form.input
                                        name="name"
                                        value="{{ $pet->gender === 'male' ? 'Macho' : 'Fêmea' }}"
                                        readonly
                                    />
                                </div>
                                <div class="relative w-full">
                                    <x-form.label>Esterilização</x-form.label>
                                    <x-form.input
                                        name="name"
                                        value="{{ $pet->spay_neuter_status ? 'Sim' : 'Não' }}"
                                        readonly
                                    />
                                </div>
                            </div>

                            <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative w-full">
                                    <x-form.label>Histórico Médico</x-form.label>
                                    <x-form.textarea
                                        id="medical_history"
                                        name="medical_history"
                                        :value="$pet->medical_history ?? 'Nenhum histórico disponível'"
                                        readonly
                                    />
                                </div>
                                <div class="relative w-full">
                                    <x-form.label>Observações</x-form.label>
                                    <x-form.textarea
                                        id="obs"
                                        name="obs"
                                        :value="$pet->obs ?? 'Nenhuma observação disponível'"
                                        readonly
                                    />
                                </div>
                            </div>

                            <div class="relative w-full">
                                <x-form.label>Cliente</x-form.label>
                                <x-form.input
                                    name="name"
                                    value="{{ $pet->client->user->name }}"
                                    readonly
                                />
                            </div>

                        </div>

                        <div class="relative w-full border rounded-lg border-stone-200">
                            <x-form.label>Foto</x-form.label>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($pet->photos as $index => $photo)
                                    <img src="{{ asset($photo->photo_url) }}" alt="{{ $pet->name }}"
                                         class="w-full h-full object-cover">
                                @endforeach
                            </div>
                        </div>

                        <div class="flex gap-4 mt-6">
                            <a href="{{ route($rolePrefix . '.pets.edit', $pet->id) }}"
                               class="px-8 py-2 bg-pawx-orange text-white rounded-lg">
                                Editar Animal
                            </a>

                            <a href="{{ route($rolePrefix . '.pets.index') }}"
                               class="px-8 py-2 text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none">
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
