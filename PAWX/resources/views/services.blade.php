<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX - Pet Care</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans text-gray-800">

<!-- Header -->
<header class="bg-gray-800 text-white p-4 lg:p-6 flex flex-col lg:flex-row justify-between items-center shadow-md">
    <div class="text-2xl lg:text-4xl font-bold">PAWX</div>
    <nav class="flex flex-wrap justify-center space-x-4 lg:space-x-6 text-sm lg:text-lg font-semibold mt-2 lg:mt-0">
        <a href="{{ route('welcome') }}" class="hover:text-gray-400">Home</a>
        <a href="{{ route('services') }}" class="hover:text-gray-400">Services</a>
        <a href="#" class="hover:text-gray-400">Gallery</a>
        <a href="#" class="hover:text-gray-400">Feedback</a>
        <a href="#" class="hover:text-gray-400">About Us</a>
        <a href="#" class="hover:text-gray-400">Contact Us</a>
    </nav>
    <div class="flex space-x-2 lg:space-x-4 mt-2 lg:mt-0">
        <button class="text-xs lg:text-sm px-2 lg:px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-300">Profile</button>
        <button class="text-xs lg:text-sm px-2 lg:px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-300">Logout</button>
    </div>
</header>

<!-- Services Section -->
<section class="p-4 lg:p-8 bg-white">
    <h2 class="text-2xl lg:text-4xl font-extrabold text-center text-gray-700">SERVICES</h2>
    <p class="text-center text-gray-500 mt-2 text-sm lg:text-lg">Because your pet's needs matter</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-8 mt-6">
        <!-- Bathing Service -->
        <div class="bg-gray-100 rounded-lg p-4 lg:p-6 shadow-lg hover:shadow-xl flex flex-col items-center text-center border border-gray-300">
            <img src="https://placekitten.com/400/200" alt="Pet Bathing" class="w-full h-40 object-cover rounded-md mb-4">
            <h3 class="text-xl lg:text-2xl font-bold text-gray-700 mt-2">Bathing</h3>
            <p class="text-gray-600 mt-2 text-sm lg:text-base">
                We give your pets the best bathing experience to keep them clean and happy.
            </p>
            <div class="flex space-x-2 lg:space-x-4 mt-4">
                <button class="bg-gray-700 text-white px-3 lg:px-4 py-2 rounded hover:bg-gray-600">Pricing</button>
                <button class="bg-gray-700 text-white px-3 lg:px-4 py-2 rounded hover:bg-gray-600">Schedule</button>
            </div>
        </div>
        <!-- Shear Service -->
        <div class="bg-gray-100 rounded-lg p-4 lg:p-6 shadow-lg hover:shadow-xl flex flex-col items-center text-center border border-gray-300">
            <img src="https://placedog.net/400/200" alt="Pet Shearing" class="w-full h-40 object-cover rounded-md mb-4">
            <h3 class="text-xl lg:text-2xl font-bold text-gray-700 mt-2">Shear</h3>
            <p class="text-gray-600 mt-2 text-sm lg:text-base">
                Clean and soft fur for pets. Our professionals keep your pets trimmed and looking good.
            </p>
            <div class="flex space-x-2 lg:space-x-4 mt-4">
                <button class="bg-gray-700 text-white px-3 lg:px-4 py-2 rounded hover:bg-gray-600">Pricing</button>
                <button class="bg-gray-700 text-white px-3 lg:px-4 py-2 rounded hover:bg-gray-600">Schedule</button>
            </div>
        </div>
    </div>

</section>



<!-- Contact Section -->
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
