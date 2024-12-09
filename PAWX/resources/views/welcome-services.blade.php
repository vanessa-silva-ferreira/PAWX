<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX - Cuidados para Animais</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-gray-800">

@include('welcome-header')

<section class="p-4 lg:p-8 bg-white">
    <h2 class="text-2xl lg:text-4xl font-extrabold text-center text-gray-700">SERVIÇOS</h2>
    <p class="text-center text-gray-500 mt-2 text-sm lg:text-lg">Porque as necessidades dos seus animais são importantes</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-8 mt-6">

        <div class="bg-gray-100 rounded-lg p-8 lg:p-12 shadow-lg hover:shadow-xl flex flex-col items-center text-center border border-gray-300">
            <img src="https://placedog.net/400/400?random" alt="Banho para Animais" class="w-full h-64 object-cover rounded-md mb-6">
            <h3 class="text-xl lg:text-3xl font-bold text-gray-700 mt-4">Banho</h3>
            <p class="text-gray-550 mt-4 text-sm lg:text-lg">
                Oferecemos aos seus animais a melhor experiência de banho, mantendo-os limpos e felizes.
            </p>
            <div class="flex space-x-4 lg:space-x-8 mt-6">
                <button class="bg-gray-700 text-white px-4 lg:px-6 py-3 rounded hover:bg-gray-600">Preços</button>
                <button class="bg-gray-700 text-white px-4 lg:px-6 py-3 rounded hover:bg-gray-600">Agendar</button>
            </div>
        </div>

        <div class="bg-gray-100 rounded-lg p-8 lg:p-12 shadow-lg hover:shadow-xl flex flex-col items-center text-center border border-gray-300">
            <img src="https://placedog.net/300/300?random" alt="Tosquia para Animais" class="w-full h-64 object-cover rounded-md mb-6">
            <h3 class="text-xl lg:text-3xl font-bold text-gray-700 mt-4">Tosquia</h3>
            <p class="text-gray-600 mt-4 text-sm lg:text-lg">
                Pêlo limpo e macio para os seus animais. Os nossos profissionais mantêm-nos bem aparados e com boa aparência.
            </p>
            <div class="flex space-x-4 lg:space-x-8 mt-6">
                <button class="bg-gray-700 text-white px-4 lg:px-6 py-3 rounded hover:bg-gray-600">Preços</button>
                <button class="bg-gray-700 text-white px-4 lg:px-6 py-3 rounded hover:bg-gray-600">Agendar</button>
            </div>
        </div>
    </div>
</section>

@include('welcome-footer')

</body>
</html>
