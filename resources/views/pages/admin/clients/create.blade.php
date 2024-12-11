@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <x-dashboard.forms-display.client-create/>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
