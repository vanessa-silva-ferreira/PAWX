@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Client Details</h1>
        @if ($client)
            <div class="client-details">
{{--                <p><strong>ID:</strong> {{ $client->client->id }}</p>--}}

                <td>{{$client->id}}</td>
                <td>{{ $client->user->name }}</td>
                <td>{{ $client->user->email }}</td>
                <td>{{ $client->user->phone_number }}</td>
                <a href="{{ route('admin.clients.index') }}" class="btn btn-primary">Back to Clients</a>
            </div>
        @else
            <p>No employee data available.</p>
        @endif
    </div>
@endsection
