<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX - Cuidados para Animais</title>
    @vite(['resources/css/app.css', 'resources/css/home-footer.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-gray-800">

<header class="bg-white text-gray-800 p-4 lg:p-6 flex flex-row justify-between items-center shadow-md">
    <div class="text-lg font-bold">PAWX</div>
    <nav class="flex flex-wrap justify-center space-x-4 lg:space-x-6 text-sm lg:text-lg font-semibold">
        <a href="{{ route('welcome') }}" class="hover:text-gray-500">Início</a>
        <a href="{{ route('services') }}" class="hover:text-gray-500">Serviços</a>
        <a href="#" class="hover:text-gray-500">Galeria</a>
        <a href="#" class="hover:text-gray-500">Feedback</a>
        <a href="#" class="hover:text-gray-500">Sobre Nós</a>
        <a href="#" class="hover:text-gray-500">Contato</a>
        <a href="#" class="hover:text-gray-500">Remember</a>
    </nav>
    <div class="flex items-center space-x-2">
        <a href="/auth" class="flex items-center hover:text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m12 0l-4-4m4 4l-4 4m6-10h2a2 2 0 012 2v12a2 2 0 01-2 2h-2M9 16H5a2 2 0 01-2-2V9a2 2 0 012-2h4" />
            </svg>
            LOGIN
        </a>
    </div>

</header>

<div class="carousel-wrapper">
    <div class="carousel-container">
        <div class="carousel-images"></div>
    </div>
</div>

<section class="bg-gray-100 p-6 relative">
    <!-- Botões de navegação -->
    <button id="prevFeedback" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white w-10 h-10 rounded-full flex items-center justify-center z-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button id="nextFeedback" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white w-10 h-10 rounded-full flex items-center justify-center z-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- Container do carousel -->
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

        <!-- Card 2 -->
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

        <!-- Card 3 -->
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

        <!-- Card 4 -->
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

        <!-- Card 5 -->
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

        <!-- Card 6 -->
        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/women/6.jpg" alt="Joana F." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">Joana F.</h4>
                    <span class="text-sm text-gray-500">10 avaliações &middot; 15 de novembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">8/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">Meu gato adorou o banho! Muito obrigado por cuidarem tão bem dele.</p>
        </div>

        <!-- Card 7 -->
        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/women/6.jpg" alt="Joana F." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">Joana F.</h4>
                    <span class="text-sm text-gray-500">10 avaliações &middot; 15 de novembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">8/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">Meu gato adorou o banho! Muito obrigado por cuidarem tão bem dele.</p>
        </div>

        <!-- Card 8 -->
        <div class="min-w-[250px] bg-white rounded-lg shadow p-4 flex-shrink-0">
            <div class="flex items-center space-x-4">
                <img src="https://randomuser.me/api/portraits/women/6.jpg" alt="Joana F." class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-bold text-gray-800">Joana F.</h4>
                    <span class="text-sm text-gray-500">10 avaliações &middot; 15 de novembro de 2024</span>
                </div>
                <div class="ml-auto text-green-600 font-bold text-lg">8/10</div>
            </div>
            <p class="text-gray-700 mt-3 text-sm">Meu gato adorou o banho! Muito obrigado por cuidarem tão bem dele.</p>
        </div>

    </div>
</section>



<footer class="bg-gray-100 text-center p-2 text-gray-700">
    <h3 class="font-semibold text-sm">Contacto</h3>
    <div class="flex justify-center flex-wrap mt-2 gap-2">
        <a href="#" class="bg-white py-1 px-3 rounded shadow hover:bg-gray-200 text-xs">PAWX</a>
        <a href="#" class="bg-white py-1 px-3 rounded shadow hover:bg-gray-200 text-xs">pawxpetcare</a>
        <a href="#" class="bg-white py-1 px-3 rounded shadow hover:bg-gray-200 text-xs">pawx_petcare</a>
        <a href="mailto:pawx@gmail.com" class="bg-white py-1 px-3 rounded shadow hover:bg-gray-200 text-xs">pawx@gmail.com</a>
        <a href="tel:+351915424674" class="bg-white py-1 px-3 rounded shadow hover:bg-gray-200 text-xs">+351 915424674</a>
    </div>
</footer>

</body>
</html>
