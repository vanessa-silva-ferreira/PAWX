
<link
    href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css"
    rel="stylesheet"
    type="text/css"
/>
<script src="https://cdn.tailwindcss.com"></script>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl
                    md:flex-row md:space-y-0">
            <div class="flex flex-col justify-center p-8 md:p-14">
                <div class="flex w-full justify-center">
                    <x-form.button url="{{ route('login') }}" class="bg-gray-300 text-orange-600 font-bold py-2 px-4 rounded-l">
                        Login
                    </x-form.button>
                    <x-form.button class="bg-orange-600 text-white font-bold py-2 px-4 rounded-r">
                        Register
                    </x-form.button>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="py-4 px-6">
                    <x-form.span class="text-orange-600" >Email</x-form.span>
                    <x-form.input name="password" type="password" placeholder="Enter your email"
                                  class="border bg-white w-full border-orange-600 rounded p-2"
                    />
                </div>
                <div class="py-4 px-6">
                    <x-form.span class="text-orange-600">Password</x-form.span>
                    <x-form.input name="password" type="password" placeholder="Enter your password"
                                  class="border bg-white w-full border-orange-600 rounded p-2"
                    />
                </div>
                <div class="py-4 px-6">
                    <x-form.span class="text-orange-600">Password</x-form.span>
                    <x-form.input name="password" type="password" placeholder="Confirm your password"
                                  class="border bg-white w-full border-orange-600 rounded p-2"
                    />
                </div>
                <div class="flex justify-center w-full px-6">
                    <x-form.button class="bg-orange-600 text-white font-bold py-2 px-4 rounded">
                        Register
                    </x-form.button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>

