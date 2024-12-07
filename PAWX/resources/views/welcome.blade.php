<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX - Cuidados para Animais</title>
    @vite(['resources/css/app.css', 'resources/css/home-footer.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-gray-800">

@include('welcome-header')

<div class="carousel-wrapper">
    <div class="carousel-container">
        <div class="carousel-images"></div>
    </div>
</div>

<section class="bg-gray-100 p-6 relative -mb-4">

    <button id="prevFeedback" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-300 text-white w-8 h-8 rounded-full flex items-center justify-center z-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button id="nextFeedback" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-300 text-white w-8 h-8 rounded-full flex items-center justify-center z-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>


    <div id="feedbackCarousel" class="flex gap-6 overflow-hidden scroll-smooth">
        <!-- Card 1 -->
        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Pedro A." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">Pedro A.</h4>
                    <span class="text-sm text-gray-500">404 avaliações &middot; 1 de dezembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">9/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">Excelente atendimento ao meu gato! Serviço simpático e cuidadoso. Recomendo muito.</p>
        </div>


        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Ana B." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">Ana B.</h4>
                    <span class="text-sm text-gray-500">34 avaliações &middot; 27 de novembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">9.5/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">O meu cão adorou o corte e ficou muito mais calmo. Ambiente limpo e organizado.</p>
        </div>


        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="João C." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">João C.</h4>
                    <span class="text-sm text-gray-500">15 avaliações &middot; 25 de novembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">8.5/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">Ótimo corte e tratamento para o meu cão. Preço justo e ótimo atendimento.</p>
        </div>


        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/women/4.jpg" alt="Sara D." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">Sara D.</h4>
                    <span class="text-sm text-gray-500">22 avaliações &middot; 20 de novembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">10/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">Nota 10 para o atendimento e serviços. Minha gata foi muito bem tratada.</p>
        </div>


        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/men/5.jpg" alt="Miguel P." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">Miguel P.</h4>
                    <span class="text-sm text-gray-500">18 avaliações &middot; 18 de novembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">9/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">Sempre bem atendido, recomendo! Excelente para banho e corte de unhas.</p>
        </div>


        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/women/6.jpg" alt="Joana F." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">Joana F.</h4>
                    <span class="text-sm text-gray-500">10 avaliações &middot; 15 de novembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">8/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">O Meu gato adorou o banho! Muito obrigado por cuidarem tão bem dele.</p>
        </div>


        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/men/7.jpg" alt="Manuel R." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">Manuel R.</h4>
                    <span class="text-sm text-gray-500">25 avaliações &middot; 10 de novembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">9.5/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">
                Serviço impecável. O meu cão foi tratado com muito carinho e ficou super feliz. Recomendo a todos.
            </p>
        </div>


        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/women/7.jpg" alt="Sofia T." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">Sofia T.</h4>
                    <span class="text-sm text-gray-500">18 avaliações &middot; 5 de dezembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">10/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">
                Fiquei muito satisfeita com o corte de unhas do meu gato. O ambiente era tranquilo e ele sentiu-se confortável.
            </p>
        </div>


    </div>
</section>

@include('welcome-footer')

</body>
</html>
