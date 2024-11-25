@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="mx-10 my-10 bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 uppercase" style="color: #81C784">Criar Animal</h1>

        @if ($errors->any())
            <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pets.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="species_id" class="block mb-2 font-medium text-gray-700">Espécie</label>
                    <select id="species_id" name="species_id" class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-2 focus:ring-pawx-orange/70 bg-white" required>
                        <option value="">Selecione a Espécie</option>
                        @foreach ($species as $specie)
                            <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                        @endforeach
                    </select>
                    <x-form.validation-error name="species_id" />
                </div>

                <div>
                    <label for="breed_id" class="block mb-2 font-medium text-gray-700">Raça</label>
                    <select id="breed_id" name="breed_id" class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-2 focus:ring-pawx-orange/70 bg-white" required>
                        <option value="">Selecione a Raça</option>
                        @foreach ($breeds as $breed)
                            <option value="{{ $breed->id }}" data-species-id="{{ $breed->species_id }}" data-fur-type="{{ $breed->fur_type }}">
                                {{ $breed->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.validation-error name="breed_id" />
                </div>

                <div>
                    <label for="fur_type" class="block mb-2 font-medium text-gray-700">Tipo de Pelo</label>
                    <input type="text" id="fur_type" name="fur_type" class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-2 focus:ring-pawx-orange/70 bg-white" readonly>
                </div>

                <div>
                    <label for="size_id" class="block mb-2 font-medium text-gray-700">Tamanho</label>
                    <select id="size_id" name="size_id" class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-2 focus:ring-pawx-orange/70 bg-white" required>
                        <option value="">Selecione o Tamanho</option>
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->category }}</option>
                        @endforeach
                    </select>
                    <x-form.validation-error name="size_id" />
                </div>
            </div>

            <x-form.input
                name="name"
                label="Nome"
                required
                placeholder="Insira o nome do animal" />

            <x-form.input
                type="date"
                name="birthdate"
                label="Data de Nascimento"
                required />

            <div class="form-group">
                <x-form.label for="gender">Género</x-form.label>
                <select id="gender" name="gender" class="form-control">
                    <option value="">Selecione o Género</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Macho</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Fêmea</option>
                </select>
                <x-form.validation-error name="gender" />
            </div>

            <div class="form-group">
                <x-form.label for="medical_history">Histórico Médico</x-form.label>
                <textarea id="medical_history" name="medical_history" class="form-control" placeholder="Insira o histórico médico">{{ old('medical_history') }}</textarea>
                <x-form.validation-error name="medical_history" />
            </div>

            <div class="form-group">
                <x-form.label>Estado de Esterilização</x-form.label>
                <div class="space-y-2">
                    <div class="form-check">
                        <x-form.input
                            type="radio"
                            name="spay_neuter_status"
                            id="spayed"
                            value="1"
                            required
                            :checked="old('spay_neuter_status') == '1'"
                            class="form-check-input" />
                        <x-form.label for="spayed" class="form-check-label">Esterilizado</x-form.label>
                    </div>
                    <div class="form-check">
                        <x-form.input
                            type="radio"
                            name="spay_neuter_status"
                            id="not_spayed"
                            value="0"
                            required
                            :checked="old('spay_neuter_status') == '0'"
                            class="form-check-input" />
                        <x-form.label for="not_spayed" class="form-check-label">Não Esterilizado</x-form.label>
                    </div>
                </div>
                <x-form.validation-error name="spay_neuter_status" />
            </div>

            <div class="form-group">
                <x-form.label for="status">Estado</x-form.label>
                <select id="status" name="status" class="form-control">
                    <option value="">Selecione o Estado</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Ativo</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inativo</option>
                </select>
                <x-form.validation-error name="status" />
            </div>

            <div class="form-group">
                <x-form.label for="obs">Observações</x-form.label>
                <textarea id="obs" name="obs" class="form-control" placeholder="Insira observações (opcional)">{{ old('obs') }}</textarea>
                <x-form.validation-error name="obs" />
            </div>

            <div class="form-group">
                <label for="client_id">Cliente</label>
                <select id="client_id" name="client_id" class="form-control" required>
                    <option value="">Selecione o Cliente</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                            {{ $client->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <x-form.button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Adicionar Animal
            </x-form.button>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allBreeds = [...document.querySelectorAll('#breed_id option[data-species-id]')]; // Grab all initial options

        document.getElementById('species_id').addEventListener('change', function () {
            const speciesId = this.value;
            const breedSelect = document.getElementById('breed_id');

            breedSelect.innerHTML = '<option value="">Selecione a Raça</option>';

            allBreeds.forEach(breed => {
                if (breed.getAttribute('data-species-id') === speciesId) {
                    const newOption = document.createElement('option');
                    newOption.value = breed.value;
                    newOption.textContent = breed.textContent;
                    newOption.setAttribute('data-fur-type', breed.getAttribute('data-fur-type'));
                    breedSelect.appendChild(newOption);
                }
            });
        });

        document.getElementById('breed_id').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const furType = selectedOption.getAttribute('data-fur-type') || '';

            document.getElementById('fur_type').value = furType;
        });
    });
</script>
