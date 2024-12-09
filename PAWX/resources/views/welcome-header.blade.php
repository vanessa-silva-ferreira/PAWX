<header class="bg-white text-gray-800 p-4 lg:p-6 flex justify-between items-center shadow-md">
    <div class="text-lg font-bold">PAWX</div>

    <nav class="hidden md:flex flex-wrap justify-center space-x-4 lg:space-x-6 text-sm lg:text-lg font-semibold">
        <a href="{{ route('welcome') }}" class="hover:text-gray-500">Início</a>
        <a href="{{ route('welcome-services') }}" class="hover:text-gray-500">Serviços</a>
        <a href="{{ route('welcome-gallery') }}" class="hover:text-gray-500">Galeria</a>
        <a href="{{ route('welcome-feedback') }}" class="hover:text-gray-500">Feedback</a>
        <a href="{{ route('welcome-about') }}" class="hover:text-gray-500">Sobre Nós</a>
        <a href="{{ route('welcome-contact') }}" class="hover:text-gray-500">Contato</a>
        <a href="{{ route('welcome-remember') }}" class="hover:text-gray-500">RememberMe</a>
    </nav>

    <div class="md:hidden flex items-center">
        <button id="mobile-menu-button" class="text-gray-800 focus:outline-none hover:text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <nav id="mobile-menu" class="hidden absolute top-full left-0 w-full bg-white shadow-md flex flex-col space-y-2 p-4">
        <a href="{{ route('welcome') }}" class="block hover:text-gray-500">Início</a>
        <a href="{{ route('welcome-services') }}" class="block hover:text-gray-500">Serviços</a>
        <a href="{{ route('welcome-gallery') }}" class="block hover:text-gray-500">Galeria</a>
        <a href="{{ route('welcome-feedback') }}" class="block hover:text-gray-500">Feedback</a>
        <a href="{{ route('welcome-about') }}" class="block hover:text-gray-500">Sobre Nós</a>
        <a href="{{ route('welcome-contact') }}" class="block hover:text-gray-500">Contato</a>
        <a href="{{ route('welcome-remember') }}" class="block hover:text-gray-500">RememberMe</a>
        <a href="/auth" class="block hover:text-gray-500">LOGIN</a>
    </nav>
</header>
