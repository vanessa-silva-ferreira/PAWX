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
        <a href="#" class="hover:text-gray-500">Contacto</a>
        <a href="#" class="hover:text-gray-500">Remember</a>
    </nav>
    <div class="flex items-center space-x-4">
        <a href="/auth" class="hover:text-gray-500">Autenticação</a>
    </div>
</header>

<div class="carousel-wrapper">
    <div class="carousel-container">
        <div class="carousel-images"></div>
    </div>
</div>

<section class="feedback-section bg-gray-700 p-4 lg:p-8 text-white">
    <h2 class="text-2xl lg:text-3xl font-bold text-center">Avaliações</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6 mt-6">
        <div class="feedback-card">
            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Cliente 1" class="rounded-full mx-auto">
            <h3>Bobby</h3>
            <p>Rápidos, atenciosos e excelentes no que fazem.</p>
            <span>4.5/5 ⭐</span>
        </div>
        <div class="feedback-card">
            <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Cliente 2" class="rounded-full mx-auto">
            <h3>Cosmo</h3>
            <p>Serviço impecável, melhor que nunca!</p>
            <span>5/5 ⭐</span>
        </div>
        <div class="feedback-card">
            <img src="https://randomuser.me/api/portraits/women/3.jpg" alt="Cliente 3" class="rounded-full mx-auto">
            <h3>Terra</h3>
            <p>A PAWX foi incrível com a Terra, ela adorou o banho.</p>
            <span>4.8/5 ⭐</span>
        </div>
        <div class="feedback-card">
            <img src="https://randomuser.me/api/portraits/men/4.jpg" alt="Cliente 4" class="rounded-full mx-auto">
            <h3>Finn</h3>
            <p>Equipa muito simpática e profissional!</p>
            <span>4.7/5 ⭐</span>
        </div>
        <div class="feedback-card">
            <img src="https://randomuser.me/api/portraits/women/5.jpg" alt="Cliente 5" class="rounded-full mx-auto">
            <h3>Luna</h3>
            <p>Ótima experiência para mim e para o meu animal!</p>
            <span>5/5 ⭐</span>
        </div>
    </div>
</section>

<footer class="home-footer bg-gray-100 text-center text-gray-700">
    <h3 class="font-semibold">Contacto</h3>
    <p>Estamos disponíveis nas redes sociais, por telefone ou email.</p>
    <div class="social-links flex justify-center flex-wrap mt-2">
        <a href="#" class="social-link">PAWX</a>
        <a href="#" class="social-link">pawxpetcare</a>
        <a href="#" class="social-link">pawx_petcare</a>
        <a href="mailto:pawx@gmail.com" class="social-link">pawx@gmail.com</a>
        <a href="tel:+351915424674" class="social-link">+351 915424674</a>
    </div>
</footer>

</body>
</html>
