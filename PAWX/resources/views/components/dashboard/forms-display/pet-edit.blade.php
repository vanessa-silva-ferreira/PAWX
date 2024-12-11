@vite('resources/js/birthdate-age.js')

<style>
    .form-radio:checked {
        accent-color: #ff7f50;
    }
</style>

@php
    $role = auth()->user()->getRole();
    $rolePrefix = $role === 'admin' ? 'admin' : ($role === 'employee' ? 'employee' : ($role === 'client' ? 'client' : 'guest'));
@endphp


<div class="mx-24 my-16 bg-white p-6">
{{--    <x-dashboard.title>Editar Animal</x-dashboard.title>--}}

    <form action="{{route($rolePrefix.'pets.update', $pet->id) }}" method="POST" class="space-y-6"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="relative w-full md:col-span-3">
                <x-form.label for="name">Nome</x-form.label>
                <x-form.input
                    type="text"
                    name="name"
                    value="{{ old('name', $pet->name) }}"
                    required
                />
                <x-form.validation-error name="name"/>
            </div>

            <div class="relative w-full">
                <x-form.select
                    id="species_id"
                    name="species_id"
                    :options="$species"
                    valueKey="id"
                    labelKey="name"
                    required
                    selected="{{ old('species_id', $pet->species_id) }}"
                />


                <x-form.label for="species_id">Espécie</x-form.label>
                <x-form.validation-error name="species_id"/>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="relative w-full">
                <x-form.select
                    id="breed_id"
                    name="breed_id"
                    required
                >
                    <option value="" disabled selected hidden></option>
                    @foreach($breeds as $breed)
                        <option
                            value="{{ $breed['id'] }}"
                            data-species-id="{{ $breed['species_id'] }}"
                            data-fur-type="{{ $breed['fur_type'] }}"
                            {{ old('breed_id', $pet->breed_id) == $breed['id'] ? 'selected' : '' }}
                        >
                            {{ $breed['name'] }}
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
                    placeholder=""
                    required="true"
                    selected="{{ old('fur_type', $pet->breed->fur_type  ?? '') }}"
                    valueKey="value"
                    labelKey="label"
                >
                    <option value="" disabled selected hidden></option>
                </x-form.select>
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
                    selected="{{ old('size_id', $pet->size_id) }}"
                    valueKey="id"
                    labelKey="category"
                />
                <x-form.label for="size_id">Porte</x-form.label>
                <x-form.validation-error name="size_id"/>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="relative w-full md:col-span-2">
                <x-form.label for="birthdate">Data de Nascimento OU Idade</x-form.label>
                <div
                    class="flex gap-4 h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white">
                    <input
                        type="date"
                        name="birthdate"
                        id="birthdate"
                        class="w-1/2 focus:outline-none focus:ring-0"
                        value="{{ old('birthdate', $pet->birthdate ? $pet->birthdate->format('Y-m-d') : '') }}"
                    />
                    <input
                        type="number"
                        id="age_years"
                        name="age_years"
                        placeholder="Idade"
                        value="{{ old('age_years', $pet->age_years ?? '') }}"
                        class="w-1/2 focus:outline-none focus:ring-0 placeholder:text-sm uppercase"
                    />

                </div>
                <x-form.validation-error name="birthdate"/>
            </div>

            <div class="relative w-full">
                <x-form.label for="gender">Género</x-form.label>
                <div
                    class="gap-8 flex h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md items-center focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white min-w-[200px]">
                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="gender"
                            value="female"
                            class="form-radio focus:ring-pawx-orange"
                            {{ old('gender', $pet->gender) == 'female' ? 'checked' : '' }}
                        />
                        <span class="text-pawx-brown/70">Fêmea</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="gender"
                            value="male"
                            class="form-radio focus:ring-pawx-orange"
                            {{ old('gender', $pet->gender) == 'male' ? 'checked' : '' }}
                        />
                        <span class="text-pawx-brown/70">Macho</span>
                    </label>
                </div>
                <x-form.validation-error name="gender"/>
            </div>

            <div class="relative w-full">
                <x-form.label for="spay_neuter_status">Esterilização</x-form.label>
                <div
                    class="gap-8 flex h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md items-center focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white min-w-[170px]">
                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="spay_neuter_status"
                            value="1"
                            class="form-radio focus:ring-pawx-orange"
                            {{ old('spay_neuter_status', $pet->spay_neuter_status) == '1' ? 'checked' : '' }}
                        />
                        <span class="text-pawx-brown/70">Sim</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="spay_neuter_status"
                            value="0"
                            class="form-radio focus:ring-pawx-orange"
                            {{ old('spay_neuter_status', $pet->spay_neuter_status) == '0' ? 'checked' : '' }}
                        />
                        <span class="text-pawx-brown/70">Não</span>
                    </label>
                </div>
                <x-form.validation-error name="spay_neuter_status"/>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="relative w-full">
                <x-form.label for="medical_history">Histórico Médico</x-form.label>
                <x-form.textarea
                    id="medical_history"
                    name="medical_history"
                    :value="old('medical_history', $pet->medical_history)"
                />
            </div>

            <div class="relative w-full">
                <x-form.label for="obs">Observações</x-form.label>
                <x-form.textarea
                    id="obs"
                    name="obs"
                    :value="old('obs', $pet->obs)"
                    class="w-full h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70"
                />
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="relative w-full">
                <x-form.select
                    id="client_id"
                    name="client_id"
                    :options="$clients"
                    valueKey="id"
                    labelKey="user.name"
                    selected="{{ old('client_id', $pet->client_id) }}"
                    required
                />
                <x-form.label for="client_id">Cliente</x-form.label>
                <x-form.validation-error name="client_id"/>
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

        <div>
            <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg mt-6">
                Atualizar Animal
            </x-form.button>
        </div>
    </form>
</div>


