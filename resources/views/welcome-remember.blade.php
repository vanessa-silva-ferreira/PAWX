<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordar - PAWX</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans text-gray-800">

@include('welcome-header')

<section class="py-6 bg-gray-100">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-3xl font-bold text-pawx-orange-600">Recordar</h1>
        <p class="mt-2 text-sm text-gray-600">
            Uma homenagem aos nossos amigos de quatro patas que trouxeram amor e felicidade às nossas vidas.
        </p>
    </div>
</section>

<section class="py-6 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <input type="text" id="searchInput" placeholder="Pesquisar por nome ou ano..."
                   class="flex-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-pawx-orange focus:border-pawx-orange">
        </div>

        <div id="cardContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"></div>

        <div id="pagination" class="mt-6 flex justify-center gap-2">
            <button style="background-color: #FF7F50; color: white;" class="py-2 px-4 rounded-lg shadow-md hover:bg-orange-700">1</button>
            <button style="background-color: #FF7F50; color: white;" class="py-2 px-4 rounded-lg shadow-md hover:bg-orange-700">2</button>
        </div>
    </div>
</section>


@include('welcome-footer')

</body>
</html>
