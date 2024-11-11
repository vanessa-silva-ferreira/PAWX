@extends('layouts.dashboard')


@php
//    $title = ['title' => 'TEST'];
    $menuItems = [
        [
            'href' => route('admin.dashboard'),
            'icon' => 'M148.644 390.928V329.593C148.644 313.993 161.362 301.317 177.12 301.212H234.842C250.675 301.212 263.51 313.919 263.51 329.593V391.119C263.506 404.364 274.185 415.19 287.561 415.5H326.042C364.402 415.5 395.5 384.714 395.5 346.737V172.257C395.295 157.317 388.21 143.287 376.26 134.161L244.654 29.206C221.599 10.9313 188.824 10.9313 165.768 29.206L34.7405 134.351C22.7452 143.44 15.6477 157.493 15.5 172.447V346.737C15.5 384.714 46.5975 415.5 84.9582 415.5H123.439C137.147 415.5 148.259 404.499 148.259 390.928',
            'label' => 'Dashboard'
        ],
        [
            'href' => '#',
            'icon' => 'M185.5 332.453C298.285 332.453 350.461 317.984 355.5 259.91C355.5 201.876 319.123 205.608 319.123 134.402C319.123 78.7828 266.405 15.5 185.5 15.5C104.595 15.5 51.8769 78.7828 51.8769 134.402C51.8769 205.608 15.5 201.876 15.5 259.91C20.559 318.204 72.7355 332.453 185.5 332.453Z',
            'label' => 'Notificações',
//            'notification' => '8'
        ],
        [
            'href' => '#',
            'icon' => '#',
            'label' => 'Relatórios'
        ],
          [
            'href' => '#',
            'icon' => '',
            'label' => 'Ver mais'
        ],
    ];

        $workspaceItems = [
        [
            'href' => route('admin.dashboard'),
            'icon' => 'M148.644 390.928V329.593C148.644 313.993 161.362 301.317 177.12 301.212H234.842C250.675 301.212 263.51 313.919 263.51 329.593V391.119C263.506 404.364 274.185 415.19 287.561 415.5H326.042C364.402 415.5 395.5 384.714 395.5 346.737V172.257C395.295 157.317 388.21 143.287 376.26 134.161L244.654 29.206C221.599 10.9313 188.824 10.9313 165.768 29.206L34.7405 134.351C22.7452 143.44 15.6477 157.493 15.5 172.447V346.737C15.5 384.714 46.5975 415.5 84.9582 415.5H123.439C137.147 415.5 148.259 404.499 148.259 390.928',
            'label' => 'Dashboard'
        ],
        [
            'href' => '#',
            'icon' => 'M185.5 332.453C298.285 332.453 350.461 317.984 355.5 259.91C355.5 201.876 319.123 205.608 319.123 134.402C319.123 78.7828 266.405 15.5 185.5 15.5C104.595 15.5 51.8769 78.7828 51.8769 134.402C51.8769 205.608 15.5 201.876 15.5 259.91C20.559 318.204 72.7355 332.453 185.5 332.453Z',
            'label' => 'Notificações',
//            'notification' => '8'
        ],
        [
            'href' => '#',
            'icon' => '#',
            'label' => 'Relatórios'
        ],
          [
            'href' => '#',
            'icon' => '',
            'label' => 'Ver mais'
        ],
    ];
@endphp






{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <!-- Meta tags and title -->--}}
{{--    <meta charset="UTF-8">--}}
{{--    <title>Admin Dashboard</title>--}}

