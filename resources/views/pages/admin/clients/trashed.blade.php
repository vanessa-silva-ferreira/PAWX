<div class="mx-10 my-10 bg-white">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-10 uppercase" style="color: #F57C00">Clientes Removidos</h1>

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
                @foreach ($clients as $client)
                    <tr class="hover:bg-stone-100 text-stone-700">
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->user->name ?? 'User Missing' }}</td>
                        <td>{{ $client->user->email ?? 'User Missing' }}</td>
                        <td>{{ $client->user->phone_number ?? 'N/A' }}</td>
                        <td>{{ $client->user->address ?? 'N/A' }}</td>
                        <td>{{ $client->deleted_at }}</td>
                        <td class="flex space-x-2">
                            <form method="POST" action="{{ route('admin.clients.restore', $client->id) }}">
                                @csrf
                                @method('PATCH')
                                <button class="text-blue-500 hover:underline">Restore</button>
                            </form>

                            <form method="POST" action="{{ route('admin.clients.forceDelete', $client->id) }}">
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
                {{ $clients->links() }}
            </div>
        </div>
    </div>
</div>
