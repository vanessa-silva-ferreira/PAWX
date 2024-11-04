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
<div class="flex h-screen bg-gray-100">

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

    <!-- Main Content -->
    <main class="flex-1 p-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Create New Admin
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" action="{{ route('admins.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Name
                        </label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create Admin
                        </button>
                    </div>
                </form>
            </div>
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
