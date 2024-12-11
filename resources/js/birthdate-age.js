document.addEventListener('DOMContentLoaded', function () {
    const ageInput = document.getElementById('age_years');
    const birthdateInput = document.getElementById('birthdate');

    ageInput.addEventListener('input', function () {
        const years = parseInt(this.value, 10);
        if (!isNaN(years) && years > 0) {
            const today = new Date();
            const birthdate = new Date(today.setFullYear(today.getFullYear() - years));
            const formattedDate = birthdate.toISOString().split('T')[0];
            birthdateInput.value = formattedDate;
        } else {
            birthdateInput.value = '';
        }
    });

    birthdateInput.addEventListener('input', function () {
        const birthdateValue = this.value;
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

    if (birthdateInput.value) {
        const birthdate = new Date(birthdateInput.value);
        const today = new Date();
        let age = today.getFullYear() - birthdate.getFullYear();
        const isBeforeBirthday =
            today.getMonth() < birthdate.getMonth() ||
            (today.getMonth() === birthdate.getMonth() && today.getDate() < birthdate.getDate());

        if (isBeforeBirthday) {
            age--;
        }

        ageInput.value = age > 0 ? age : '';
    } else if (ageInput.value) {
        const years = parseInt(ageInput.value, 10);
        if (!isNaN(years) && years > 0) {
            const today = new Date();
            const birthdate = new Date(today.setFullYear(today.getFullYear() - years));
            const formattedDate = birthdate.toISOString().split('T')[0];
            birthdateInput.value = formattedDate;
        }
    }
});
