<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    {{--    @vite('resources/css/app.css')--}}
    {{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <title>Dashboard</title>

    {{--change it later to an "OVERALL" layout--}}
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {},
            },
            plugins: [],
        }
    </script>
</head>
<body>
<div class="dashboard-container">
    <div class="main-content sm:grid grid-cols-6">
        @include('partials.dashboard.sidebar')
        <div class="col-span-4">
            @include('partials.dashboard.list')
        </div>
        {{--        @include('partials.dashboard.header')--}}
        {{--                @include('partials.dashboard.content')--}}
        {{--                @yield('content')--}}
        {{--        @include('partials.dashboard.footer')--}}
    </div>
</div>
</body>
</html>
