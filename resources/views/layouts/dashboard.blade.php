<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>PAWX</title>
</head>
<body>
<div class="flex h-screen">
    <aside id="sidebar" class="w-64 bg-white dark:bg-gray-800 p-4 transition-all duration-300">
        @yield('sidebar')
    </aside>

    <main class="flex-grow bg-white dark:bg-gray-900 p-6">
        @yield('content')
    </main>
    <aside id="notifications" class="w-86 bg-white dark:bg-gray-800 p-4">
        @yield('notifications')
    </aside>
</div>
</body>
</html>

