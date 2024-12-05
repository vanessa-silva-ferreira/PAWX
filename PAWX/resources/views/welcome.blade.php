<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX - Pet Care</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-white font-sans text-gray-800">

<!-- Header -->
<header class="bg-white text-gray-800 p-4 lg:p-6 flex flex-row justify-between items-center shadow-md">
    <div class="text-lg font-bold">PAWX</div>
    <nav class="flex flex-wrap justify-center space-x-4 lg:space-x-6 text-sm lg:text-lg font-semibold">
        <a href="{{ route('welcome') }}" class="hover:text-gray-500">Home</a>
        <a href="{{ route('services') }}" class="hover:text-gray-500">Services</a>
        <a href="#" class="hover:text-gray-500">Gallery</a>
        <a href="#" class="hover:text-gray-500">Feedback</a>
        <a href="#" class="hover:text-gray-500">About Us</a>
        <a href="#" class="hover:text-gray-500">Contact Us</a>
    </nav>
    <div class="flex items-center space-x-4">
        <a href="/auth" class="hover:text-gray-500">Autenticação</a>
    </div>
</header>

<!-- Carousel -->
<div class="carousel-wrapper">
    <div class="carousel-container">
        <div class="carousel-images"></div>
    </div>
</div>

<!-- Feedback Section -->
<section class="bg-gray-700 p-4 lg:p-8 text-white">
    <h2 class="text-2xl lg:text-3xl font-bold text-center">Feedback</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6 mt-6">
        <div class="bg-white text-gray-800 rounded-lg p-3 shadow-md text-center">
            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Client 1" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full mx-auto">
            <h3 class="text-sm font-semibold mt-2">Bobby</h3>
            <p class="text-xs mt-1">Quick, attentive, and excellent at what they do.</p>
            <span class="text-gray-700 font-bold mt-2 text-xs">4.5/5 ⭐</span>
        </div>
        <div class="bg-white text-gray-800 rounded-lg p-3 shadow-md text-center">
            <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Client 2" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full mx-auto">
            <h3 class="text-sm font-semibold mt-2">Cosmo</h3>
            <p class="text-xs mt-1">Impeccable service, better than ever!</p>
            <span class="text-gray-700 font-bold mt-2 text-xs">5/5 ⭐</span>
        </div>
        <div class="bg-white text-gray-800 rounded-lg p-3 shadow-md text-center">
            <img src="https://randomuser.me/api/portraits/women/3.jpg" alt="Client 3" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full mx-auto">
            <h3 class="text-sm font-semibold mt-2">Terra</h3>
            <p class="text-xs mt-1">PAWX was amazing with Terra, she loved the grooming.</p>
            <span class="text-gray-700 font-bold mt-2 text-xs">4.8/5 ⭐</span>
        </div>
        <div class="bg-white text-gray-800 rounded-lg p-3 shadow-md text-center">
            <img src="https://randomuser.me/api/portraits/men/4.jpg" alt="Client 4" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full mx-auto">
            <h3 class="text-sm font-semibold mt-2">Finn</h3>
            <p class="text-xs mt-1">Very friendly and professional staff!</p>
            <span class="text-gray-700 font-bold mt-2 text-xs">4.7/5 ⭐</span>
        </div>
        <div class="bg-white text-gray-800 rounded-lg p-3 shadow-md text-center">
            <img src="https://randomuser.me/api/portraits/women/5.jpg" alt="Client 5" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full mx-auto">
            <h3 class="text-sm font-semibold mt-2">Luna</h3>
            <p class="text-xs mt-1">Great experience for me and my pet!</p>
            <span class="text-gray-700 font-bold mt-2 text-xs">5/5 ⭐</span>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-100 p-4 lg:p-8 text-center text-gray-700">
    <h3 class="text-lg lg:text-xl font-semibold">Keep in Touch</h3>
    <p class="mt-2 text-sm lg:text-base">We are available on social media as well as phone and email.</p>
    <div class="flex justify-center flex-wrap space-x-2 lg:space-x-4 mt-4">
        <a href="#" class="bg-white p-2 lg:p-3 rounded-full shadow hover:bg-gray-200">PAWX</a>
        <a href="#" class="bg-white p-2 lg:p-3 rounded-full shadow hover:bg-gray-200">pawxpetcare</a>
        <a href="#" class="bg-white p-2 lg:p-3 rounded-full shadow hover:bg-gray-200">pawx_petcare</a>
        <a href="mailto:pawx@gmail.com" class="bg-white p-2 lg:p-3 rounded-full shadow hover:bg-gray-200">pawx@gmail.com</a>
        <a href="tel:+351915424674" class="bg-white p-2 lg:p-3 rounded-full shadow hover:bg-gray-200">+351 915424674</a>
    </div>
</footer>

</body>
</html>
