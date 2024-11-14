@extends('layouts.dashboard')

@php
    //    $title = ['title' => 'TEST'];
        $menuItems = [
            [
                'href' => route('admin.dashboard'),
                'icon' => 'M148.644 390.928V329.593C148.644 313.993 161.362 301.317 177.12 301.212H234.842C250.675 301.212 263.51 313.919 263.51 329.593V391.119C263.506 404.364 274.185 415.19 287.561 415.5H326.042C364.402 415.5 395.5 384.714 395.5 346.737V172.257C395.295 157.317 388.21 143.287 376.26 134.161L244.654 29.206C221.599 10.9313 188.824 10.9313 165.768 29.206L34.7405 134.351C22.7452 143.44 15.6477 157.493 15.5 172.447V346.737C15.5 384.714 46.5975 415.5 84.9582 415.5H123.439C137.147 415.5 148.259 404.499 148.259 390.928',
                'label' => 'Dashboard'
            ],
            [
                'href' => '#',
                'icon' => 'M185.5 332.453C298.285 332.453 350.461 317.984 355.5 259.91C355.5 201.876 319.123 205.608 319.123 134.402C319.123 78.7828 266.405 15.5 185.5 15.5C104.595 15.5 51.8769 78.7828 51.8769 134.402C51.8769 205.608 15.5 201.876 15.5 259.91C20.559 318.204 72.7355 332.453 185.5 332.453Z',
                'label' => 'Notificações',
    //            'notification' => '8'
            ],
            [
                'href' => '#',
                'icon' => '#',
                'label' => 'Relatórios'
            ],
              [
                'href' => '#',
                'icon' => '',
                'label' => 'Ver mais'
            ],
        ];

            $workspaceItems = [
            [
                'href' => route('admin.dashboard'),
                'icon' => 'M148.644 390.928V329.593C148.644 313.993 161.362 301.317 177.12 301.212H234.842C250.675 301.212 263.51 313.919 263.51 329.593V391.119C263.506 404.364 274.185 415.19 287.561 415.5H326.042C364.402 415.5 395.5 384.714 395.5 346.737V172.257C395.295 157.317 388.21 143.287 376.26 134.161L244.654 29.206C221.599 10.9313 188.824 10.9313 165.768 29.206L34.7405 134.351C22.7452 143.44 15.6477 157.493 15.5 172.447V346.737C15.5 384.714 46.5975 415.5 84.9582 415.5H123.439C137.147 415.5 148.259 404.499 148.259 390.928',
                'label' => 'Dashboard'
            ],
            [
                'href' => '#',
                'icon' => 'M185.5 332.453C298.285 332.453 350.461 317.984 355.5 259.91C355.5 201.876 319.123 205.608 319.123 134.402C319.123 78.7828 266.405 15.5 185.5 15.5C104.595 15.5 51.8769 78.7828 51.8769 134.402C51.8769 205.608 15.5 201.876 15.5 259.91C20.559 318.204 72.7355 332.453 185.5 332.453Z',
                'label' => 'Notificações',
    //            'notification' => '8'
            ],
            [
                'href' => '#',
                'icon' => '#',
                'label' => 'Relatórios'
            ],
              [
                'href' => '#',
                'icon' => '',
                'label' => 'Ver mais'
            ],
        ];
@endphp

@section('content')

<!-- Form Box -->
<div class="w-4/5 bg-white p-16 shadow-lg rounded-lg">
    <form action="{{ route('admin.show', $type) }}" method="POST" class="space-y-8 flex flex-col items-center">
        @csrf
        <div class="flex-1 p-8 flex flex-col items-center space-y-4">
        <x-form.title>CREATE {{ ucfirst($type) }}</x-form.title>
        </div>
        <div class="flex space-x-4 w-full">
            <div class="flex-1 space-y-4">
                <div>
                    <x-form.label for="name" class="text-orange-600 font-bold">Name:</x-form.label>
                    <x-form.input type="text" name="name" value="{{ old('name') }}"
                                  class="rounded h-8 bg-white w-full ring-1 ring-gray-300" required/>
                </div>
                <div>
                    <x-form.label for="email" class="text-orange-600 font-bold">Email:</x-form.label>
                    <x-form.input type="email" id="email" name="email" value="{{ old('email') }}"
                                  class="rounded h-8 bg-white w-full ring-1 ring-gray-300" required/>
                </div>
                <div>
                    <x-form.label for="password" class="text-orange-600 font-bold">Password:</x-form.label>
                    <x-form.input type="password" id="password" name="password"
                                  class="rounded h-8 bg-white w-full ring-1 ring-gray-300" required/>
                </div>
                <div>
                    <x-form.label for="username" class="text-orange-600 font-bold">Username:</x-form.label>
                    <x-form.input type="text" id="username" name="username"
                                  class="rounded h-8 bg-white w-full ring-1 ring-gray-300" />
                </div>
            </div>
            <div class="flex-1 space-y-4">
                <div>
                    <x-form.label for="phoneNumber" class="text-orange-600 font-bold">Phone Number:</x-form.label>
                    <x-form.input
                        type="tel"
                        id="phone_number"
                        name="phone_number"
                        class="rounded h-8 bg-white w-full ring-1 ring-gray-300"
                        pattern="^9[0-9]{8}$"
                        title="Phone number must be exactly 9 digits and start with 9"
                        inputmode="numeric"
                        maxlength="9"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 9);"
                    />
                </div>
                <div>
                    <x-form.label for="nif" class="text-orange-600 font-bold">NIF:</x-form.label>
                    <x-form.input
                        type="tel"
                        id="nif"
                        name="nif"
                        class="rounded h-8 bg-white w-full ring-1 ring-gray-300"
                        pattern="^[0-9]{9}$"
                        title="NIF must be exactly 9 digits"
                        inputmode="numeric"
                        maxlength="9"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 9);"
                    />
                </div>
                <div>
                    <x-form.label for="password" class="text-orange-600 font-bold">Confirm password:</x-form.label>
                    <x-form.input type="password" id="password" name="password"
                                  class="rounded h-8 bg-white w-full ring-1 ring-gray-300"/>
                </div>
                <div>
                    <x-form.label for="sex" class="text-orange-600">Sex:</x-form.label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="sex" value="male" class="text-orange-600">
                            <span class="text-orange-600">Male</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="sex" value="female" class="text-orange-600">
                            <span class="text-orange-600">Female</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="sex" value="other" class="text-orange-600">
                            <span class="text-orange-600">Other</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full">
            <x-form.label for="address" class="text-orange-600 font-bold">Address:</x-form.label>
            <x-form.input type="text" id="address" name="address"
                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300"/>
        </div>
        <x-form.button type="submit" class="w-full py-2 px-4 bg-orange-600 text-white font-medium rounded-md hover:text-orange-600 hover:bg-white hover:ring-1 hover:ring-orange-600">
            Create client
        </x-form.button>
    </form>
</div>

@endsection
