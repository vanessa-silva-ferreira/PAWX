<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="from-sky-500 to-indigo-500 bg-gradient-to-br">
<div class="sm:mx-auto sm:w-full sm:max-w-md">
    <h2 class="mt-6 text-center text-3xl font-extrabold text-indigo-950">
        Make an Appointment
    </h2>
</div>

<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-indigo-950 py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form class="space-y-6" action="{{ route('employee.appointments.store') }}" method="POST">
            @csrf
            <div>
                <label for="pet" class="block text-sm font-medium text-gray-700">
                    Selecione o animal
                </label>
                <div class="mt-1">
                    <select id="pet" name="pet_id" required class="appearance-none block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" disabled selected>Select a pet</option>
                        <!--pets associados ao cliente-->
                    </select>
                </div>
            </div>
            <div>
                <label for="service" class="block text-sm font-medium text-gray-700">
                    Selecione o serviço
                </label>
                <div class="mt-1">
                    <select id="service" name="service" required class="appearance-none block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" disabled selected>Selecione uma opção</option>
                        <option value="banho">Banho</option>
                        <option value="shear">Tosquia</option>
                        <option value="both">Ambos</option>
                    </select>
                </div>
            </div>
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">
                    Select Date
                </label>
                <div class="mt-1">
                    <input id="date" name="date" type="date" required class="appearance-none block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
            <div>
                <label for="time" class="block text-sm font-medium text-gray-700">
                    Selecione a hora
                </label>
                <div class="mt-1">
                    <select id="time" name="time" required class="appearance-none block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" disabled selected>Selecione uma opção</option>
                    </select>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Book Appointment
                </button>
            </div>
        </form>
    </div>
</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const serviceSelect = document.getElementById('service');
        const timeSelect = document.getElementById('time');

        serviceSelect.addEventListener('change', function () {
            const selectedService = serviceSelect.value;

            // Clear previous options
            timeSelect.innerHTML = '<option value="" disabled selected>Select a time</option>';

            if (selectedService === 'banho' || selectedService === 'shear') {
                for (let hour = 9; hour <= 17; hour++) {
                    timeSelect.innerHTML += `
                        <option value="${hour}:00-${hour}:30">${hour}:00 - ${hour}:30</option>
                        <option value="${hour}:30-${hour + 1}:00">${hour}:30 - ${hour + 1}:00</option>
                    `;
                }
            } else if (selectedService === 'both') {
                for (let hour = 9; hour <= 17; hour++) {
                    timeSelect.innerHTML += `
                        <option value="${hour}:00-${hour + 1}:00">${hour}:00 - ${hour + 1}:00</option>
                        <option value="${hour}:30-${hour + 1}:30">${hour}:30 - ${hour + 1}:30</option>
                    `;
                }
            }
        });
    });
</script>
</html>
