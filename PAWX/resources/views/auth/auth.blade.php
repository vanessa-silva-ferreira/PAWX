<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/auth.js'])
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
                        <button id="signin-btn" class="toggle-btn flex-1 py-2 px-6 text-center font-semibold text-sm">Iniciar Sessão
                        </button>
                        <button id="signup-btn" class="toggle-btn flex-1 py-2 px-6 text-center font-semibold text-sm">Registar
                        </button>
                    </div>
                </div>

                <form method="POST" id="signin-form" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    <div>
                        <x-auth.label for="login">E-mail ou Contacto</x-auth.label>
                        <x-auth.input id="login" type="text" name="login" placeholder="Insira o seu E-mail ou Contacto"
                                      value="{{ old('login') }}" required autofocus />
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
                        ['src' => 'https://1000logos.net/wp-content/uploads/2016/11/Google-Symbol-640x400.png', 'alt' => 'Google'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/512px-Apple_logo_black.svg.png', 'alt' => 'Apple'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/512px-Microsoft_logo.svg.png', 'alt' => 'Microsoft']
                    ]" dividerText="OU"></x-auth.social-buttons>
                    <a href="{{ route('google.redirect') }}" class="btn btn-primary"> Login with Google </a>



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
                        <x-auth.label for="phone_number">Contacto</x-auth.label>
                        <x-auth.input id="phone_number" type="phone_number" name="phone_number" placeholder="Insira o seu Contacto"
                                      value="{{ old('phone_number') }}" required autofocus/>
                        <x-form.validation-error name="phone_number"/>
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
        </div>
    </div>
</div>
</body>
</html>
