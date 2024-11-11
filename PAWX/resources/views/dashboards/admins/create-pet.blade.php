<link
    href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css"
    rel="stylesheet"
    type="text/css"
/>
<script src="https://cdn.tailwindcss.com"></script>
<!doctype html>
<html lang="en">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="flex h-screen bg-white">

    <!-- Left Sidebar -->
    <aside class="w-64 bg-white p-4 shadow-md">
        <div class="mb-6">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-orange-500 rounded"></div>
                <h2 class="text-lg font-semibold">PAWX</h2>
            </div>
        </div>

        <nav class="space-y-4">
            <x-dashboard.dropdwon-button
                icon="manage_accounts"
                class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg"
                label="Gestão"
                :items="[
                    ['label' => 'Create New Employee', 'url' => route('admin.create', 'employee')],
                    ['label' => 'Create New Client', 'url' => route('admin.create', 'client')],
                    ['label' => 'View All Employees', 'url' => route('admin.index', 'employee')],
                    ['label' => 'View All Clients', 'url' => route('admin.index', 'client')],
                    ]"/>
            <a href="#" class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                <span class="material-icons mr-2">analytics</span> Dashboard
            </a>
            <a href="#" class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                <span class="material-icons mr-2">notifications</span> Notificações
                <span class="ml-auto text-xs bg-orange-500 text-white rounded-full px-2">8</span>
            </a>
            <a href="#" class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                <span class="material-icons mr-2">description</span> Relatórios
            </a>
            <a href="#" class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                <span class="material-icons mr-2">expand_more</span> Ver mais
            </a>
        </nav>

        <div class="mt-8">
            <h3 class="text-gray-500 text-sm mb-2">ANIMAIS</h3>
            <ul class="space-y-2">
                <li class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span> Animal A
                </li>
                <li class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span> Animal B
                </li>
                <li class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span> Animal C
                </li>
            </ul>
        </div>
    </aside>

    <main class="flex-1 p-8 flex flex-col items-center space-y-4">
        <!-- Title Box -->
        <x-form.title>Criar pet</x-form.title>

        <!-- Form Box -->
        <div class="w-4/5 bg-gray-300 p-8 shadow-lg rounded-lg">
            <form action="{{ route('pet.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 flex flex-col items-center">
                @csrf
                <div class="flex space-x-4 w-full">
                    <div class="flex-1 space-y-4">
                        <div>
                            <x-form.label for="name" class="font-bold">Nome:</x-form.label>
                            <x-form.input type="text" name="name" value="{{ old('name') }}" class="rounded h-8 bg-white w-full" required/>
                        </div>
                        <div>
                            <x-form.label for="age" class="font-bold">Idade:</x-form.label>
                            <x-form.input type="number" name="age" value="{{ old('age') }}" class="rounded h-8 bg-white w-full" required/>
                        </div>
                        <div>
                            <x-form.label for="size" class="font-bold">Tamanho:</x-form.label>
                            <select name="size" class="rounded h-8 bg-white w-full">
                                <option value="option1">Pequeno - <= 10kg</option>
                                <option value="option2">Médio - 11 a 25kg</option>
                                <option value="option3">Grande - 26 a 44kg</option>
                                <option value="option3">Gigante - => 45kg</option>
                            </select>
                        </div>
                        <div>
                            <x-form.label for="allergies" class="font-bold">Alergias:</x-form.label>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="allergies" value="yes">
                                    <span>Sim</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="allergies" value="no">
                                    <span>Não</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 space-y-4">
                        <div>
                            <x-form.label for="type" class="font-bold">Espécie:</x-form.label>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="dog" value="yes">
                                    <span>Cão</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="cat" value="no">
                                    <span>Gato</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <x-form.label for="species" class="font-bold">Raça:</x-form.label>
                            <select name="breed" class="rounded h-8 bg-white w-full">
                                <option value="option1">Pastor Alemão</option>
                                <option value="option1">Golden Retriever</option>
                                <option value="option2">Cão de Água</option>
                                <option value="option3">ChowChow</option>
                                <option value="option3">Spitz Alemão</option>
                                <option value="option3">Serra da Estrela</option>
                                <option value="option3">Terra Nova</option>
                                <option value="option3">São Bernardo</option>
                                <option value="option3">Labrador</option>
                                <option value="option3">Labrador Porte Grande</option>
                                <option value="option3">Bichon Maltês</option>
                                <option value="option3">Shih-Tzu</option>
                                <option value="option3">Lulu</option>
                                <option value="option3">Outro</option>
                            </select>
                        </div>
                        <div>
                            <x-form.label for="castrated" class="font-bold">Castrado?</x-form.label>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="castrated" value="yes">
                                    <span>Sim</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="castrated" value="no">
                                    <span>Não</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <x-form.label for="gender" class="font-bold">Sexo:</x-form.label>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="gender" value="male">
                                    <span>Macho</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="gender" value="female">
                                    <span>Fêmea</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full">
                    <x-form.label for="photo" class="font-bold">Fotografia:</x-form.label>
                    <x-form.input type="file" name="photo" class="rounded h-8 bg-white w-full" />
                </div>

                <x-form.button type="submit" class="w-full py-2 px-4 bg-gray-600 text-white font-medium rounded-md">
                    Criar pet
                </x-form.button>
            </form>
        </div>
    </main>


    <!-- Right Sidebar for Calendar & Date Section -->
    <aside class="w-72 bg-white p-4 shadow-md flex flex-col items-center">
        <!-- User Profile Section -->
        <div class="flex items-center space-x-4">
            <!-- User Information -->
            <div class="flex items-center space-x-2">
                <span class="material-icons text-gray-600">account_circle</span>
                <span class="text-gray-800 font-semibold">User Name</span>
            </div>

            <!-- Notification Bell Icon -->
            <button class="relative flex items-center focus:outline-none">
                <span class="material-icons text-gray-600 hover:text-gray-800">notifications</span>
                <!-- Notification Dot -->
                <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full"></span>
            </button>

            <!-- Logout Icon Button -->
            <x-action.logout route="logout" type="submit">

            </x-action.logout>
        </div>

        <!-- Calendar Section -->
        <div class="w-full bg-white p-4 rounded-lg shadow-md">
            <h4 class="text-center font-semibold mb-2">Outubro 2024</h4>
            <div class="grid grid-cols-7 gap-2 text-center">
                <!-- Add calendar dates here -->
                <span class="text-gray-400">1</span>
                <!-- Fill out as needed -->
            </div>
        </div>

        <!-- Time & Date Picker -->
        <div class="w-full mt-6 p-4 bg-white rounded-lg shadow-md text-center">
            <div class="text-3xl font-semibold">10 : 34 PM</div>
            <div class="text-gray-500 mt-2">23/10/2024</div>
        </div>
    </aside>

</div>
</body>
</html>
