@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="flex flex-col space-y-4 mt-16 py-6 px-6">
    <div class="overflow-x-auto">
        <div class="container mx-auto">
            <div class="mb-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-pawx-orange uppercase">Clientes</h1>
                    <form method="GET" action="{{ route($rolePrefix . '.clients.index') }}"
                          class="flex items-center space-x-4">
                        <div class="relative flex-grow">
                            <button
                                type="submit"
                                class="absolute left-3 top-1/2 transform -translate-y-1/2 text-stone-400 hover:text-pawx-orange">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-search">
                                    <circle cx="11" cy="11" r="8"/>
                                    <line x1="21" x2="16.65" y1="21" y2="16.65"/>
                                </svg>
                            </button>

                            <input
                                type="text"
                                name="search"
                                placeholder="Procure por nome, NIF..."
                                class="w-full pl-10 pr-4 py-2 text-sm text-stone-700 border border-stone-300 rounded-lg focus:outline-none"
                                value="{{request()->input('search') ? request()->input('search') : ''}}"
                            />
                        </div>

                        <a
                            href="{{ route($rolePrefix . '.clients.create') }}"
                            class="flex items-center px-4 py-2 text-sm text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-user-round">
                                <circle cx="12" cy="8" r="5"/>
                                <path d="M20 21a8 8 0 0 0-16 0"/>
                            </svg>
                            <span class="ml-2">Novo</span>
                        </a>

                        <a
                            href="{{ route('admin.clients.export') }}"
                            class="button flex items-center px-4 py-2 text-sm text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-download">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="7 10 12 15 17 10"/>
                                <line x1="12" x2="12" y1="15" y2="3"/>
                            </svg>
                            <span class="ml-2">Exportar</span>
                        </a>

                    </form>
                </div>


                <table class="table w-full mt-10">
                    <thead>
                    <tr class="text-stone-400 uppercase text-sm text-left">
                        <th class="py-6 px-6">#</th>
                        <th class="py-6 px-6">Nome</th>
                        <th class="py-6 px-6">Email</th>
                        <th class="py-6 px-6">Contacto</th>
                        <th class="py-6 px-6">Morada</th>
                        <th></th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($clients as $client)
                        <tr class="hover:bg-pawx-brown/5 text-pawx-brown/80  text-sm  text-left">

                            <th class="py-6 px-6">{{ $client->client->id }}</th>
                            <td class="py-6 px-6">{{ $client->name }}</td>
                            <td class="py-6 px-6">{{ $client->email }}</td>
                            <td class="py-6 px-6">{{ $client->phone_number }}</td>
                            <td class="py-6 px-6">{{ $client->address }}</td>
                            <td class="flex space-x-0.5 py-6 px-6">
                                <x-dashboard.data-display.table-actions :resource="'clients'" :id="$client->client->id" :rolePrefix="$rolePrefix" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Não foram encontrados resultados
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $clients->appends(['search' => request('search')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



