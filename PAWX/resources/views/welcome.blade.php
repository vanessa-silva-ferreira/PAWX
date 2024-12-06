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

<section class="bg-gray-100 p-6 relative -mb-4">
    <!-- Botões de navegação -->
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
            <p class="text-gray-700 mt-3 text-sm">O Meu gato adorou o banho! Muito obrigado por cuidarem tão bem dele.</p>
        </div>

        <!-- Card 7 -->
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

        <!-- Card 8 -->
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

<footer class="bg-gray-100 text-center py-4 text-gray-700">
    <div class="container mx-auto space-y-2">
        <h3 class="font-semibold text-lg">Contatos</h3>
        <div class="flex justify-center flex-wrap mt-2 gap-4">
            <!-- Website -->
            <a href="#" class="bg-white py-2 px-4 rounded shadow hover:bg-gray-200 text-sm flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
                <span>PAWX</span>
            </a>
            <!-- Facebook -->
            <a href="#" class="bg-white py-2 px-4 rounded shadow hover:bg-gray-200 text-sm flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9.197 21V12H6V8h3.197V6.326C9.197 3.791 10.673 2 13.548 2H17v4h-2.721C12.774 6 13 7.123 13 8.5V8h4l-.476 4H13v9h-3.803z" />
                </svg>
                <span>pawxpetcare</span>
            </a>
            <!-- Instagram -->
            <a href="#" class="bg-white py-2 px-4 rounded shadow hover:bg-gray-200 text-sm flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7.5 2h9a5.5 5.5 0 015.5 5.5v9a5.5 5.5 0 01-5.5 5.5h-9A5.5 5.5 0 012 16.5v-9A5.5 5.5 0 017.5 2zm0 2A3.5 3.5 0 004 7.5v9a3.5 3.5 0 003.5 3.5h9a3.5 3.5 0 003.5-3.5v-9A3.5 3.5 0 0016.5 4h-9zm7 2a2 2 0 11-.001 4.001A2 2 0 0114.5 6zm1.5 10.5v.5H8V16h-.5v-4H8v.5h8v-.5h.5v4h-.5z" />
                </svg>
                <span>pawx_petcare</span>
            </a>
            <!-- Gmail -->
            <a href="mailto:pawx@gmail.com" class="bg-white py-2 px-4 rounded shadow hover:bg-gray-200 text-sm flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 13.217l10-5.555V18a2 2 0 01-2 2H4a2 2 0 01-2-2V7.662l10 5.555zm10-7.928l-9.548 5.3a1 1 0 01-.905 0L2 5.29V5a2 2 0 012-2h16a2 2 0 012 2v.29z" />
                </svg>
                <span>pawx@gmail.com</span>
            </a>
            <!-- Telefone -->
            <a href="tel:+351915424674" class="bg-white py-2 px-4 rounded shadow hover:bg-gray-200 text-sm flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 5c0-1.074.926-2 2-2h4.042c.934 0 1.739.657 1.963 1.582l.519 2.08c.112.448.012.925-.269 1.281L9.12 10.3a14.935 14.935 0 005.578 5.58l2.36-2.134a1.492 1.492 0 011.281-.269l2.08.52A2.008 2.008 0 0121 17v4c0 1.074-.926 2-2 2-10.493 0-19-8.507-19-19z" />
                </svg>
                <span>+351 915424674</span>
            </a>
        </div>
        <div class="text-xs text-gray-500 mt-4">
            © 2024 PAWX. Todos os direitos reservados.
        </div>
        <br>
    </div>
</footer>

</body>
</html>
