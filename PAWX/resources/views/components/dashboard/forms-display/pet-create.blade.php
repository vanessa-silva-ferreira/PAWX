@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="mx-10 my-10 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 uppercase" style="color: #81C784">Adicionar Novo Animal</h1>

    @if ($errors->any())
        <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pets.store') }}" method="POST">
        @csrf
        <div class="flex flex-col space-y-6">
            <div class="flex space-x-4">
                <div class="flex-1 space-y-4">
                    <div>
                        <x-form.label for="name" class="text-gray-700 font-semibold">Nome</x-form.label>
                        <x-form.input
                            name="name"
                            class="rounded h-8 bg-white w-full ring-1 ring-gray-300"
                            required
                            placeholder="Insira o nome do animal"/>
                    </div>
                    <div>
                        <x-form.label for="birthdate" class="text-gray-700 font-semibold">Data de Nascimento</x-form.label>
                        <x-form.input type="date" name="birthdate" class="rounded h-8 bg-white w-full ring-1 ring-gray-300"
                            required />
                    </div>
                    <div class="form-group">
                        <x-form.label for="gender" class="text-gray-700 font-semibold">Género</x-form.label>
                        <select id="gender" name="gender" class="form-control rounded h-8 bg-white w-full ring-1 ring-gray-300">
                            <option value="">Selecione o Género</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Macho</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Fêmea</option>
                        </select>
                        <x-form.validation-error name="gender" />
                    </div>
                    <div class="form-group">
                        <x-form.label for="medical_history" class="text-gray-700 font-semibold">Histórico Médico</x-form.label>
                        <textarea id="medical_history" name="medical_history" class="form-control w-full rounded border-gray-300" placeholder="Insira o histórico médico">{{ old('medical_history') }}</textarea>
                        <x-form.validation-error name="medical_history" />
                    </div>
                </div>
                <div class="flex-1 space-y-4">
                    <div class="form-group">
                        <x-form.label class="text-gray-700 font-semibold">Estado de Esterilização</x-form.label>
                        <div class="space-y-2">
                            <div class="form-check flex space-x-4">
                                <div class="flex items-center">
                                    <x-form.input
                                        type="radio"
                                        name="spay_neuter_status"
                                        id="spayed"
                                        value="1"
                                        required
                                        :checked="old('spay_neuter_status') == '1'"
                                        class="form-check-input" />
                                    <x-form.label for="spayed" class="form-check-label ml-2 text-gray-700 font-semibold">Esterilizado</x-form.label>
                                </div>

                                <div class="flex items-center">
                                    <x-form.input
                                        type="radio"
                                        name="spay_neuter_status"
                                        id="not_spayed"
                                        value="0"
                                        required
                                        :checked="old('spay_neuter_status') == '0'"
                                        class="form-check-input" />
                                    <x-form.label for="not_spayed" class="form-check-label ml-2 text-gray-700 font-semibold">Não Esterilizado</x-form.label>
                                </div>
                            </div>
                        </div>
                        <x-form.validation-error name="spay_neuter_status" />
                    </div>
                    <div class="form-group">
                        <x-form.label for="status" class="text-gray-700 font-semibold">Estado</x-form.label>
                        <select id="status" name="status" class="form-control rounded h-8 bg-white w-full ring-1 ring-gray-300">
                            <option value="">Selecione o Estado</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Ativo</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inativo</option>
                        </select>
                        <x-form.validation-error name="status" />
                    </div>
                    <div class="form-group">
                        <x-form.label for="obs" class="text-gray-700 font-semibold">Observações</x-form.label>
                        <textarea id="obs" name="obs" class="form-control w-full rounded border-gray-300" placeholder="Insira observações (opcional)">{{ old('obs') }}</textarea>
                        <x-form.validation-error name="obs" />
                    </div>
                    <div class="form-group">
                        <x-form.label for="client_id" class="text-gray-700 font-semibold">Cliente</x-form.label>
                        <select id="client_id" name="client_id" class="form-control rounded h-8 bg-white w-full ring-1 ring-gray-300" required>
                            <option value="">Select a Client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                    {{ $client->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="space-y-4">
                <x-form.button type="submit" class="w-full py-2 px-4 bg-lime-500 text-white font-medium rounded-md hover:text-lime-500 hover:bg-white hover:ring-1 hover:ring-lime-500">
                    Adicionar Animal
                </x-form.button>
            </div>
        </div>
    </form>
</div>
