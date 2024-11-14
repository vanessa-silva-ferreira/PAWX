
@extends('layouts.employee')

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

                    <td>
                        <a href="{{ route('admin.clients.show', $client->client->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('admin.clients.edit', $client->client->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>
            {{ $clients->links() }}
        </div>
    @endif
@endsection
