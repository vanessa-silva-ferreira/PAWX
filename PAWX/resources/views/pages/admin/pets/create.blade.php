@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h1>Create a New Pet</h1>--}}

{{--        @if ($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form action="{{ route('admin.pets.store') }}" method="POST">--}}
{{--            @csrf--}}

{{--            <div class="form-group">--}}
{{--                <label for="name">Pet Name</label>--}}
{{--                <input--}}
{{--                    type="text"--}}
{{--                    id="name"--}}
{{--                    name="name"--}}
{{--                    class="form-control"--}}
{{--                    value="{{ old('name') }}"--}}
{{--                    required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="birthdate">Birthdate</label>--}}
{{--                <input--}}
{{--                    type="date"--}}
{{--                    id="birthdate"--}}
{{--                    name="birthdate"--}}
{{--                    class="form-control"--}}
{{--                    value="{{ old('birthdate') }}"--}}
{{--                    required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="gender">Gender</label>--}}
{{--                <select id="gender" name="gender" class="form-control" required>--}}
{{--                    <option value="">Select Gender</option>--}}
{{--                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>--}}
{{--                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="medical_history">Medical History</label>--}}
{{--                <textarea--}}
{{--                    id="medical_history"--}}
{{--                    name="medical_history"--}}
{{--                    class="form-control">{{ old('medical_history') }}</textarea>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label>Spay/Neuter Status</label><br>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="radio" name="spay_neuter_status" id="spayed" value="1" {{ old('spay_neuter_status') == '1' ? 'checked' : '' }}>--}}
{{--                    <label class="form-check-label" for="spayed">--}}
{{--                        Spayed/Neutered--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="radio" name="spay_neuter_status" id="not_spayed" value="0" {{ old('spay_neuter_status') == '0' ? 'checked' : '' }}>--}}
{{--                    <label class="form-check-label" for="not_spayed">--}}
{{--                        Not Spayed/Neutered--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="status">Status</label>--}}
{{--                <select id="status" name="status" class="form-control" required>--}}
{{--                    <option value="">Select Status</option>--}}
{{--                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>--}}
{{--                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="obs">Observations</label>--}}
{{--                <textarea--}}
{{--                    id="obs"--}}
{{--                    name="obs"--}}
{{--                    class="form-control">{{ old('obs') }}</textarea>--}}
{{--            </div>--}}




{{--            <button type="submit" class="btn btn-primary">Create Pet</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@extends('layouts.dashboard')--}}
{{--@endsection--}}

@section('content')
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

        <form action="{{ route('admin.pets.store') }}" method="POST" class="space-y-4">
            @csrf

            <x-form.input
                name="name"
                label="Nome do Animal"
                required
                placeholder="Insira o nome do animal" />

            <x-form.input
                type="date"
                name="birthdate"
                label="Data de Nascimento"
                required />

            <div class="form-group">
                <x-form.label for="gender">Género</x-form.label>
                <select id="gender" name="gender" class="form-control">
                    <option value="">Selecione o Género</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Macho</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Fêmea</option>
                </select>
                <x-form.validation-error name="gender" />
            </div>

            <div class="form-group">
                <x-form.label for="medical_history">Histórico Médico</x-form.label>
                <textarea id="medical_history" name="medical_history" class="form-control" placeholder="Insira o histórico médico">{{ old('medical_history') }}</textarea>
                <x-form.validation-error name="medical_history" />
            </div>

            <div class="form-group">
                <x-form.label>Estado de Esterilização</x-form.label>
                <div class="space-y-2">
                    <div class="form-check">
                        <x-form.input
                            type="radio"
                            name="spay_neuter_status"
                            id="spayed"
                            value="1"
                            required
                            :checked="old('spay_neuter_status') == '1'"
                            class="form-check-input" />
                        <x-form.label for="spayed" class="form-check-label">Esterilizado</x-form.label>
                    </div>
                    <div class="form-check">
                        <x-form.input
                            type="radio"
                            name="spay_neuter_status"
                            id="not_spayed"
                            value="0"
                            required
                            :checked="old('spay_neuter_status') == '0'"
                            class="form-check-input" />
                        <x-form.label for="not_spayed" class="form-check-label">Não Esterilizado</x-form.label>
                    </div>
                </div>
                <x-form.validation-error name="spay_neuter_status" />
            </div>

            <div class="form-group">
                <x-form.label for="status">Estado</x-form.label>
                <select id="status" name="status" class="form-control">
                    <option value="">Selecione o Estado</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Ativo</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inativo</option>
                </select>
                <x-form.validation-error name="status" />
            </div>

            <div class="form-group">
                <x-form.label for="obs">Observações</x-form.label>
                <textarea id="obs" name="obs" class="form-control" placeholder="Insira observações (opcional)">{{ old('obs') }}</textarea>
                <x-form.validation-error name="obs" />
            </div>

            <div class="form-group">
                <label for="client_id">Client</label>
                <select id="client_id" name="client_id" class="form-control" required>
                    <option value="">Select a Client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                            {{ $client->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <x-form.button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Adicionar Animal
            </x-form.button>
        </form>
    </div>
@endsection
