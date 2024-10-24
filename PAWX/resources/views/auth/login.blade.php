
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
            <div class="relative object-cover hidden sm:hidden md:block">
                <img src="{{asset('images/home.jpg')}}" alt="img" class="
                            w-fit h-full rounded-l-2xl"/>
                <div class="absolute top-10 left-6 p-6 rounded drop-shadow-lg">
                    <h1 class="text-8xl text-white font-bold font-sans">PAWX</h1>
                </div>
            </div>
            <div class="flex flex-col justify-center p-8 md:p-14">
                <div class="flex w-full justify-center">
                    <button class="bg-orange-500 text-white font-bold py-2 px-4 rounded-l-md">
                        Login
                    </button>
                    <button class="bg-gray-200 text-gray-400 font-bold py-2 px-4 rounded-r-md">
                        Registar-se
                    </button>
                </div>

                <div class="py-4 px-6">
                    <span class="mb-2 text-md text-orange-500">Email</span>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light
                                placeholder:text-gray-500 bg-white" name="email" id="email"/>
                </div>
                <div class="py-4 px-6">
                    <span class="mb-2 text-md text-orange-500">Password</span>
                    <input type="password" name="pass" id="pass2" class="w-full p-2 border border-gray-300 rounded-md
                                placeholder:font-light placeholder:text-gray-500 bg-white"/>
                </div>
                <div class="flex justify-between w-full py-4 px-6">
                    <div class="mr-24">
                        <input type="checkbox" name="ch" id="ch" class="mr-2"/>
                        <span class="text-md">Lembrar de mim</span>
                    </div>
                    <span class="font-bold text-md text-black">Esqueci-me da password</span>
                </div>
                <div class="flex justify-between w-full px-6">
                    <button class="w-full bg-orange-500 text-white p-2 rounded-lg
                                mb-6 hover:bg-white hover:text-orange-500 hover:border hover:border-orange-500">
                        Log in
                    </button>
                </div>
                <div class="flex space-x-4 justify-center">
                    <button class="bg-orange-400 rounded hover:bg-white px-4 py-2">
                        <img src="{{asset('images/google-brands-solid.svg')}}" alt="google" class="w-6 h-6">
                    </button>
                    <button class="bg-orange-400 rounded hover:bg-white px-4 py-2">
                        <img src="{{asset('images/apple-brands-solid.svg')}}" alt="apple" class="w-6 h-6">
                    </button>
                    <button class="bg-orange-400 rounded hover:bg-white px-4 py-2">
                        <img src="{{asset('images/facebook-brands-solid.svg')}}" alt="facebook" class="w-6 h-6">
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>

