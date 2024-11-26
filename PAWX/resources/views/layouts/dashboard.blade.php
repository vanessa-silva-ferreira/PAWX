<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.x.x/dist/tailwind.min.css" rel="stylesheet">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/tailwind-config.js') }}" defer></script>

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
    <aside id="notifications" class="w-64 bg-white dark:bg-gray-800 p-4">
        @yield('notifications')
    </aside>
</div>
</body>
</html>

