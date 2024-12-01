document.addEventListener('DOMContentLoaded', function () {
    const allBreeds = [...document.querySelectorAll('#breed_id option[data-species-id]')];

    const speciesSelect = document.getElementById('species_id');
    const breedSelect = document.getElementById('breed_id');
    const furTypeSelect = document.getElementById('fur_type');

    const initialSpeciesId = speciesSelect.value;
    const initialFurType = furTypeSelect.value;

    function updateBreeds(speciesId = null, furType = null) {
        breedSelect.innerHTML = '<option value="" disabled hidden> </option>';

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

        breedSelect.value = '';
    }

    function updateFurTypes(speciesId = null) {
        furTypeSelect.innerHTML = '<option value="" disabled hidden> </option>';

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
                newOption.textContent = furType;
                furTypeSelect.appendChild(newOption);
            }
        });

        furTypeSelect.value = '';
    }

    function syncSpeciesWithBreed(selectedBreed) {
        if (selectedBreed) {
            const speciesId = selectedBreed.getAttribute('data-species-id');
            if (speciesId) {
                speciesSelect.value = speciesId;
                updateFurTypes(speciesId);
            }
        }
    }

    function syncFurTypeWithBreed(selectedBreed) {
        if (selectedBreed && selectedBreed.getAttribute('data-fur-type')) {
            furTypeSelect.value = selectedBreed.getAttribute('data-fur-type');
        } else {
            furTypeSelect.value = '';
        }
    }

    function handleSpeciesChange() {
        const speciesId = speciesSelect.value;
        updateFurTypes(speciesId);
        updateBreeds(speciesId, furTypeSelect.value);
    }

    function handleFurTypeChange() {
        const furType = furTypeSelect.value;
        breedSelect.value = '';
        updateBreeds(speciesSelect.value, furType);
    }

    function handleBreedChange() {
        const selectedBreed = breedSelect.options[breedSelect.selectedIndex];
        syncSpeciesWithBreed(selectedBreed);
        syncFurTypeWithBreed(selectedBreed);
    }

    speciesSelect.addEventListener('change', handleSpeciesChange);
    furTypeSelect.addEventListener('change', handleFurTypeChange);
    breedSelect.addEventListener('change', handleBreedChange);

    updateFurTypes(initialSpeciesId);
    updateBreeds(initialSpeciesId, initialFurType);
});
