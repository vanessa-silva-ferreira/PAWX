
@extends('layouts.dashboard')

@section('content')
    <h1>Clients List</h1>

    @if($clients->isEmpty())
        <p>No clients found.</p>
    @else
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->client->id}}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone_number }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>
            {{ $clients->links() }}
        </div>
    @endif
@endsection
