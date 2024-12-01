@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="pl-20 pr-20">
    <x-dashboard.forms-display.pet-create :clients="$clients" :species="$species" :breeds="$breeds" :sizes="$sizes" />
    </div>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
    {{--    @include('partials.dashboard.notifications', ['notifications' => $notifications])--}}
@endsection
