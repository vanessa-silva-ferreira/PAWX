
<link
    href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css"
    rel="stylesheet"
    type="text/css"
/>
<script src="https://cdn.tailwindcss.com"></script>
{{--<div class="min-h-screen flex items-center justify-center bg-gray-100 py-6 px-4 sm:px-6 lg:px-8">--}}
{{--    <div class="max-w-md w-full space-y-8 bg-white p-8 shadow-lg rounded-lg">--}}
{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}
{{--            <div class="mb-4">--}}
{{--                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>--}}
{{--                <input id="email" type="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('email') }}" required autofocus>--}}
{{--            </div>--}}

{{--            <div class="mb-4">--}}
{{--                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>--}}
{{--                <input id="password" type="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>--}}
{{--            </div>--}}

{{--            <div class="mb-4 flex items-center">--}}
{{--                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">--}}
{{--                <label for="remember" class="ml-2 block text-sm text-gray-900">Remember Me</label>--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                    Log in--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX - Sign Up / Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'pawx-orange': '#DF6B2C',
                        'pawx-grey': '#ECECEC',
                        'pawx-brown': '#322C28',
                    }
                }
            }
        }
    </script>
    <style>
        .toggle-container {
            position: relative;
            background-color: #ECECEC;
            border-radius: 6px;
            padding: 2px;
        }
        .toggle-bg {
            position: absolute;
            top: 2px;
            left: 2px;
            width: calc(50% - 2px);
            height: calc(100% - 4px);
            background-color: #DF6B2C;
            border-radius: 4px;
            transition: transform 0.3s ease;
        }
        .toggle-bg.signin {
            transform: translateX(calc(100% + 4px));
        }
        .toggle-btn {
            position: relative;
            z-index: 1;
            transition: color 0.3s ease;
        }
        .social-btn {
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body class="bg-white flex flex-col min-h-screen">
<div class="flex-grow flex flex-col md:flex-row w-full max-w-6xl mx-auto">
    <!-- Image section -->
    <div class="w-full md:w-1/2 bg-gradient-to-b from-pawx-orange/30 to-pawx-orange p-8 md:p-12 text-white flex flex-col justify-between">
        <h1 class="text-4xl md:text-6xl font-bold mb-4 md:mb-0">PAWX</h1>
        <div class="hidden md:block">
            <h2 class="text-2xl md:text-3xl font-semibold mb-4">Seamless Collaboration</h2>
            <p class="text-lg md:text-xl">Effortlessly work together with your team in real-time.</p>
        </div>
        <div class="hidden md:flex mt-4 md:mt-8">
            <div class="w-8 h-2 bg-white rounded-full mr-2"></div>
            <div class="w-2 h-2 bg-white bg-opacity-50 rounded-full mr-2"></div>
            <div class="w-2 h-2 bg-white bg-opacity-50 rounded-full"></div>
        </div>
    </div>

    <!-- Form section -->
    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white">
        <div class="w-full max-w-sm mx-auto">
            <div class="toggle-container mb-8">
                <div class="toggle-bg"></div>
                <div class="flex">
                    <button class="toggle-btn flex-1 py-2 px-6 text-center font-semibold text-sm" onclick="toggleForm('signup')">Sign Up</button>
                    <button class="toggle-btn flex-1 py-2 px-6 text-center font-semibold text-sm" onclick="toggleForm('signin')">Sign In</button>
                </div>
            </div>

            <form id="signup-form" class="space-y-4">
                <div>
                    <label for="email" class="block text-pawx-brown mb-1 text-sm">Email Id</label>
                    <input type="email" id="email" class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-2 focus:ring-pawx-orange bg-white" placeholder="Enter your email">
                </div>

                <div>
                    <label for="password" class="block text-pawx-brown mb-1 text-sm">Password</label>
                    <input type="password" id="password" class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-2 focus:ring-pawx-orange bg-white" placeholder="Enter Password">
                    <div class="flex justify-between mt-1">
                        <span class="text-xs text-gray-500">Password Strength: Weak</span>
                        <a href="#" class="text-xs text-pawx-orange">Forgot Password?</a>
                    </div>
                </div>

                <ul class="text-xs text-gray-500 space-y-1">
                    <li class="flex items-center"><svg class="w-4 h-4 mr-1 text-pawx-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Cannot contain your name or email address</li>
                    <li class="flex items-center"><svg class="w-4 h-4 mr-1 text-pawx-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>At least 8 characters</li>
                    <li class="flex items-center"><svg class="w-4 h-4 mr-1 text-pawx-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Contains a number or symbol</li>
                </ul>

                <button type="submit" class="w-full bg-pawx-orange text-white py-2 px-4 rounded-md font-semibold hover:bg-pawx-orange/90 transition duration-300">Create Account</button>
            </form>

            <form id="signin-form" class="space-y-4 hidden">
                <div>
                    <label for="signin-email" class="block text-pawx-brown mb-1 text-sm">Email Id</label>
                    <input type="email" id="signin-email" class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-2 focus:ring-pawx-orange bg-white" placeholder="Enter your email">
                </div>

                <div>
                    <label for="signin-password" class="block text-pawx-brown mb-1 text-sm">Password</label>
                    <input type="password" id="signin-password" class="w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-2 focus:ring-pawx-orange bg-white" placeholder="Enter Password">
                    <div class="flex justify-end mt-1">
                        <a href="#" class="text-xs text-pawx-orange">Forgot Password?</a>
                    </div>
                </div>

                <button type="submit" class="w-full bg-pawx-orange text-white py-2 px-4 rounded-md font-semibold hover:bg-pawx-orange/90 transition duration-300">Sign In</button>
            </form>

            <div class="flex justify-center space-x-4 mt-4">
                <button class="social-btn border border-pawx-grey rounded-md p-2 hover:bg-pawx-grey/50 transition duration-300">
                    <img src="/api/placeholder/24/24" alt="Google" class="w-6 h-6">
                </button>
                <button class="social-btn border border-pawx-grey rounded-md p-2 hover:bg-pawx-grey/50 transition duration-300">
                    <img src="/api/placeholder/24/24" alt="Apple" class="w-6 h-6">
                </button>
                <button class="social-btn border border-pawx-grey rounded-md p-2 hover:bg-pawx-grey/50 transition duration-300">
                    <img src="/api/placeholder/24/24" alt="Microsoft" class="w-6 h-6">
                </button>
            </div>
        </div>

        <p class="text-xs text-center mt-6 text-gray-500">
            By signing up, you agree to accept Company's <a href="#" class="text-pawx-orange">Terms of use</a> & <a href="#" class="text-pawx-orange">Privacy Policy</a>
        </p>
    </div>
</div>

<script>
    function toggleForm(type) {
        const bg = document.querySelector('.toggle-bg');
        const buttons = document.querySelectorAll('.toggle-btn');
        const signupForm = document.getElementById('signup-form');
        const signinForm = document.getElementById('signin-form');

        if (type === 'signin') {
            bg.classList.add('signin');
            buttons[0].classList.remove('text-white');
            buttons[0].classList.add('text-pawx-brown');
            buttons[1].classList.remove('text-pawx-brown');
            buttons[1].classList.add('text-white');
            signupForm.classList.add('hidden');
            signinForm.classList.remove('hidden');
        } else {
            bg.classList.remove('signin');
            buttons[0].classList.add('text-white');
            buttons[0].classList.remove('text-pawx-brown');
            buttons[1].classList.add('text-pawx-brown');
            buttons[1].classList.remove('text-white');
            signupForm.classList.remove('hidden');
            signinForm.classList.add('hidden');
        }
    }

    // Initialize the toggle state
    toggleForm('signup');
</script>
</body>
</html>
