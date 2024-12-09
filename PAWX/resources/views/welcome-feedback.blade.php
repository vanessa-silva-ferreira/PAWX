<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX - Feedback dos Clientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 font-sans text-gray-100">

@include('welcome-header')

<section class="p-8 lg:p-16 bg-gradient-to-b from-gray-800 to-gray-900">
    <div class="text-center mb-12">
        <h2 class="text-3xl lg:text-5xl font-extrabold text-gray-100">Feedback dos Clientes</h2>
        <p class="text-gray-400 mt-4 text-lg lg:text-xl">
            O que nossos clientes têm a dizer sobre os nossos serviços.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <div class="bg-gray-800 rounded-lg p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <div class="flex items-center space-x-4 mb-4">
                <img src="https://placedog.net/80/80?random=1" alt="Cliente" class="w-16 h-16 object-cover rounded-full">
                <div>
                    <h4 class="text-lg font-semibold text-gray-100">Joana Oliveira</h4>
                    <p class="text-gray-400 text-sm">Cliente há 2 anos</p>
                </div>
            </div>
            <p class="text-gray-300">
                "Serviço impecável! O meu cão sai sempre feliz e cheiroso. Recomendo para todos os donos de animais."
            </p>
        </div>


        <div class="bg-gray-800 rounded-lg p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <div class="flex items-center space-x-4 mb-4">
                <img src="https://placedog.net/80/80?random=2" alt="Cliente" class="w-16 h-16 object-cover rounded-full">
                <div>
                    <h4 class="text-lg font-semibold text-gray-100">Ricardo Pereira</h4>
                    <p class="text-gray-400 text-sm">Cliente há 1 ano</p>
                </div>
            </div>
            <p class="text-gray-300">
                "Adoro como cuidam do meu gato. Ele sente-se seguro e sempre volta para casa tranquilo."
            </p>
        </div>


        <div class="bg-gray-800 rounded-lg p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <div class="flex items-center space-x-4 mb-4">
                <img src="https://placedog.net/80/80?random=3" alt="Cliente" class="w-16 h-16 object-cover rounded-full">
                <div>
                    <h4 class="text-lg font-semibold text-gray-100">Carla Mendes</h4>
                    <p class="text-gray-400 text-sm">Cliente há 3 meses</p>
                </div>
            </div>
            <p class="text-gray-300">
                "A minha cadelinha adora os serviços de banho e tosquia. Sempre saímos satisfeitas!"
            </p>
        </div>


        <div class="bg-gray-800 rounded-lg p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <div class="flex items-center space-x-4 mb-4">
                <img src="https://placedog.net/80/80?random=4" alt="Cliente" class="w-16 h-16 object-cover rounded-full">
                <div>
                    <h4 class="text-lg font-semibold text-gray-100">Pedro Santos</h4>
                    <p class="text-gray-400 text-sm">Cliente há 6 meses</p>
                </div>
            </div>
            <p class="text-gray-300">
                "Equipa profissional e atenciosa. Sempre cuidam muito bem do meu cão."
            </p>
        </div>


        <div class="bg-gray-800 rounded-lg p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <div class="flex items-center space-x-4 mb-4">
                <img src="https://placedog.net/80/80?random=5" alt="Cliente" class="w-16 h-16 object-cover rounded-full">
                <div>
                    <h4 class="text-lg font-semibold text-gray-100">Ana Costa</h4>
                    <p class="text-gray-400 text-sm">Cliente há 1 ano</p>
                </div>
            </div>
            <p class="text-gray-300">
                "Simplesmente os melhores! Nunca vi a minha gata tão bem cuidada e feliz."
            </p>
        </div>


        <div class="bg-gray-800 rounded-lg p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
            <div class="flex items-center space-x-4 mb-4">
                <img src="https://placedog.net/80/80?random=6" alt="Cliente" class="w-16 h-16 object-cover rounded-full">
                <div>
                    <h4 class="text-lg font-semibold text-gray-100">Miguel Rocha</h4>
                    <p class="text-gray-400 text-sm">Cliente há 2 anos</p>
                </div>
            </div>
            <p class="text-gray-300">
                "Adorei o corte artístico que fizeram no meu cão. Recomendo!"
            </p>
        </div>
    </div>
</section>

@include('welcome-footer')

</body>
</html>
