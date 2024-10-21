<p>Register Account</p>


<form method="POST" action="{{ url('register') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

    </div>
    <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
</form>
