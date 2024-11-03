<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div class="dashboard-container">

    <div class="main-content">
        @include('partials.dashboard.sidebar')

{{--        @include('partials.dashboard.header')--}}
        @include('partials.dashboard.content')

{{--        @yield('content')--}}

        @include('partials.dashboard.footer')
    </div>

</div>
</body>
</html>

{{--    <!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <title>{{ config('app.name', 'Dashboard') }}</title>--}}
{{--    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>--}}
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--</head>--}}
{{--<body class="bg-gray-100 font-sans">--}}
{{--<div class="dashboard-container flex h-screen">--}}
{{--        @include('partials.dashboard.sidebar')--}}
{{--    <div class="main-content flex-1 flex flex-col overflow-hidden">--}}
{{--        <header class="bg-white shadow">--}}
{{--            @include('partials.dashboard.header')--}}
{{--        </header>--}}

{{--        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}

{{--        <footer class="bg-white shadow mt-auto">--}}
{{--            @include('partials.dashboard.footer')--}}
{{--        </footer>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
