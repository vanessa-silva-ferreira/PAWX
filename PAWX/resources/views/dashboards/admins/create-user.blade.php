{{--<h1>Create New {{ ucfirst($type) }}</h1>--}}

{{--@if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
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



    <!-- Main Content -->
    <main class="flex-1 p-8 flex flex-col items-center space-y-4">
        <!-- Title Box -->
        <x-form.title>CREATE EMPLOYEE</x-form.title>

        <!-- Form Box -->
        <div class="w-4/5 bg-white p-16 shadow-lg rounded-lg">
            <form action="{{ route('admin.store', $type) }}" method="POST" class="space-y-8 flex flex-col items-center">
                @csrf
                <div class="flex space-x-4 w-full">
                    <div class="flex-1 space-y-4">
                        <div>
                            <x-form.label for="name" class="text-orange-600 font-bold">Name:</x-form.label>
                            <x-form.input type="text" name="name" value="{{ old('name') }}"
                                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300" required/>
                        </div>
                        <div>
                            <x-form.label for="email" class="text-orange-600 font-bold">Email:</x-form.label>
                            <x-form.input type="email" id="email" name="email" value="{{ old('email') }}"
                                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300" required/>
                        </div>
                        <div>
                            <x-form.label for="password" class="text-orange-600 font-bold">Password:</x-form.label>
                            <x-form.input type="password" id="password" name="password"
                                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300" required/>
                        </div>
                        <div>
                            <x-form.label for="username" class="text-orange-600 font-bold">Username:</x-form.label>
                            <x-form.input type="text" id="username" name="username"
                                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300" />
                        </div>
                    </div>
                    <div class="flex-1 space-y-4">
                        <div>
                            <x-form.label for="phoneNumber" class="text-orange-600 font-bold">Phone Number:</x-form.label>
                            <x-form.input
                                type="tel"
                                id="phone_number"
                                name="phone_number"
                                class="rounded h-8 bg-white w-full ring-1 ring-gray-300"
                                pattern="^9[0-9]{8}$"
                                title="Phone number must be exactly 9 digits and start with 9"
                                inputmode="numeric"
                                maxlength="9"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 9);"
                            />
                        </div>
                        <div>
                            <x-form.label for="nif" class="text-orange-600 font-bold">NIF:</x-form.label>
                            <x-form.input
                                type="tel"
                                id="nif"
                                name="nif"
                                class="rounded h-8 bg-white w-full ring-1 ring-gray-300"
                                pattern="^[0-9]{9}$"
                                title="NIF must be exactly 9 digits"
                                inputmode="numeric"
                                maxlength="9"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 9);"
                            />
                        </div>
                        <div>
                            <x-form.label for="password" class="text-orange-600 font-bold">Confirm password:</x-form.label>
                            <x-form.input type="password" id="password" name="password"
                                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300"/>
                        </div>
                        <div>
                            <x-form.label for="sex" class="text-orange-600">Sex:</x-form.label>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="sex" value="male" class="text-orange-600">
                                    <span class="text-orange-600">Male</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="sex" value="female" class="text-orange-600">
                                    <span class="text-orange-600">Female</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="sex" value="other" class="text-orange-600">
                                    <span class="text-orange-600">Other</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <x-form.label for="address" class="text-orange-600 font-bold">Address:</x-form.label>
                    <x-form.input type="text" id="address" name="address"
                                  class="rounded h-8 bg-white w-full ring-1 ring-gray-300"/>
                </div>
                <x-form.button type="submit" class="w-full py-2 px-4 bg-orange-600 text-white font-medium rounded-md hover:text-orange-600 hover:bg-white hover:ring-1 hover:ring-orange-600">
                    Create {{ ucfirst($type) }}
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


<form action="{{ route('admin.store', $type) }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Create {{ ucfirst($type) }}</button>
</form>

{{--<div>--}}
{{--    <a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>--}}
{{--</div>--}}
