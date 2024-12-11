@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <x-dashboard.forms-display.appointment-create :clients="$clients" :pets="$pets" :employees="$employees"
                                                  :services="$services" />
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection

