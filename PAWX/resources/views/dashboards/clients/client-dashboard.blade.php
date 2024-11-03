@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>

    @include('partials.dashboard.content')
    {{--    @include('partials.dashboard.admin.metrics')--}}
    {{--    @include('partials.dashboard.admin.recent-activities')--}}
    {{--    @include('partials.dashboard.admin.quick-actions')--}}
@endsection
{{--<x-action.logout/>--}}

