@extends('layouts.admin')

@section('content')


    <div class="flex justify-center items-center min-h-screen bg-white-100">
        <div class="w-full max-w-md bg-white p-8 border border-gray-200">
            <h1 class="text-2xl font-semibold mb-6 text-gray-800">Edit {{ ucfirst($type) }}</h1>

            @if (session('success'))
                <div class="bg-white border-l-4 border-gray-500 text-gray-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-4 mb-4" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.update', ['type' => $type, 'id' => $user->id]) }}" method="POST" class="space-y-4">
                @csrf
                @method('POST')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1 block w-full rounded-md border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address:</label>
                    <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number:</label>
                    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="nif" class="block text-sm font-medium text-gray-700">NIF:</label>
                    <input type="text" id="nif" name="nif" value="{{ old('nif', $user->nif) }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">New Password (leave blank to keep current):</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50">
                </div>

                <div class="flex items-center justify-between mt-6">
                    <button type="submit" class="bg-white hover:bg-white text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                        Update {{ ucfirst($type) }}
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-800">Back to Dashboard</a>
                </div>
            </form>
        </div>
    </div>

@endsection


