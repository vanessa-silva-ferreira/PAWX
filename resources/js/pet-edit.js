document.addEventListener('DOMContentLoaded', function () {
    const allBreeds = [...document.querySelectorAll('#breed_id option[data-species-id]')];

    const speciesSelect = document.getElementById('species_id');
    const breedSelect = document.getElementById('breed_id');
    const furTypeSelect = document.getElementById('fur_type');

    const initialSpeciesId = speciesSelect.value;
    const initialBreedId = breedSelect.value;
    const initialFurType = furTypeSelect.value;

    function updateBreeds(speciesId = null, furType = null) {
        breedSelect.innerHTML = '<option value="" disabled hidden>Selecione uma opção</option>';

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

        if (breedSelect.querySelector(`option[value="${initialBreedId}"]`)) {
            breedSelect.value = initialBreedId;
        } else {
            breedSelect.selectedIndex = 0;
        }
    }

    function updateFurTypes(speciesId = null) {
        furTypeSelect.innerHTML = '<option value="" disabled hidden>Selecione uma opção</option>';

        const matchingFurTypes = new Set();
        allBreeds.forEach(breed => {
            if (!speciesId || breed.getAttribute('data-species-id') === speciesId) {
                matchingFurTypes.add(breed.getAttribute('data-fur-type'));
            }
        });

        matchingFurTypes.forEach(furType => {
            if (furType) {
                const newOption = document.createElement('option');
                newOption.value = furType;
                newOption.textContent = furType.charAt(0).toUpperCase() + furType.slice(1);
                furTypeSelect.appendChild(newOption);
            }
        });

        if (furTypeSelect.querySelector(`option[value="${initialFurType}"]`)) {
            furTypeSelect.value = initialFurType;
        } else {
            furTypeSelect.selectedIndex = 0;
        }
    }

    function syncBreedData() {
        const selectedBreed = breedSelect.options[breedSelect.selectedIndex];
        if (selectedBreed) {
            const speciesId = selectedBreed.getAttribute('data-species-id');
            const furType = selectedBreed.getAttribute('data-fur-type');

            if (speciesId) {
                speciesSelect.value = speciesId;
                updateFurTypes(speciesId);
            }

            if (furType) {
                furTypeSelect.value = furType;
            }
        }
    }

    function handleSpeciesChange() {
        const speciesId = speciesSelect.value;
        updateFurTypes(speciesId);
        updateBreeds(speciesId);
    }

    function handleFurTypeChange() {
        const furType = furTypeSelect.value;
        updateBreeds(speciesSelect.value, furType);
    }

    function handleBreedChange() {
        syncBreedData();
    }

    // Event Listeners
    speciesSelect.addEventListener('change', handleSpeciesChange);
    furTypeSelect.addEventListener('change', handleFurTypeChange);
    breedSelect.addEventListener('change', handleBreedChange);

    // Initial Setup
    if (initialSpeciesId) {
        updateFurTypes(initialSpeciesId);
        updateBreeds(initialSpeciesId, initialFurType);

        if (initialFurType) furTypeSelect.value = initialFurType;
        if (initialBreedId) breedSelect.value = initialBreedId;
    }
});
