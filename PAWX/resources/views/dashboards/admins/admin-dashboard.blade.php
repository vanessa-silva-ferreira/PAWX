{{--<link--}}
{{--    href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css"--}}
{{--    rel="stylesheet"--}}
{{--    type="text/css"--}}
{{--/>--}}
{{--<script src="https://cdn.tailwindcss.com"></script>--}}
{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="flex h-screen bg-gray-100">--}}

{{--    <!-- Left Sidebar -->--}}
{{--    <aside class="w-64 bg-white p-4 shadow-md">--}}
{{--        <div class="mb-6">--}}
{{--            <div class="flex items-center space-x-3">--}}
{{--                <div class="w-8 h-8 bg-orange-500 rounded"></div>--}}
{{--                <h2 class="text-lg font-semibold">PAWX</h2>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <nav class="space-y-4">--}}
{{--            <x-dashboard.dropdwon-button--}}
{{--                icon="manage_accounts"--}}
{{--                class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg"--}}
{{--                label="Gestão"--}}
{{--                :items="[--}}
{{--                    ['label' => 'Create New Employee', 'url' => route('admin.create', 'employee')],--}}
{{--                    ['label' => 'Create New Client', 'url' => route('admin.create', 'client')],--}}
{{--                    ['label' => 'View All Employees', 'url' => route('admin.index', 'employee')],--}}
{{--                    ['label' => 'View All Clients', 'url' => route('admin.index', 'client')],--}}
{{--                    ]"/>--}}
{{--            <a href="#" class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">--}}
{{--                <span class="material-icons mr-2">analytics</span> Dashboard--}}
{{--            </a>--}}
{{--            <a href="#" class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">--}}
{{--                <span class="material-icons mr-2">notifications</span> Notificações--}}
{{--                <span class="ml-auto text-xs bg-orange-500 text-white rounded-full px-2">8</span>--}}
{{--            </a>--}}
{{--            <a href="#" class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">--}}
{{--                <span class="material-icons mr-2">description</span> Relatórios--}}
{{--            </a>--}}
{{--            <a href="#" class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">--}}
{{--                <span class="material-icons mr-2">expand_more</span> Ver mais--}}
{{--            </a>--}}
{{--        </nav>--}}

{{--        <div class="mt-8">--}}
{{--            <h3 class="text-gray-500 text-sm mb-2">ANIMAIS</h3>--}}
{{--            <ul class="space-y-2">--}}
{{--                <li class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">--}}
{{--                    <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span> Animal A--}}
{{--                </li>--}}
{{--                <li class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">--}}
{{--                    <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span> Animal B--}}
{{--                </li>--}}
{{--                <li class="flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg">--}}
{{--                    <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span> Animal C--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </aside>--}}

{{--    <!-- Main Content -->--}}
{{--    <main class="flex-1 p-8">--}}
{{--        <!-- Top Bar -->--}}
{{--        <div class="flex items-center justify-between mb-8">--}}
{{--            <div class="w-full max-w-md">--}}
{{--                <input type="text" placeholder="Procurar agendamentos, clientes, animais" class="w-full p-2 rounded-lg bg-gray-100 outline-none">--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Metrics Cards -->--}}
{{--        <div class="grid grid-cols-3 gap-6 mb-8">--}}
{{--            <x-dashboard.card title="Agendamentos" value="000" />--}}
{{--            <x-dashboard.card title="Animais" value="000" />--}}
{{--            <x-dashboard.card title="Receita" value="€000,00" />--}}
{{--        </div>--}}

{{--        <!-- Agenda Section -->--}}
{{--        <div class="mb-8">--}}
{{--            <div class="flex items-center justify-between mb-4">--}}
{{--                <h3 class="text-lg font-semibold">Agendamentos</h3>--}}
{{--                <input type="text" placeholder="Procurar por agendamento" class="p-2 bg-gray-100 rounded-lg outline-none">--}}
{{--            </div>--}}
{{--            <table class="w-full bg-white rounded-lg shadow-md">--}}
{{--                <thead class="bg-gray-100">--}}
{{--                <tr>--}}
{{--                    <th class="p-3 text-left">Animal</th>--}}
{{--                    <th class="p-3 text-left">Status</th>--}}
{{--                    <th class="p-3 text-left">Ratings</th>--}}
{{--                    <th class="p-3 text-left">Data</th>--}}
{{--                    <th class="p-3 text-left">Horário</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                <tr class="border-b">--}}
{{--                    <td class="p-3">Bluenose</td>--}}
{{--                    <td class="p-3"><span class="px-2 py-1 bg-green-100 text-green-600 rounded">Agendado</span></td>--}}
{{--                    <td class="p-3">-</td>--}}
{{--                    <td class="p-3">11-10-2024</td>--}}
{{--                    <td class="p-3">15h00 - 15h45</td>--}}
{{--                </tr>--}}
{{--                <tr class="border-b">--}}
{{--                    <td class="p-3">Pennywise</td>--}}
{{--                    <td class="p-3"><span class="px-2 py-1 bg-yellow-100 text-yellow-600 rounded">A confirmar</span></td>--}}
{{--                    <td class="p-3">-</td>--}}
{{--                    <td class="p-3">16-10-2024</td>--}}
{{--                    <td class="p-3">14h30 - 15h15</td>--}}
{{--                </tr>--}}
{{--                <!-- Add more rows as needed -->--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </main>--}}

{{--    <!-- Right Sidebar for Calendar & Date Section -->--}}
{{--    <aside class="w-72 bg-white p-4 shadow-md flex flex-col items-center">--}}
{{--        <!-- User Profile Section -->--}}
{{--        <div class="flex items-center space-x-4">--}}
{{--            <!-- User Information -->--}}
{{--            <div class="flex items-center space-x-2">--}}
{{--                <span class="material-icons text-gray-600">account_circle</span>--}}
{{--                <span class="text-gray-800 font-semibold">User Name</span>--}}
{{--            </div>--}}

{{--            <!-- Notification Bell Icon -->--}}
{{--            <button class="relative flex items-center focus:outline-none">--}}
{{--                <span class="material-icons text-gray-600 hover:text-gray-800">notifications</span>--}}
{{--                <!-- Notification Dot -->--}}
{{--                <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full"></span>--}}
{{--            </button>--}}

{{--            <!-- Logout Icon Button -->--}}
{{--            <x-action.logout route="logout" type="submit">--}}

{{--            </x-action.logout>--}}
{{--        </div>--}}

{{--        <!-- Calendar Section -->--}}
{{--        <div class="w-full bg-white p-4 rounded-lg shadow-md">--}}
{{--            <h4 class="text-center font-semibold mb-2">Outubro 2024</h4>--}}
{{--            <div class="grid grid-cols-7 gap-2 text-center">--}}
{{--                <!-- Add calendar dates here -->--}}
{{--                <span class="text-gray-400">1</span>--}}
{{--                <!-- Fill out as needed -->--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Time & Date Picker -->--}}
{{--        <div class="w-full mt-6 p-4 bg-white rounded-lg shadow-md text-center">--}}
{{--            <div class="text-3xl font-semibold">10 : 34 PM</div>--}}
{{--            <div class="text-gray-500 mt-2">23/10/2024</div>--}}
{{--        </div>--}}
{{--    </aside>--}}

{{--</div>--}}
{{--</body>--}}
{{--</html>--}}

{{--<h1>Dashboard do Admin</h1>--}}



{{--<ul>--}}
{{--    <li><a href="{{ route('admin.create', 'employee') }}">Create New Employee</a></li>--}}
{{--    <li><a href="{{ route('admin.create', 'client') }}">Create New Client</a></li>--}}
{{--    <li><a href="{{ route('admin.index', 'employee') }}">View All Employees</a></li>--}}
{{--    <li><a href="{{ route('admin.index', 'client') }}">View All Clients</a></li>--}}
{{--</ul>--}}


@extends('layouts.dashboard')


{{--@section('title', 'Admin Dashboard')--}}

@section('content')

    @include('partials.dashboard.content')
    @php
        $menuItems = [
            [
                'href' => route('admin.dashboard'),
                'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                'label' => 'Home'
            ],
            [
                'href' => '#',
                'icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9',
                'label' => 'Notificações',
                'notification' => '8'
            ],
            [
                'href' => '#',
                'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'label' => 'Relatórios'
            ],
        ];

        $workspaceItems = [
            ['href' => route('admin.create', ['type' => 'employee']), 'label' => 'Animal A'],
            ['href' => route('admin.create', ['type' => 'client']), 'label' => 'Animal B'],
            ['href' => '#', 'label' => 'Animal C'],
        ];
    @endphp

    @include('partials.dashboard.sidebar', [
        'appName' => 'PAWX',
        'menuItems' => $menuItems,
        'workspaceTitle' => 'ANIMAIS',
        'workspaceItems' => $workspaceItems,
    ])


@endsection

{{--    @include('partials.dashboard.admin.quick-actions')--}}
    {{--<x-action.logout/>--}}

