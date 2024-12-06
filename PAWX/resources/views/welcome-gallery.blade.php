<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX - Galeria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans text-gray-800">

@include('welcome-header')

<section class="p-6 lg:p-12 bg-gray-50">
    <div class="text-center mb-8">
        <h2 class="text-2xl lg:text-4xl font-extrabold text-gray-700">Galeria de Trabalhos</h2>
        <p class="text-gray-500 mt-2 text-sm lg:text-lg">
            Explore os momentos que marcam o nosso trabalho e qualidade de serviços.
        </p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="relative group">
            <img src="https://placedog.net/400/300?random=1" alt="Trabalho 1" class="w-full h-64 object-cover rounded-lg shadow-md">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                <p class="text-white font-bold text-lg">Banho e Corte Completo</p>
            </div>
        </div>
        <div class="relative group">
            <img src="https://placedog.net/400/300?random=2" alt="Trabalho 2" class="w-full h-64 object-cover rounded-lg shadow-md">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                <p class="text-white font-bold text-lg">Higiene e Relaxamento</p>
            </div>
        </div>
        <div class="relative group">
            <img src="https://placedog.net/400/300?random=3" alt="Trabalho 3" class="w-full h-64 object-cover rounded-lg shadow-md">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                <p class="text-white font-bold text-lg">Estilo e Charme</p>
            </div>
        </div>
        <div class="relative group">
            <img src="https://placedog.net/400/300?random=4" alt="Trabalho 4" class="w-full h-64 object-cover rounded-lg shadow-md">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                <p class="text-white font-bold text-lg">Banho Terapêutico</p>
            </div>
        </div>
        <div class="relative group">
            <img src="https://placedog.net/400/300?random=5" alt="Trabalho 5" class="w-full h-64 object-cover rounded-lg shadow-md">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                <p class="text-white font-bold text-lg">Corte Artístico</p>
            </div>
        </div>
        <div class="relative group">
            <img src="https://placedog.net/400/300?random=6" alt="Trabalho 6" class="w-full h-64 object-cover rounded-lg shadow-md">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                <p class="text-white font-bold text-lg">Transformação Total</p>
            </div>
        </div>
    </div>
</section>

@include('welcome-footer')

</body>
</html>
