@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.clients.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>

    <button type="submit">Create Client</button>
</form>
