document.addEventListener('DOMContentLoaded', function () {
    const allBreeds = [...document.querySelectorAll('#breed_id option[data-species-id]')];

    const speciesSelect = document.getElementById('species_id');
    const breedSelect = document.getElementById('breed_id');
    const furTypeSelect = document.getElementById('fur_type');

    const initialSpeciesId = speciesSelect.value;
    const initialBreedId = breedSelect.value;
    const initialFurType = furTypeSelect.value;

    function updateBreeds(speciesId = null, furType = null) {
        const previousSelectedBreed = breedSelect.value;

        breedSelect.innerHTML = '<option value="">Selecione a Raça</option>';

        const matchingBreeds = allBreeds.filter(breed => {
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

        if (matchingBreeds.some(breed => breed.value === previousSelectedBreed)) {
            breedSelect.value = previousSelectedBreed;
        } else {
            breedSelect.value = '';
        }
    }

    function syncFurTypeWithBreed(selectedOption) {
        if (selectedOption && selectedOption.getAttribute('data-fur-type')) {
            furTypeSelect.value = selectedOption.getAttribute('data-fur-type');
        } else {
            furTypeSelect.value = '';
        }
    }

    function initializeFurTypes() {
        // Add the placeholder first
        furTypeSelect.innerHTML = '<option value="">Selecione a Pelagem</option>';

        const allFurTypes = new Set();
        allBreeds.forEach(breed => {
            allFurTypes.add(breed.getAttribute('data-fur-type'));
        });

        allFurTypes.forEach(furType => {
            const newOption = document.createElement('option');
            newOption.value = furType;
            newOption.textContent = furType;
            furTypeSelect.appendChild(newOption);
        });

        if (initialFurType) {
            furTypeSelect.value = initialFurType;
        }

        if (!furTypeSelect.value) {
            furTypeSelect.value = '';
        }
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
    updateBreeds(initialSpeciesId, initialFurType);
});
