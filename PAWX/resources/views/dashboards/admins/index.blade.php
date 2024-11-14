@extends('layouts.admin')
@section('content')
    @php
        $headers = ['Nome', 'Username', 'Email', 'Morada', 'Contacto', 'NIF', 'Ações'];
        $users = $users ?? [];
        $type = request()->route('type');
    @endphp

    @include('partials.dashboard.content', [
        'headers' => $headers,
        'data' => $users,
        'type' => $type
    ])
@endsection
