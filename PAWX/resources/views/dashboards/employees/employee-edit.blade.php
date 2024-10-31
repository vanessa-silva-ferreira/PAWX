
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--<title>Edit {{ ucfirst($type) }}</title>--}}
<!-- You can include your CSS here -->
<style>
    /* Add some basic styling */
    body { font-family: Arial, sans-serif; margin: 20px; }
    .form-group { margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; }
    input[type="text"], input[type="email"], input[type="password"] { width: 300px; padding: 5px; }
    .alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; }
    .alert-danger { color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; }
    .alert-success { color: #155724; background-color: #d4edda; border-color: #c3e6cb; }
</style>
<h1>Edit {{ ucfirst($type) }}</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.update', ['type' => $type, 'id' => $user->id]) }}" method="POST">
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}">
    </div>

    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}">
    </div>

    <div class="form-group">
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
    </div>

    <div class="form-group">
        <label for="nif">NIF:</label>
        <input type="text" id="nif" name="nif" value="{{ old('nif', $user->nif) }}">
    </div>

    <div class="form-group">
        <label for="password">New Password (leave blank to keep current):</label>
        <input type="password" id="password" name="password">
    </div>

    <button type="submit">Update {{ ucfirst($type) }}</button>
</form>

<a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>

<!-- You can include your JavaScript here -->
<script>
    // Add any JavaScript you need
</script>
