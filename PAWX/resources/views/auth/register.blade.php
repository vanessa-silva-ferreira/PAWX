<p>Register Account</p>

<script src="https://cdn.tailwindcss.com"></script>

<form method="POST" action="{{ url('register') }}" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg">
    @csrf


    <div class="mb-4">
        <x-form.label for="email" class="block text-sm font-medium text-gray-700">Email</x-form.label>
        <x-form.input id="email" type="email" name="email" class="mt-1 block w-full px-3 py-2 border bg-white border-black rounded" value="{{ old('email') }}" required autofocus/>
        <x-form.validation-error name="email"/>
    </div>

    <div class="mb-4">
        <x-form.label for="name" class="block text-sm font-medium text-gray-700">Name</x-form.label>
        <x-form.input id="name" name="name" class="mt-1 block w-full px-3 py-2 border bg-white border-black rounded" value="{{ old('name') }}" required autofocus/>
        <x-form.validation-error name="name"/>
    </div>
{{--    <x-form.input ref="name" title="Name" placeholder="Enter your name" />--}}
    <div class="mb-4">
        <x-form.label for="password" class="block text-sm font-medium text-gray-700">Password</x-form.label>
        <x-form.input id="password" type="password" name="password" class="mt-1 block w-full px-3 py-2 border bg-white border-black rounded" required/>
        <x-form.validation-error name="password"/>
    </div>

    <div class="mb-4">
        <x-form.label for="password" class="block text-sm font-medium text-gray-700">Confirme a Password</x-form.label>
        <x-form.input id="password" type="password" name="password" class="mt-1 block w-full px-3 py-2 border bg-white border-black rounded" required/>
        <x-form.validation-error name="password"/>
    </div>
{{--    <x-form.input ref="email" title="Email" type="email" placeholder="Enter your email" />--}}
{{--    <x-form.input ref="password" title="Password" type="password" placeholder="Enter your password" />--}}
{{--    <x-form.input ref="password" title="Password" type="password" placeholder="Re-enter your password" />--}}

    <x-form.button type="submit"
            class="w-full py-2 px-4 bg-indigo-600 text-white font-bold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        Register
    </x-form.button>
</form>
