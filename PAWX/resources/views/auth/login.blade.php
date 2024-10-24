
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
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl
                    md:flex-row md:space-y-0">
            <div class="flex flex-col justify-center p-8 md:p-14">
                <div class="flex w-full justify-center">
                    <x-form.button type="submit">
                        Log in
                    </x-form.button>
                    <x-form.button type="submit">
                        Registe-se
                    </x-form.button>
                </div>

                <div class="py-4 px-6">
                    <x-form.span>Email</x-form.span>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light
                                placeholder:text-gray-500 bg-white" name="email" id="email"/>
                </div>
                <div class="py-4 px-6">
                    <x-form.span>Password</x-form.span>
                    <input type="password" name="pass" id="pass2" class="w-full p-2 border border-gray-300 rounded-md
                                placeholder:font-light placeholder:text-gray-500 bg-white"/>
                </div>
                <div class="flex justify-between w-full py-4 px-6">
                    <div class="mr-24">
                        <input type="checkbox" name="ch" id="ch" class="mr-2"/>
                        <span class="text-md">Lembrar de mim</span>
                    </div>
                    {{--<x-form.link href="{{ route('password.request') }}">
                        Forgot your password?
                    </x-form.link>--}}
                </div>
                <div class="flex justify-between w-full px-6">
                    <x-form.button type="submit" class="additional-classes">
                        Log in
                    </x-form.button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>