{{--    <!-- CSS Links -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css"/>--}}

{{--</head>--}}
{{--<body>--}}
{{--<div class="flex h-screen">--}}
{{--    <!-- Left Sidebar -->--}}
{{--    <aside id="sidebar" class="w-64 bg-white dark:bg-gray-800 p-4 transition-all duration-300">--}}
{{--        <!-- Toggle Button -->--}}
{{--        <button onclick="toggleSidebar()" class="p-2 focus:outline-none dark:text-gray-100">--}}
{{--            <span id="toggle-icon" class="material-symbols-outlined">chevron_left</span>--}}
{{--        </button>--}}

{{--        <!-- Logo Section -->--}}
{{--        <div class="flex items-center space-x-3 mb-6">--}}
{{--            <div class="w-8 h-8 bg-orange-500 rounded"></div>--}}
{{--            <h2 class="text-lg font-semibold dark:text-gray-100 menu-text">PAWX</h2>--}}
{{--        </div>--}}

{{--        <!-- Search Section -->--}}
{{--        <div id="search-section" class="p-4">--}}
{{--            <input type="text" placeholder="Search" class="w-full p-2 rounded bg-gray-200 dark:bg-gray-800 dark:text-gray-100 outline-none">--}}
{{--        </div>--}}

{{--        <!-- Main Menu -->--}}
{{--        <nav class="space-y-4">--}}
{{--            <!-- Menu Items -->--}}
{{--            <a href="#" class="flex items-center p-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">--}}
{{--                <span class="material-symbols-outlined">manage_accounts</span>--}}
{{--                <span class="menu-text ml-2">Gestão</span>--}}
{{--            </a>--}}
{{--            <a href="#" class="flex items-center p-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">--}}
{{--                <span class="material-symbols-outlined">analytics</span>--}}
{{--                <span class="menu-text ml-2">Dashboard</span>--}}
{{--            </a>--}}
{{--            <a href="#" class="flex items-center p-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">--}}
{{--                <span class="material-symbols-outlined">notifications</span>--}}
{{--                <span class="menu-text ml-2">Notificações</span>--}}
{{--                <span class="ml-auto text-xs bg-orange-500 text-white rounded-full px-2">8</span>--}}
{{--            </a>--}}
{{--            <a href="#" class="flex items-center p-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">--}}
{{--                <span class="material-symbols-outlined">description</span>--}}
{{--                <span class="menu-text ml-2">Relatórios</span>--}}
{{--            </a>--}}
{{--            <a href="#" class="flex items-center p-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">--}}
{{--                <span class="material-symbols-outlined">expand_more</span>--}}
{{--                <span class="menu-text ml-2">Ver mais</span>--}}
{{--            </a>--}}
{{--        </nav>--}}

{{--        <!-- Workspace Section -->--}}
{{--        <div class="mt-8">--}}
{{--            <h3 class="text-gray-500 dark:text-gray-400 text-sm mb-2 menu-text">ANIMAIS</h3>--}}
{{--            <ul class="space-y-2">--}}
{{--                <li class="flex items-center p-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">--}}
{{--                    <span class="material-symbols-outlined">pets</span>--}}
{{--                    <span class="menu-text ml-2">Animal A</span>--}}
{{--                </li>--}}
{{--                <li class="flex items-center p-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">--}}
{{--                    <span class="material-symbols-outlined">pets</span>--}}
{{--                    <span class="menu-text ml-2">Animal B</span>--}}
{{--                </li>--}}
{{--                <li class="flex items-center p-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">--}}
{{--                    <span class="material-symbols-outlined">pets</span>--}}
{{--                    <span class="menu-text ml-2">Animal C</span>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}

{{--        <!-- Include Theme Toggle -->--}}
{{--        @include('components.form.theme-toggle')--}}

{{--        <!-- Bottom Help Icon -->--}}
{{--        <div class="flex flex-col items-center space-y-4 p-4 mt-auto">--}}
{{--            <button class="p-2">--}}
{{--                <span class="material-symbols-outlined bg-white text-black rounded-full p-1 text-2xl">help_outline</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </aside>--}}

{{--    <!-- Main Content -->--}}
{{--    <main class="flex-1 p-8 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100">--}}
{{--        <!-- Top Bar -->--}}
{{--        <div class="flex items-center justify-between mb-8">--}}
{{--            <div class="w-full max-w-md">--}}
{{--                <input type="text" placeholder="Procurar agendamentos, clientes, animais" class="w-full p-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 outline-none">--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Metrics Cards -->--}}
{{--        <div class="grid grid-cols-3 gap-6 mb-8">--}}
{{--            <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">--}}
{{--                <h3 class="text-lg font-semibold dark:text-gray-100">Agendamentos</h3>--}}
{{--                <p class="text-2xl dark:text-gray-100">000</p>--}}
{{--            </div>--}}
{{--            <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">--}}
{{--                <h3 class="text-lg font-semibold dark:text-gray-100">Animais</h3>--}}
{{--                <p class="text-2xl dark:text-gray-100">000</p>--}}
{{--            </div>--}}
{{--            <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">--}}
{{--                <h3 class="text-lg font-semibold dark:text-gray-100">Receita</h3>--}}
{{--                <p class="text-2xl dark:text-gray-100">€000,00</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Agenda Section -->--}}
{{--        <div class="mb-8">--}}
{{--            <div class="flex items-center justify-between mb-4">--}}
{{--                <h3 class="text-lg font-semibold dark:text-gray-100">Agendamentos</h3>--}}
{{--                <input type="text" placeholder="Procurar por agendamento" class="p-2 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-lg outline-none">--}}
{{--            </div>--}}
{{--            <table class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-md">--}}
{{--                <thead class="bg-gray-100 dark:bg-gray-700">--}}
{{--                <tr>--}}
{{--                    <th class="p-3 text-left">Animal</th>--}}
{{--                    <th class="p-3 text-left">Status</th>--}}
{{--                    <th class="p-3 text-left">Ratings</th>--}}
{{--                    <th class="p-3 text-left">Data</th>--}}
{{--                    <th class="p-3 text-left">Horário</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                <tr class="border-b dark:border-gray-600">--}}
{{--                    <td class="p-3">Bluenose</td>--}}
{{--                    <td class="p-3"><span class="px-2 py-1 bg-green-100 dark:bg-green-600 text-green-600 dark:text-green-100 rounded">Agendado</span></td>--}}
{{--                    <td class="p-3">-</td>--}}
{{--                    <td class="p-3">11-10-2024</td>--}}
{{--                    <td class="p-3">15h00 - 15h45</td>--}}
{{--                </tr>--}}
{{--                <tr class="border-b dark:border-gray-600">--}}
{{--                    <td class="p-3">Pennywise</td>--}}
{{--                    <td class="p-3"><span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-600 text-yellow-600 dark:text-yellow-100 rounded">A confirmar</span></td>--}}
{{--                    <td class="p-3">-</td>--}}
{{--                    <td class="p-3">16-10-2024</td>--}}
{{--                    <td class="p-3">14h30 - 15h15</td>--}}
{{--                </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </main>--}}

{{--    <!-- Right Sidebar for Calendar & Date Section -->--}}
{{--    <aside class="w-72 bg-white dark:bg-gray-800 p-4 shadow-md flex flex-col items-center">--}}
{{--        <!-- User Profile Section -->--}}
{{--        <div class="flex items-center space-x-4">--}}
{{--            <div class="flex items-center space-x-2">--}}
{{--                <span class="material-symbols-outlined text-gray-600 dark:text-gray-100">account_circle</span>--}}
{{--                <span class="text-gray-800 dark:text-gray-100 font-semibold">User Name</span>--}}
{{--            </div>--}}

{{--            <!-- Notification Bell Icon -->--}}
{{--            <button class="relative flex items-center focus:outline-none">--}}
{{--                <span class="material-symbols-outlined text-gray-600 dark:text-gray-100 hover:text-gray-800 dark:hover:text-gray-200">notifications</span>--}}
{{--                <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full"></span>--}}
{{--            </button>--}}
{{--        </div>--}}

{{--        <!-- Calendar Section -->--}}
{{--        <div class="w-full bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md mt-6">--}}
{{--            <h4 class="text-center font-semibold dark:text-gray-100 mb-2">Outubro 2024</h4>--}}
{{--            <div class="grid grid-cols-7 gap-2 text-center">--}}
{{--                <!-- Calendar dates would go here -->--}}
{{--                <span class="text-gray-400 dark:text-gray-500">1</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Time & Date Picker -->--}}
{{--        <div class="w-full mt-6 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md text-center">--}}
{{--            <div class="text-3xl font-semibold dark:text-gray-100">10 : 34 PM</div>--}}
{{--            <div class="text-gray-500 dark:text-gray-400 mt-2">23/10/2024</div>--}}
{{--        </div>--}}

{{--        <!-- Logout Icon Button -->--}}
{{--        <button class="mt-6 p-2 bg-red-500 text-white rounded-lg">--}}
{{--            Logout--}}
{{--        </button>--}}
{{--    </aside>--}}
{{--</div>--}}

{{--<!-- JavaScript Files -->--}}
{{--<script src="js/sidebar-toggle.js"></script>--}}

{{--</body>--}}
{{--</html>--}}
