<div class="mx-10 my-10 bg-white">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-10 uppercase" style="color: #F57C00">Colaboradores Removidos</h1>

        <div class="overflow-x-auto">
            <table class="table w-full border-collapse">
                <thead>
                <tr class="bg-white-100 text-stone-400">
                    <th>#</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>CONTACTO</th>
                    <th>MORADA</th>
                    <th>REMOVIDO EM</th>
                    <th>AÇÕES</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($employees as $employee)
                    <tr class="hover:bg-stone-100 text-stone-700">
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->user->name ?? 'User Missing' }}</td>
                        <td>{{ $employee->user->email ?? 'User Missing' }}</td>
                        <td>{{ $employee->user->phone_number ?? 'N/A' }}</td>
                        <td>{{ $employee->user->address ?? 'N/A' }}</td>
                        <td>{{ $employee->deleted_at }}</td>
                        <td class="flex space-x-2">
                            <form method="POST" action="{{ route('admin.employees.restore', $employee->id) }}">
                                @csrf
                                @method('PATCH')
                                <button class="text-blue-500 hover:underline">Restore</button>
                            </form>

                            <form method="POST" action="{{ route('admin.employees.forceDelete', $employee->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">Delete Permanently</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="mt-4">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
