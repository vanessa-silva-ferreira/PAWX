@extends('layouts.admin')
@section('content')
    @php
        $headers = ['Nome', 'Username', 'Email', 'Morada', 'Contacto', 'NIF'];
        $users = $users ?? [];
        $type = $type ?? 'unknown';
    @endphp

    @include('partials.dashboard.content', [
        'headers' => $headers,
        'data' => $users,
        'type' => $type
    ])
@endsection
