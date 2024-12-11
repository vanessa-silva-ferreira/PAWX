
@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')

    {{--
    From Gonçalo Commit to pass to Appointments-Table
    (i had to delete the rest of the code because it was already in the table component,
    but its missing this search component)

    <x-utilities.search-bar
      :action="route('admin.appointments.index')"
      placeholder="Search by client name, pet name, service, etc."
    />
    --}}

    <x-dashboard.data-display.appointments-table :appointments="$appointments"/>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
    {{--    @include('partials.dashboard.notifications', ['notifications' => $notifications])--}}
@endsection
