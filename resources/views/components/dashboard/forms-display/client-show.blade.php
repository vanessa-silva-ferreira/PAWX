@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp
<div class="mx-10 my-10 bg-white">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-10 uppercase text-lime-500">Detalhes do cliente</h1>

        <div class="container mx-auto px-4 lg:px-5">
            <form>
                <div class="flex flex-col space-y-6">
                    <div class="flex space-x-4">
                        <!-- Left Column -->
                        <div class="flex-1 space-y-4">
                            <div>
                                <x-form.label for="name" class="text-gray-700 font-semibold">Name:</x-form.label>
                                <x-form.input type="text" name="name" value="{{ $client->user->name }}"
                                              class="rounded h-8 bg-gray-100 w-full ring-1 ring-gray-300" disabled/>
                            </div>
                            <div>
                                <x-form.label for="email" class="text-gray-700 font-semibold">Email:</x-form.label>
                                <x-form.input type="email" id="email" name="email" value="{{ $client->user->email }}"
                                              class="rounded h-8 bg-gray-100 w-full ring-1 ring-gray-300" disabled/>
                            </div>
                            <div>
                                <x-form.label for="username" class="text-gray-700 font-semibold">Username:</x-form.label>
                                <x-form.input type="text" id="username" name="username" value=""
                                              class="rounded h-8 bg-gray-100 w-full ring-1 ring-gray-300" disabled/>
                            </div>
                        </div>
                        <div class="flex-1 space-y-4">
                            <div>
                                <x-form.label for="phoneNumber" class="text-gray-700 font-semibold">Phone Number:</x-form.label>
                                <x-form.input type="tel" id="phone_number" name="phone_number" value="{{ $client->user->phone_number }}"
                                              class="rounded h-8 bg-gray-100 w-full ring-1 ring-gray-300" disabled/>
                            </div>
                            <div>
                                <x-form.label for="nif" class="text-gray-700 font-semibold">NIF:</x-form.label>
                                <x-form.input type="tel" id="nif" name="nif" value=""
                                              class="rounded h-8 bg-gray-100 w-full ring-1 ring-gray-300" disabled/>
                            </div>
                            <div>
                                <x-form.label for="sex" class="text-gray-700 font-semibold">Sex:</x-form.label>
                                <div class="flex items-center space-x-4">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="sex" value="male"
                                                disabled>
                                        <span class="text-gray-700 font-semibold">Masculino</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="sex" value="female"
                                               disabled>
                                        <span class="text-gray-700 font-semibold">Feminino</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="sex" value="other"
                                               disabled>
                                        <span class="text-gray-700 font-semibold">Outro</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <x-form.label for="address" class="text-gray-700 font-semibold">Address:</x-form.label>
                            <x-form.input type="text" id="address" name="address" value="{{ $client->user->address }}"
                                          class="rounded h-8 bg-gray-100 w-full ring-1 ring-gray-300" disabled/>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="space-y-4">
                        <a href="{{ route('admin.clients.index') }}"
                           class="w-full py-2 px-4 bg-lime-500 text-white font-medium rounded-md hover:text-lime-500 hover:bg-white hover:ring-1 hover:ring-lime-500">
                            Voltar
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
