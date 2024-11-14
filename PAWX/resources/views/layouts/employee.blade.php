<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <!-- Add your stylesheets here -->
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    {{--    @include('partials.sidebar')--}}

    <div class="main-content">
        <!-- Header -->
        {{--        @include('partials.header')--}}

        <div class="content">
            @yield('content')  {{-- The main content for each page --}}
        </div>

        <!-- Footer -->
        {{--        @include('partials.footer')--}}
    </div>
</div>
</body>
</html>
