<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - PAWX</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans text-gray-800">

@include('welcome-header')

<section class="p-8 lg:p-16 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl lg:text-5xl font-bold text-gray-700">Entre em Contacto</h2>
        <p class="mt-4 text-lg text-gray-600">
            Gostaria de saber mais sobre os nossos serviços ou agendar uma consulta? Visite-nos ou entre em contacto pelos seguintes canais!
        </p>
    </div>
</section>

<section class="p-8 lg:p-16 bg-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-2xl font-bold text-pawx-orange mb-4">Contactos</h3>
            <ul class="space-y-4 text-gray-700 text-lg">
                <li>
                    <strong>Telefone:</strong> <a href="tel:+351915424674" class="text-blue-600 hover:underline">+351 915424674</a>
                </li>
                <li>
                    <strong>Email:</strong> <a href="mailto:pawx@gmail.com" class="text-blue-600 hover:underline">pawx@gmail.com</a>
                </li>
                <li>
                    <strong>Redes Sociais:</strong>
                    <div class="flex space-x-4 mt-2">
                        <a href="https://www.facebook.com/pawxpetcare" target="_blank" class="text-blue-600 hover:underline">Facebook</a>
                        <a href="https://www.instagram.com/pawx_petcare" target="_blank" class="text-pink-500 hover:underline">Instagram</a>
                    </div>
                </li>
                <li>
                    <strong>Localização:</strong> Canelas, Vila Nova de Gaia
                </li>
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow-lg">
            <iframe
                class="w-full h-full rounded-lg"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3108.467297882356!2d-8.60551638465308!3d41.11824001937925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2465784c79d37d%3A0x52f1a6ec982fb3ea!2sCanelas%2C%20Vila%20Nova%20de%20Gaia!5e0!3m2!1spt-BR!2spt!4v1698958492633!5m2!1spt-BR!2spt"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

</body>
</html>
