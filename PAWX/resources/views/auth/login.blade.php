
<link
    href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css"
    rel="stylesheet"
    type="text/css"
/>
<script src="https://cdn.tailwindcss.com"></script>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex items-center justify-center min-h-screen bg-gray-100">
                <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl
                md:flex-row md:space-y-0">
                    <div class="relative object-cover sm:hidden md:block">
                        <img src="{{asset('images/image.jpg')}}" alt="img" class="
                        w-[400px] h-full rounded-l-2xl"/>
                        <div class="absolute bottom-10 right-6 p-6 rounded drop-shadow-lg md:block">
                            <span class="text-white text-8xl">PAWX</span>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center p-8 md:p-14">
                        <div class="flex w-full">
                            <button class="bg-orange-500 text-white font-bold py-2 px-4 rounded-l-md">
                                Sign Up
                            </button>
                            <button class="bg-gray-200 text-gray-400 font-bold py-2 px-4 rounded-r-md">
                                Sign In
                            </button>
                        </div>

                        <div class="py-4">
                            <span class="mb-2 text-md text-orange-500">Email</span>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light
                            placeholder:text-gray-500 bg-white" name="email" id="email"/>
                        </div>
                        <div class="py-4">
                            <span class="mb-2 text-md text-orange-500">Password</span>
                            <input type="password" name="pass" id="pass2" class="w-full p-2 border border-gray-300 rounded-md
                            placeholder:font-light placeholder:text-gray-500 bg-white"/>
                        </div>
                        <div class="flex justify-between w-full py-4">
                            <div class="mr-24">
                                <input type="checkbox" name="ch" id="ch" class="mr-2"/>
                                <span class="text-md">Lembrar de mim</span>
                            </div>
                            <span class="font-bold text-md text-black">Esqueci-me da password</span>
                        </div>
                        <button class="w-full bg-orange-500 text-white p-2 rounded-lg
                        mb-6 hover:bg-white hover:text-orange-500 hover:border hover:border-orange-500">
                            Log in
                        </button>
                        <button class="w-full border border-orange-500 text-md text-black p-2 rounded-lg mb-6
                        hover:bg-black hover:text-white">
                            Sign in with Google
                        </button>
                    </div>
                </div>
            </div>
        </form>
