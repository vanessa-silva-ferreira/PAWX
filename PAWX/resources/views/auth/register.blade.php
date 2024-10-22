<p>Register Account</p>

<script src="https://cdn.tailwindcss.com"></script>

<form method="POST" action="{{ url('register') }}" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg">
    @csrf
    <x-form.input ref="name" title="Name" placeholder="Enter your name" />
    <x-form.input ref="email" title="Email" type="email" placeholder="Enter your email" />
    <x-form.input ref="password" title="Password" type="password" placeholder="Enter your password" />

    <button type="submit"
            class="w-full py-2 px-4 bg-indigo-600 text-white font-bold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        Register
    </button>
</form>





