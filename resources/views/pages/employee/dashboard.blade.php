@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Employee Dashboard</h1>
        <p>Welcome to the employee panel.</p>
    </div>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
