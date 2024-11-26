
<div class="mx-4 my-4 bg-white p-6">

    <x-dashboard.title>Criar Animal</x-dashboard.title>
    @if ($errors->any())
        <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pets.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <x-form.label for="client_id">Cliente</x-form.label>
            <x-form.select
                id="client_id"
                name="client_id"
                :options="$clients"
                placeholder="Selecione o Cliente"
                required="true"
                selected="{{ old('client_id') }}"
                :extraAttributes="[]"
                valueKey="id"
                labelKey="user.name"
            />
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-8 ">
            <div>
                <x-form.label for="species_id">Espécie</x-form.label>
                <x-form.select
                    id="species_id"
                    name="species_id"
                    :options="$species"
                    placeholder="Selecione a Espécie"
                    required="true"
                    selected="{{ old('species_id') }}"
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
                    selected="{{ old('breed_id') }}"
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
                    selected="{{ old('fur_type') }}"
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
                    selected="{{ old('size_id') }}"
                    labelKey="category"
                />
                <x-form.validation-error name="size_id" />
            </div>
        </div>
        <div class="flex flex-wrap items-start gap-4">
            <div class="flex-1 min-w-[250px]">
                <x-form.label for="name">Nome</x-form.label>
                <x-form.input
                    class="w-full p-2 mt-1 mb-3 border border-pawx-grey rounded-md  placeholder-pawx-brown/70 focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70"
                    name="name"
                    required
                    placeholder="Insira o Nome" />
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
            </div>

            <div class="flex-1 mb-2">
                <x-form.label for="birthdate">Data de Nascimento OU Idade</x-form.label>
                <div class="flex items-center gap-2">
                    <input
                        type="date"
                        name="birthdate"
                        id="birthdate"
                        class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70"
                        required
                    />
                    <input
                        type="number"
                        id="age_years"
                        name="age_years"
                        class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70"
                    />
                </div>
            </div>
        </div>

        <script>
            document.getElementById('age_years').addEventListener('input', function () {
                const years = parseInt(this.value, 10);
                const birthdateInput = document.getElementById('birthdate');

                if (!isNaN(years) && years > 0) {
                    const today = new Date();
                    const birthdate = new Date(today.setFullYear(today.getFullYear() - years));
                    const formattedDate = birthdate.toISOString().split('T')[0];
                    birthdateInput.value = formattedDate;
                } else {
                    birthdateInput.value = '';
                }
            });

            document.getElementById('birthdate').addEventListener('input', function () {
                const birthdateValue = this.value;
                const ageInput = document.getElementById('age_years');

                if (birthdateValue) {
                    const birthdate = new Date(birthdateValue);
                    const today = new Date();
                    let age = today.getFullYear() - birthdate.getFullYear();
                    const isBeforeBirthday =
                        today.getMonth() < birthdate.getMonth() ||
                        (today.getMonth() === birthdate.getMonth() && today.getDate() < birthdate.getDate());

                    if (isBeforeBirthday) {
                        age--;
                    }

                    ageInput.value = age > 0 ? age : '';
                } else {
                    ageInput.value = '';
                }
            });
        </script>


        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-form.label for="medical_history">Histórico Médico</x-form.label>
                <x-form.textarea
                    name="medical_history"
                    placeholder="Insira o histórico médico (opcional)"
                    rows="2"
                    :value="old('medical_history')"
                />
            </div>
            <div>
                <x-form.label for="medical_history">Observações</x-form.label>
                <x-form.textarea id="obs" name="obs"
                     name="obs"
                     placeholder="Insira observações (opcional)"
                     rows="2"
                     :value="old('obs')"
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
                            required/>
                        <span class="text-pawx-brown/70">Sim</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="spay_neuter_status"
                            value="0"
                            class="form-radio focus:ring-pawx-orange"
                            required/>
                        <span class="text-pawx-brown/70">Não</span>
                    </label>
                </div>
            </div>

            <div class="flex-1">
                <x-form.label for="photos">Fotos</x-form.label>
                <input type="file" id="photos" name="photos[]"
                       class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange bg-white text-pawx-brown/70"
                       multiple>
                <x-form.validation-error name="photos" />
            </div>
            <x-form.validation-error name="spay_neuter_status"/>
        </div>

        <input type="hidden" id="status" name="status" value="active" />

        <div>
            <x-form.button class="px-8 py-2 bg-pawx-orange text-white rounded-lg">
                Adicionar
            </x-form.button>
        </div>
    </form>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allBreeds = [...document.querySelectorAll('#breed_id option[data-species-id]')];

        const speciesSelect = document.getElementById('species_id');
        const breedSelect = document.getElementById('breed_id');
        const furTypeSelect = document.getElementById('fur_type');

        function updateBreeds(speciesId = null, furType = null) {
            const previousSelectedBreed = breedSelect.value;

            breedSelect.innerHTML = '<option value="">Selecione a Raça</option>';

            let matchingBreeds = allBreeds.filter(breed => {
                const matchesSpecies = !speciesId || breed.getAttribute('data-species-id') === speciesId;
                const matchesFurType = !furType || breed.getAttribute('data-fur-type') === furType;
                return matchesSpecies && matchesFurType;
            });

            matchingBreeds.forEach(breed => {
                const newOption = document.createElement('option');
                newOption.value = breed.value;
                newOption.textContent = breed.textContent;
                newOption.setAttribute('data-species-id', breed.getAttribute('data-species-id'));
                newOption.setAttribute('data-fur-type', breed.getAttribute('data-fur-type'));
                breedSelect.appendChild(newOption);
            });

            if (matchingBreeds.length === 1) {
                breedSelect.value = matchingBreeds[0].value;
                syncFurTypeWithBreed(breedSelect.options[breedSelect.selectedIndex]);
            } else {
                breedSelect.value = matchingBreeds.some(breed => breed.value === previousSelectedBreed)
                    ? previousSelectedBreed
                    : '';
            }
        }

        function syncFurTypeWithBreed(selectedOption) {
            if (selectedOption && selectedOption.getAttribute('data-fur-type')) {
                furTypeSelect.value = selectedOption.getAttribute('data-fur-type');
            }
        }

        function initializeFurTypes() {
            const allFurTypes = new Set();
            allBreeds.forEach(breed => {
                allFurTypes.add(breed.getAttribute('data-fur-type'));
            });

            furTypeSelect.innerHTML = '<option value="">Selecione a Pelagem</option>';

            allFurTypes.forEach(furType => {
                const newOption = document.createElement('option');
                newOption.value = furType;
                newOption.textContent = furType;
                furTypeSelect.appendChild(newOption);
            });
        }

        function resetFieldsOnSpeciesChange(speciesId) {
            updateBreeds(speciesId, furTypeSelect.value);
        }

        speciesSelect.addEventListener('change', function () {
            const speciesId = this.value;
            resetFieldsOnSpeciesChange(speciesId);
        });

        breedSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption) {
                syncFurTypeWithBreed(selectedOption);
            }
        });

        furTypeSelect.addEventListener('change', function () {
            const furType = this.value;
            updateBreeds(speciesSelect.value, furType);
        });

        initializeFurTypes();
    });
</script>
