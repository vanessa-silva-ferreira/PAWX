<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - PAWX</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

@include('welcome-header')

<section class="p-8 lg:p-16 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl lg:text-5xl font-bold text-gray-700">Entre em Contacto</h2>
        <p class="mt-4 text-lg text-gray-600">
            Gostaria de saber mais sobre os nossos serviços ou agendar uma consulta? Envie-nos uma mensagem ou visite-nos!
        </p>
    </div>
</section>

<section class="p-8 lg:p-16 bg-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8">

        <form class="bg-white p-6 rounded-lg shadow-lg space-y-4">
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" id="nome" name="nome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="mensagem" class="block text-sm font-medium text-gray-700">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">Enviar</button>
        </form>

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

@include('welcome-footer')

</body>
</html>
