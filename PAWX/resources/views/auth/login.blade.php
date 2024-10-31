
<link
    href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css"
    rel="stylesheet"
    type="text/css"
/>
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 shadow-lg rounded-lg">
        <h1 class="font-bold text-orange-500 w-full text-center">Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <x-form.label for="email" class="block text-sm font-medium text-gray-700">Email</x-form.label>
                <x-form.input id="email" type="email" name="email" class="mt-1 block w-full px-3 py-2 border bg-white border-black rounded" value="{{ old('email') }}" required autofocus/>
                <x-form.validation-error name="email"/>
            </div>

            <div class="mb-4">
                <x-form.label for="password" class="block text-sm font-medium text-gray-700">Password</x-form.label>
                <x-form.input id="password" type="password" name="password" class="mt-1 block w-full px-3 py-2 border bg-white border-black rounded" required/>
                <x-form.validation-error name="password"/>
            </div>

            <div class="mb-4 flex items-center">
                <x-form.input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"/>
                <x-form.label for="remember" class="ml-2 block text-sm text-gray-900">Remember Me</x-form.label>
            </div>

            <div>
                <x-form.button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Log in
                </x-form.button>
            </div>
        </form>
    </div>
</div>
