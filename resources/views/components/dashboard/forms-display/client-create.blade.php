@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp
<div class="mx-10 my-10 bg-white">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-10 uppercase text-lime-500">Criar novo cliente</h1>

        <form action="{{ route('admin.clients.store') }}" method="POST">
            @csrf
            <div class="flex flex-col space-y-6">
                <div class="flex space-x-4">
                    <div class="flex-1 space-y-4">
                        <div>
                            <x-form.label for="name" class="text-gray-700 font-semibold">Name:</x-form.label>
                            <x-form.input type="text" name="name" value="{{ old('name') }}"
                                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300" required/>
                        </div>
                        <div>
                            <x-form.label for="email" class="text-gray-700 font-semibold">Email:</x-form.label>
                            <x-form.input type="email" id="email" name="email" value="{{ old('email') }}"
                                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300" required/>
                        </div>
                        <div>
                            <x-form.label for="password" class="text-gray-700 font-semibold">Password:</x-form.label>
                            <x-form.input type="password" id="password" name="password"
                                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300" required/>
                        </div>
                        <div>
                            <x-form.label for="username" class="text-gray-700 font-semibold">Username:</x-form.label>
                            <x-form.input type="text" id="username" name="username"
                                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300" />
                        </div>
                    </div>
                    <div class="flex-1 space-y-4">
                        <div>
                            <x-form.label for="phoneNumber" class="text-gray-700 font-semibold">Phone Number:</x-form.label>
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
                            <x-form.label for="nif" class="text-gray-700 font-semibold">NIF:</x-form.label>
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
                            <x-form.label for="password" class="text-gray-700 font-semibold">Confirm password:</x-form.label>
                            <x-form.input type="password" id="password" name="password"
                                          class="rounded h-8 bg-white w-full ring-1 ring-gray-300"/>
                        </div>
                        <div>
                            <x-form.label for="sex" class="text-gray-700 font-semibold">Sex:</x-form.label>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="sex" value="male" class="text-gray-700 font-semibold">
                                    <span class="text-gray-700 font-semibold">Masculino</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="sex" value="female" class="text-gray-700 font-semibold">
                                    <span class="text-gray-700 font-semibold">Feminino</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="sex" value="other" class="text-gray-700 font-semibold">
                                    <span class="text-gray-700 font-semibold">Outro</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <x-form.label for="address" class="text-gray-700 font-semibold">Address:</x-form.label>
                        <x-form.input type="text" id="address" name="address"
                                      class="rounded h-8 bg-white w-full ring-1 ring-gray-300"/>
                    </div>
                </div>

                <div class="space-y-4">
                    <x-form.button type="submit" class="w-full py-2 px-4 bg-lime-500 text-white font-medium rounded-md hover:text-lime-500 hover:bg-white hover:ring-1 hover:ring-lime-500">
                        Create client
                    </x-form.button>
                </div>
            </div>
        </form>
    </div>
</div>
