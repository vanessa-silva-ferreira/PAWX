<header class="bg-white text-gray-800 p-4 lg:p-6 flex flex-row justify-between items-center shadow-md">
    <div class="text-lg font-bold">PAWX</div>
    <nav class="flex flex-wrap justify-center space-x-4 lg:space-x-6 text-sm lg:text-lg font-semibold">
        <a href="{{ route('welcome') }}" class="hover:text-gray-500">Início</a>
        <a href="{{ route('welcome-services') }}" class="hover:text-gray-500">Serviços</a>
        <a href="{{ route('welcome-gallery') }}" class="hover:text-gray-500">Galeria</a>
        <a href="{{ route('welcome-feedback') }}" class="hover:text-gray-500">Feedback</a>
        <a href="{{ route('welcome-about') }}" class="hover:text-gray-500">Sobre Nós</a>
        <a href="{{ route('welcome-contact') }}" class="hover:text-gray-500">Contato</a>
        <a href="{{ route('welcome-remember') }}" class="hover:text-gray-500">Remember</a>
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
