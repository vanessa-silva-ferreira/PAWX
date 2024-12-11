@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <x-dashboard.forms-display.pet-edit :pet="$pet" :clients="$clients" :species="$species" :breeds="$breeds" :sizes="$sizes"/>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
