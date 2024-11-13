<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IR=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Project</title>

    {{-- .STYLE SECTION --}}
    <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css">
    {{-- .STYLE SECTION --}}
</head>
<body>
    {{-- .Header --}}
    @component('master.header')
    @endcomponent
    {{-- .Header --}}

    {{-- .Content --}}
    <main>
        @yield('content')
    </main>
    {{-- .Content --}}

    @component('master.footer')
    @endcomponent

    <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
    @yield('scripts')
    {{-- .SCRIPTS SECTION --}}
</body>
</html>
