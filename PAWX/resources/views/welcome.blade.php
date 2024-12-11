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

<section class="bg-gray-100 p-6 relative -mb-4">
    <div class="carousel-wrapper">
        <div class="carousel-container">
            <div class="carousel-images"></div>
        </div>
    </div>
</section>

<section class="bg-gray-100 py-6">
    <div class="grid grid-cols-1 md:grid-cols-6 gap-4 w-full mx-auto px-0">
        <div class="bg-white shadow-md rounded-lg p-4 relative flex flex-col items-start">
            <span class="absolute top-2 right-2 text-blue-500 text-sm font-semibold">10/10</span>
            <div class="flex items-center mb-3">
                <img class="w-10 h-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/women/1.jpg" alt="Sabrina">
                <div>
                    <h4 class="text-sm font-bold">Sabrina Alves</h4>
                    <p class="text-xs text-gray-500">9 de dezembro de 2024</p>
                </div>
            </div>
            <p class="text-sm text-gray-700">A minha gata ficou impecável após o banho e a tosquia. Atendimento fantástico!</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 relative flex flex-col items-start">
            <span class="absolute top-2 right-2 text-blue-500 text-sm font-semibold">9/10</span>
            <div class="flex items-center mb-3">
                <img class="w-10 h-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/women/2.jpg" alt="Carla">
                <div>
                    <h4 class="text-sm font-bold">Carla Carrazeda</h4>
                    <p class="text-xs text-gray-500">7 de dezembro de 2024</p>
                </div>
            </div>
            <p class="text-sm text-gray-700">A tosquia da minha cadela foi perfeita. Recomendo a todos!</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 relative flex flex-col items-start">
            <span class="absolute top-2 right-2 text-blue-500 text-sm font-semibold">9.2/10</span>
            <div class="flex items-center mb-3">
                <img class="w-10 h-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/men/2.jpg" alt="Lucas">
                <div>
                    <h4 class="text-sm font-bold">Lucas Damasco</h4>
                    <p class="text-xs text-gray-500">6 de dezembro de 2024</p>
                </div>
            </div>
            <p class="text-sm text-gray-700">O banho deixou o meu gato super cheiroso e relaxado. Adorei o atendimento!</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 relative flex flex-col items-start">
            <span class="absolute top-2 right-2 text-blue-500 text-sm font-semibold">8.8/10</span>
            <div class="flex items-center mb-3">
                <img class="w-10 h-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/women/3.jpg" alt="Maria">
                <div>
                    <h4 class="text-sm font-bold">Maria Santos</h4>
                    <p class="text-xs text-gray-500">5 de dezembro de 2024</p>
                </div>
            </div>
            <p class="text-sm text-gray-700">O meu cão adorou o banho. Atendimento impecável e muito profissional.</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 relative flex flex-col items-start">
            <span class="absolute top-2 right-2 text-blue-500 text-sm font-semibold">9.7/10</span>
            <div class="flex items-center mb-3">
                <img class="w-10 h-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/men/3.jpg" alt="Rui">
                <div>
                    <h4 class="text-sm font-bold">Rui Torres</h4>
                    <p class="text-xs text-gray-500">4 de dezembro de 2024</p>
                </div>
            </div>
            <p class="text-sm text-gray-700">Recomendo os serviços de tosquia e banho! O meu gato ficou perfeito.</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 flex items-center justify-center">
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-500">9.53</div>
                <p class="text-sm font-semibold text-gray-700">Excelente experiência</p>
                <p class="text-xs text-gray-500">123 avaliações</p>
            </div>
        </div>
    </div>
</section>



@include('welcome-footer')

</body>
</html>
