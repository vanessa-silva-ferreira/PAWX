@vite('resources/js/birthdate-age.js')
@vite('resources/js/pet-form.js')

<style>
    .form-radio:checked {
        accent-color: #ff7f50;
    }
</style>

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
                    <form action="{{ route( $rolePrefix . '.pets.store') }}" method="POST" class="space-y-6"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="relative w-full md:col-span-3">
                                <x-form.label for="name">Nome</x-form.label>
                                <x-form.input name="name" required/>
                            </div>

                            <div class="relative w-full">
                                <x-form.select
                                    id="species_id"
                                    name="species_id"
                                    :options="$species"
                                    valueKey="id"
                                    labelKey="name"
                                    placeholder=" "
                                    required
                                    selected="{{ old('species_id') }}"
                                />
                                <x-form.label for="species_id">Espécie</x-form.label>
                                @error('species_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="relative w-full">
                                <x-form.select
                                    id="breed_id"
                                    name="breed_id"
                                    required
                                >
                                    <option value="" disabled hidden>Selecione a Raça</option>
                                    @foreach($breeds as $breed)
                                        <option
                                            value="{{ $breed->id }}"
                                            data-species-id="{{ $breed->species_id }}"
                                            data-fur-type="{{ $breed->fur_type }}"
                                            {{ old('breed_id', $pet->breed_id ?? '') == $breed->id ? 'selected' : '' }}
                                        >
                                            {{ $breed->name }}
                                        </option>
                                    @endforeach
                                </x-form.select>
                                <x-form.label for="breed_id">Raça</x-form.label>
                                <x-form.validation-error name="breed_id"/>
                            </div>

                            <div class="relative w-full">
                                <x-form.select
                                    id="fur_type"
                                    name="fur_type"
                                    :options="collect(\App\Enums\FurType::cases())->map(fn($case) => ['value' => $case->value, 'label' => ucfirst($case->value)])"
                                    required
                                    selected="{{ old('fur_type', $pet->fur_type ?? '') }}"
                                    valueKey="value"
                                    labelKey="label"
                                />
                                <x-form.label for="fur_type">Pelagem</x-form.label>
                                <x-form.validation-error name="fur_type"/>

                            </div>

                            <div class="relative w-full">
                                <x-form.select
                                    id="size_id"
                                    name="size_id"
                                    :options="$sizes"
                                    placeholder=" "
                                    required="true"
                                    selected="{{ old('size_id') }}"
                                    valueKey="id"
                                    labelKey="category"
                                />
                                <x-form.label for="size_id">Porte</x-form.label>
                                @error('size_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="relative w-full md:col-span-2">
                                <x-form.label
                                    for="birthdate"
                                    class="uppercase absolute top-2 left-4 text-sm text-pawx-brown/40 transition-all duration-200 pointer-events-none transform origin-left scale-100 focus-within:scale-75 focus-within:-translate-y-2"
                                >
                                    Data de Nascimento OU Idade
                                </x-form.label>
                                <div
                                    class="flex gap-4 h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white">
                                    <input
                                        type="date"
                                        name="birthdate"
                                        id="birthdate"
                                        class="w-1/2 focus:outline-none focus:ring-0"
                                        required
                                    />
                                    <input
                                        type="number"
                                        id="age_years"
                                        name="age_years"
                                        placeholder="Idade"
                                        class="w-1/2 focus:outline-none focus:ring-0 placeholder:text-sm uppercase"
                                    />
                                </div>
                                @error('birthdate')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="relative w-full">
                                <x-form.label for="gender">Género</x-form.label>
                                <div
                                    class="gap-8 flex h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md items-center focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white">
                                    <label class="flex items-center gap-2">
                                        <input
                                            type="radio"
                                            name="gender"
                                            value="female"
                                            class="form-radio focus:ring-pawx-orange"
                                            required
                                        />
                                        <span class="text-pawx-brown/70">Fêmea</span>
                                    </label>

                                    <label class="flex items-center gap-2">
                                        <input
                                            type="radio"
                                            name="gender"
                                            value="male"
                                            class="form-radio focus:ring-pawx-orange"
                                            required
                                        />
                                        <span class="text-pawx-brown/70">Macho</span>
                                    </label>
                                </div>
                                @error('gender')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="relative w-full">
                                <x-form.label for="spay_neuter_status">Esterilização</x-form.label>
                                <div
                                    class="gap-8 flex h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md items-center focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white">
                                    <label class="flex items-center gap-2">
                                        <input
                                            type="radio"
                                            name="spay_neuter_status"
                                            value="1"
                                            class="form-radio focus:ring-pawx-orange"
                                            required
                                        />
                                        <span class="text-pawx-brown/70">Sim</span>
                                    </label>

                                    <label class="flex items-center gap-2">
                                        <input
                                            type="radio"
                                            name="spay_neuter_status"
                                            value="0"
                                            class="form-radio focus:ring-pawx-orange"
                                            required
                                        />
                                        <span class="text-pawx-brown/70">Não</span>
                                    </label>
                                </div>
                                <x-form.validation-error name="spay_neuter_status"/>
                            </div>
                        </div>

                        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="relative w-full">
                                <x-form.label for="medical_history">Histórico Médico <span
                                        class="text-xs">(opcional)</span>
                                </x-form.label>
                                <x-form.textarea
                                    name="medical_history"
                                    :value="old('medical_history', $pet->medical_history ?? '')"
                                />
                            </div>

                            <div class="relative w-full">
                                <x-form.label for="obs">Observações <span class="text-xs">(opcional)</span>
                                </x-form.label>
                                <x-form.textarea
                                    id="obs"
                                    name="obs"
                                    :value="old('obs', $pet->obs ?? '')"
                                />
                            </div>
                        </div>

                        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                            <div class="relative w-full">
                                <x-form.select
                                    id="client_id"
                                    name="client_id"
                                    :options="$clients"
                                    placeholder=" "
                                    valueKey="id"
                                    labelKey="user.name"
                                    selected="{{ old('client_id') }}"
                                    required
                                />
                                <x-form.label for="client_id">Cliente</x-form.label>
                                @error('client_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative w-full">
                                <x-form.label for="photos">Fotos</x-form.label>
                                <input
                                    type="file"
                                    id="photos"
                                    name="photos[]"
                                    class="w-full h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange bg-white text-pawx-brown/70"
                                    multiple
                                />
                                <x-form.validation-error name="photos"/>
                            </div>
                        </div>

                        <input type="hidden" id="status" name="status" value="active"/>

                        <div class="flex gap-4 mt-6">
                            <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg mt-6">
                                Criar Animal
                            </x-form.button>

                            <a href="{{ route($rolePrefix . '.pets.index') }}"
                               class="px-8 py-2 text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none mt-6 flex items-center justify-center">
                                Voltar
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
