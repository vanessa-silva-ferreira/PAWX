@extends('layouts.admin')
@section('content')
    @php
        $headers = ['Email', 'Name'];
        $users = $users ?? [];
        $type = $type ?? 'unknown';
    @endphp

    @include('partials.dashboard.content', [
        'headers' => $headers,
        'data' => $users,
        'type' => $type
    ])
@endsection
