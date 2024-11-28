@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<script src="{{ asset('js/pet-form.js') }}" defer></script>
<script src="{{ asset('js/birthdate-age.js') }}"></script>

<div class="mx-4 my-4 bg-white p-6">

    <x-dashboard.title>Editar Animal</x-dashboard.title>
    @if ($errors->any())
        <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pets.update', $pet->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <x-form.label for="client_id">Cliente</x-form.label>
            <x-form.select
                id="client_id"
                name="client_id"
                :options="$clients"
                placeholder="Selecione o Cliente"
                required="true"
                selected="{{ old('client_id', $pet->client_id) }}"
                :extraAttributes="[]"
                valueKey="id"
                labelKey="user.name"
            />
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <x-form.label for="species_id">Espécie</x-form.label>
                <x-form.select
                    id="species_id"
                    name="species_id"
                    :options="$species"
                    placeholder="Selecione a Espécie"
                    required="true"
                    selected="{{ old('species_id', $pet->breed->species_id) }}"
                />
                <x-form.validation-error name="species_id" />
            </div>

            <div>
                <x-form.label for="breed_id">Raça</x-form.label>
                <x-form.select
                    id="breed_id"
                    name="breed_id"
                    :options="$breeds"
                    placeholder="Selecione a Raça"
                    required="true"
                    selected="{{ old('breed_id', $pet->breed_id) }}"
                    :extraAttributes="['data-species-id' => 'species_id', 'data-fur-type' => 'fur_type']"
                />
                <x-form.validation-error name="breed_id" />
            </div>

            <div>
                <x-form.label for="fur_type">Pelagem</x-form.label>
                <x-form.select
                    id="fur_type"
                    name="fur_type"
                    :options="collect(\App\Enums\FurType::cases())->map(fn($case) => ['value' => $case->value, 'label' => ucfirst($case->value)])"
                    placeholder="Selecione a Pelagem"
                    required="true"
                    selected="{{ old('fur_type', $pet->breed->fur_type) }}"
                    valueKey="value"
                    labelKey="label"
                />
            </div>

            <div>
                <x-form.label for="size_id">Porte</x-form.label>
                <x-form.select
                    id="size_id"
                    name="size_id"
                    :options="$sizes"
                    placeholder="Selecione o Porte"
                    required="true"
                    selected="{{ old('size_id', $pet->size_id) }}"
                    labelKey="category"
                />
                <x-form.validation-error name="size_id" />
            </div>
        </div>
        <div class="flex flex-wrap items-start gap-4">
            <div class="flex-1 min-w-[250px]">
                <x-form.label for="name">Nome</x-form.label>
                <x-form.input
                    class="w-full p-2 mt-1 mb-3 border border-pawx-grey rounded-md placeholder-pawx-brown/70 focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70"
                    name="name"
                    required
                    value="{{ old('name', $pet->name) }}"
                />
            </div>
        </div>

        <div class="flex flex-wrap items-start gap-8">
            <div class="flex-1 min-w-[150px]">
                <x-form.label for="gender">Género</x-form.label>
                <div class="flex items-center gap-6">
                    <label class="ml-3 flex items-center gap-2">
                        <input
                            type="radio"
                            name="gender"
                            value="female"
                            class="form-radio focus:ring-pawx-orange"
                            {{ old('gender', $pet->gender) == 'female' ? 'checked' : '' }}
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
                            {{ old('gender', $pet->gender) == 'male' ? 'checked' : '' }}
                            required
                        />
                        <span class="text-pawx-brown/70">Macho</span>
                    </label>
                </div>
            </div>

            <div class="flex-1 mb-2">
                <x-form.label for="birthdate">Data de Nascimento OU Idade</x-form.label>
                <div class="flex items-center gap-2">
                    <input
                        type="date"
                        name="birthdate"
                        id="birthdate"
                        class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70"
                        value="{{ old('birthdate', $pet->birthdate) }}"
                        required
                    />
                    <input
                        type="number"
                        id="age_years"
                        name="age_years"
                        class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70"
                        value="{{ old('age_years', $pet->age_years) }}"
                    />
                </div>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-form.label for="medical_history">Histórico Médico</x-form.label>
                <x-form.textarea
                    name="medical_history"
                    rows="2"
                    :value="old('medical_history', $pet->medical_history)"
                />
            </div>
            <div>
                <x-form.label for="obs">Observações</x-form.label>
                <x-form.textarea
                    id="obs"
                    name="obs"
                    rows="2"
                    :value="old('obs', $pet->obs)"
                />
            </div>
        </div>

        <div class="form-group flex flex-wrap items-center gap-4">
            <div class="flex-1 min-w-[150px]">
                <x-form.label for="spay_neuter_status">Esterilização</x-form.label>
                <div class="flex items-center gap-6">
                    <label class="ml-3 flex items-center gap-2">
                        <input
                            type="radio"
                            name="spay_neuter_status"
                            value="1"
                            class="form-radio focus:ring-pawx-orange"
                            {{ old('spay_neuter_status', $pet->spay_neuter_status) == '1' ? 'checked' : '' }}
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
                            {{ old('spay_neuter_status', $pet->spay_neuter_status) == '0' ? 'checked' : '' }}
                            required
                        />
                        <span class="text-pawx-brown/70">Não</span>
                    </label>
                </div>
            </div>

            <div class="flex-1">
                <x-form.label for="photos">Fotos</x-form.label>
                <input
                    type="file"
                    id="photos"
                    name="photos[]"
                    class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange bg-white text-pawx-brown/70"
                    multiple
                >
                <x-form.validation-error name="photos" />
            </div>
        </div>

        <input type="hidden" id="status" name="status" value="{{ old('status', $pet->status) }}" />

        <div>
            <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg">
                Atualizar
            </x-form.button>
        </div>
    </form>
</div>

