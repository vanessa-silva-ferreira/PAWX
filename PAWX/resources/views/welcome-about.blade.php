<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - PAWX</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans text-gray-800">

@include('welcome-header')

<section class="relative bg-pawx-orange text-white py-12">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl font-extrabold text-white">
            SOBRE NÓS
        </h1>
        <p class="mt-4 text-lg font-light text-white">
            Dedicação, amor e profissionalismo. Cuidamos do seu animal como se fosse da nossa família.
        </p>
    </div>
</section>

<section class="p-8 lg:p-16 bg-white">
    <div class="max-w-5xl mx-auto space-y-16">
        <div class="flex flex-col lg:flex-row items-center gap-8">
            <div class="lg:w-1/2">
                <img src="https://placedog.net/500/400?random=1" alt="Quem Somos" class="rounded-lg shadow-lg w-full">
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-bold text-pawx-orange mb-4">QUEM SOMOS</h2>
                <p class="text-gray-600 leading-relaxed">
                    Dar banho ou tosquiar o seu animal em casa pode ser um desafio stressante, tanto para si como para o seu companheiro de quatro patas.
                    Na <span class="font-bold text-pawx-orange">PAWX</span>, simplificamos esta tarefa ao aliar técnicas profissionais ao amor pelos animais!
                </p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row-reverse items-center gap-8">
            <div class="lg:w-1/2">
                <img src="https://placedog.net/500/400?random=2" alt="O Espaço" class="rounded-lg shadow-lg w-full">
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-bold text-pawx-orange mb-4">O ESPAÇO</h2>
                <p class="text-gray-600 leading-relaxed">
                    O nosso espaço foi cuidadosamente projetado para oferecer conforto e tranquilidade. Localizado no coração de <span class="font-bold">Canelas, Vila Nova de Gaia</span>, o ambiente é perfeito para que o seu animal se sinta relaxado enquanto desfruta de um tratamento de qualidade.
                </p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row items-center gap-8">
            <div class="lg:w-1/2">
                <img src="https://placedog.net/500/400?random=3" alt="A Nossa Equipa" class="rounded-lg shadow-lg w-full">
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-bold text-pawx-orange mb-4">A NOSSA EQUIPA</h2>
                <p class="text-gray-600 leading-relaxed">
                    A nossa equipa, composta por profissionais experientes e apaixonados, adapta cada serviço às <span class="font-bold">necessidades específicas</span> de cada animal, garantindo um atendimento personalizado e seguro.
                </p>
                <p class="text-gray-600 leading-relaxed mt-2">
                    Trabalhamos para criar uma experiência positiva, não só para os nossos clientes de quatro patas, mas também para os seus tutores, promovendo confiança e satisfação.
                </p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row-reverse items-center gap-8">
            <div class="lg:w-1/2">
                <img src="https://placedog.net/500/400?random=4" alt="Os Nossos Produtos" class="rounded-lg shadow-lg w-full">
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-bold text-pawx-orange mb-4">OS NOSSOS PRODUTOS</h2>
                <p class="text-gray-600 leading-relaxed">
                    Utilizamos apenas produtos <span class="font-bold">naturais</span> e <span class="font-bold">de alta qualidade</span>, escolhidos para proteger a saúde dermatológica e proporcionar conforto ao seu animal.
                </p>
                <p class="text-gray-600 leading-relaxed mt-2">
                    Com o nosso cuidado, o pelo do seu amigo de quatro patas irá brilhar como nunca antes!
                </p>
            </div>
        </div>

        <div class="text-center bg-gray-50 p-8 rounded-lg shadow-md">
            <p class="text-lg text-pawx-orange font-bold">
                Agende já um momento de relaxamento para o seu animal connosco!
            </p>
            <a href="{{ route('welcome-contact') }}" class="inline-block mt-4 bg-pawx-orange text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:bg-orange-700">
                Contacte-nos
            </a>
        </div>
    </div>
</section>

@include('welcome-footer')

</body>
</html>
