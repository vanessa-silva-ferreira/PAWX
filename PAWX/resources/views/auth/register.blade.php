<p>Register Account</p>

<script src="https://cdn.tailwindcss.com"></script>

<form method="POST" action="{{ url('register') }}" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg">
    @csrf
    <x-form.input ref="name" title="Name" placeholder="Enter your name" />
    <x-form.input ref="email" title="Email" type="email" placeholder="Enter your email" />
    <x-form.input ref="password" title="Password" type="password" placeholder="Enter your password" />
</form>






