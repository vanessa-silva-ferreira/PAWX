@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Painel de Administrador </h1>
        <p>Bem-vindo.</p>
    </div>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
    {{--    @include('partials.dashboard.notifications', ['notifications' => $notifications])--}}
@endsection


{{--@extends('layouts.dashboard')--}}

{{--@include('partials.dashboard.sidebar')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h1>Admin Dashboard</h1>--}}
{{--    </div>--}}
{{--@endsection--}}

