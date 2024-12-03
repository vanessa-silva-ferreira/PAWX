<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>

<body class="bg-white flex flex-col min-h-screen">
<div class="flex-grow flex flex-col md:flex-row w-full max-w-6xl mx-auto">
    <div
        class="w-full md:w-1/2 p-8 md:rounded-3xl md:mt-12 md:mb-12 md:ml-12 md:p-12 text-white flex flex-col justify-between relative"
        id="carousel-container">
        <h1 class="text-6xl md:text-8xl font-bold mb-4 md:mb-0">PAWX</h1>
    </div>


    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white">
        <div class="w-full max-w-sm mx-auto flex flex-col justify-between md:mt-40 mt-0" style="height: 100%;">
            <div>
                <div class="toggle-container mb-8">
                    <div class="toggle-bg"></div>
                    <div class="flex">
                        <button class="toggle-btn flex-1 py-2 px-6 text-center font-semibold text-sm"
                                onclick="toggleForm('signin')">Iniciar Sessão
                        </button>
                        <button class="toggle-btn flex-1 py-2 px-6 text-center font-semibold text-sm"
                                onclick="toggleForm('signup')">Registar
                        </button>
                    </div>
                </div>

                <form method="POST" id="signin-form" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    <div>
                        <x-auth.label for="email">E-mail</x-auth.label>
                        <x-auth.input id="email" type="email" name="email" placeholder="Insira o seu E-mail"
                                      value="{{ old('email') }}" required autofocus/>
                    </div>
                    <div>
                        <x-auth.label for="password">Palavra-passe</x-auth.label>
                        <x-auth.input id="password" type="password" name="password"
                                      placeholder="Insira a sua Palavra-passe"
                                      required/>
                        <div class="flex justify-end mt-1 mb-5">
                            <x-auth.link href="#">Esqueceu-se da Palavra-passe?</x-auth.link>
                        </div>
                    </div>

                    <div class="h-6">
                        @if ($errors->has('styled_error_email'))
                            {!! $errors->first('styled_error_email') !!}
                        @endif
                    </div>

                    <x-auth.social-buttons :buttons="[
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png', 'alt' => 'Google'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/512px-Apple_logo_black.svg.png', 'alt' => 'Apple'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/512px-Microsoft_logo.svg.png', 'alt' => 'Microsoft']
                    ]" dividerText="OU"></x-auth.social-buttons>


                    <div class="h-6">
                    </div>
                    <x-auth.action-button type="submit">Iniciar Sessão</x-auth.action-button>
                </form>

                <form method="POST" id="signup-form" action="{{ url('register') }}" class="space-y-4 hidden">
                    @csrf
                    <div>
                        <x-auth.label for="email">E-mail</x-auth.label>
                        <x-auth.input id="email" type="email" name="email" placeholder="Insira o seu E-mail"
                                      value="{{ old('email') }}" required autofocus/>
                        <x-form.validation-error name="email"/>
                    </div>
                    <div>
                        <x-auth.label for="name">Nome</x-auth.label>
                        <x-auth.input id="name" type="name" name="name" placeholder="Insira o seu Nome"
                                      value="{{ old('name') }}" required autofocus/>
                        <x-form.validation-error name="name"/>
                    </div>
                    <div>
                        <x-form.label for="password" class="block text-pawx-brown mb-1 text-sm">Palavra-passe
                        </x-form.label>
                        <x-auth.input id="password" type="password" name="password"
                                      placeholder="Insira a sua Palavra-passe"
                                      required autofocus/>
                        <x-auth.input id="password_confirmation" type="password" name="password_confirmation"
                                      class="mt-3"
                                      placeholder="Confirme a sua Palavra-passe"
                                      required/>
                        <x-form.validation-error name="password"/>
                    </div>

                    <div class="h-6">
                        @if ($errors->has('styled_error_email'))
                            {!! $errors->first('styled_error_email') !!}
                        @endif
                    </div>

                    <x-auth.social-buttons :buttons="[
                        ['src' => 'https://1000logos.net/wp-content/uploads/2016/11/Google-Symbol-640x400.png', 'alt' => 'G'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/512px-Apple_logo_black.svg.png', 'alt' => 'Apple'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/512px-Microsoft_logo.svg.png', 'alt' => 'Microsoft']
                    ]" dividerText="OU"></x-auth.social-buttons>

                    <div class="h-6">
                    </div>

                    <x-auth.action-button type="submit">Registar Conta</x-auth.action-button>

                </form>
            </div>


            {{--                        <div class="flex justify-between mt-1">--}}
            {{--                            <span class="text-xs text-gray-500">Password Strength: Weak</span>--}}
            {{--                            <a href="#" class="text-xs text-pawx-orange">Forgot Password?</a>--}}
            {{--                        </div>--}}

            {{--                    <ul class="text-xs text-gray-500 space-y-1">--}}
            {{--                        <li class="flex items-center"><svg class="w-4 h-4 mr-1 text-pawx-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Cannot contain your name or email address</li>--}}
            {{--                        <li class="flex items-center"><svg class="w-4 h-4 mr-1 text-pawx-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>At least 8 characters</li>--}}
            {{--                        <li class="flex items-center"><svg class="w-4 h-4 mr-1 text-pawx-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Contains a number or symbol</li>--}}
            {{--                    </ul>--}}

        </div>
    </div>
</div>
<script>
    setRandomBackgroundImage();

    function toggleForm(type) {
        const bg = document.querySelector('.toggle-bg');
        const buttons = document.querySelectorAll('.toggle-btn');
        const signupForm = document.getElementById('signup-form');
        const signinForm = document.getElementById('signin-form');

        if (type === 'signup') {
            bg.classList.add('signup');
            buttons[0].classList.remove('text-white');
            buttons[0].classList.add('text-pawx-brown');
            buttons[1].classList.remove('text-pawx-brown');
            buttons[1].classList.add('text-white');
            signinForm.classList.add('hidden');
            signupForm.classList.remove('hidden');
        } else {
            bg.classList.remove('signup');
            buttons[0].classList.add('text-white');
            buttons[0].classList.remove('text-pawx-brown');
            buttons[1].classList.add('text-pawx-brown');
            buttons[1].classList.remove('text-white');
            signupForm.classList.add('hidden');
            signinForm.classList.remove('hidden');
        }
    }

    toggleForm('signin');
</script>
</body>
</html>
