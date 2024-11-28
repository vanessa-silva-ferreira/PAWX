@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.employees.store') }}" method="POST">
    @csrf
    <x-form.label for="name">Name:</x-form.label>
    <x-form.input type="text" id="name" name="name" value="{{ old('name') }}"
           class="rounded ring-1 ring-grey-400 focus:sky-500" required/>

    <x-form.label for="email">Email:</x-form.label>
    <x-form.input type="email" id="email" name="email" value="{{ old('email') }}"
           class="rounded ring-1 ring-grey-400 focus:sky-500" required/>

    <x-form.label for="password">Password:</x-form.label>
    <x-form.input type="password" id="password" name="password"
           class="rounded ring-1 ring-grey-400 focus:sky-500" required/>

    <x-form.label for="password_confirmation">Confirm Password:</x-form.label>
    <x-form.input type="password" id="password_confirmation" name="password_confirmation"
           class="rounded ring-1 ring-grey-400 focus:sky-500" required/>

    <x-form.button type="submit" class="text-white rounded bg-sky-500 hover:ring-1 hover:bg-white hover:ring-sky-500 hover:text-sky-500 font-semibold">Create Employee</x-form.button>
</form>
