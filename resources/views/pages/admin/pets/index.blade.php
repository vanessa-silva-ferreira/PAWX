@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <x-dashboard.data-display.pets-table :pets="$pets"/>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
