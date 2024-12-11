@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <x-dashboard.forms-display.appointment-show :appointment="$appointment"/>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
