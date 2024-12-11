@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
    use Carbon\Carbon;
@endphp

<div class="flex flex-col space-y-4 mt-16 py-6 px-6">
    <div class="overflow-x-auto">
        <div class="container mx-auto">

            <div class="mb-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-pawx-orange uppercase">Animais</h1>

                    <form method="GET" action="{{ route($rolePrefix . '.pets.index') }}"
                          class="flex items-center space-x-4">
                        <div class="relative flex-grow">

                            <button
                                type="submit"
                                class="absolute left-3 top-1/2 transform -translate-y-1/2 text-stone-400 hover:text-pawx-orange">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                     stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="lucide lucide-search">
                                    <circle cx="11" cy="11" r="8"/>
                                    <line x1="21" x2="16.65" y1="21" y2="16.65"/>
                                </svg>
                            </button>
                            <input
                                type="text"
                                name="search"
                                placeholder="Procurar por raça, espécie..."
                                class="w-full pl-10 pr-4 py-2 text-sm text-stone-700 border border-stone-300 rounded-lg focus:outline-none"
                                value="{{ request('search') }}"
                            />
                        </div>
                        <a
                            href="{{ route($rolePrefix . '.pets.create') }}"
                            class="flex items-center px-4 py-2 text-sm text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-paw-print">
                                <circle cx="11" cy="4" r="2"/>
                                <circle cx="18" cy="8" r="2"/>
                                <circle cx="20" cy="16" r="2"/>
                                <path
                                    d="M9 10a5 5 0 0 1 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.84A3.5 3.5 0 0 1 5.5 10Z"/>
                            </svg>
                            <span class="ml-2">Novo</span>
                        </a>
                        <a
                            href="{{ route('admin.pets.export') }}"
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
                        <th class="py-6">#</th>
                        <th class="py-6">Animal</th>
                        <th class="py-6">Porte</th>
                        <th class="py-6">Idade</th>
                        <th class="py-6">Cliente</th>
                        <th class="py-6"></th>

                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($pets as $pet)
                        <tr class="hover:bg-pawx-brown/5 text-pawx-brown/80  text-left text-sm text-left">
                            <th class="py-6">{{ $pet->id }}</th>
                            <td class="py-6">
                                <div class="flex items-center gap-8">
                                    <div class="avatar">
                                        <div class="mask mask-circle h-16 w-16 overflow-hidden">
                                            <img
                                                src="{{ $pet->photo_url ?? 'https://images.pexels.com/photos/20787/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' }}"
                                                alt="Foto"
                                                class="object-cover h-full w-full"/>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold text-md">{{ $pet->name }}</div>
                                        <div class="text-md opacity-50 flex items-center gap-2">
                                            <span>{{ $pet->breed->species->name ?? 'N/A' }} - {{ $pet->breed->name ?? 'N/A' }}</span>
                                            @if($pet->gender === 'male')
                                                <span title="Macho" class="text-blue-500">&#9794;</span>
                                            @else
                                                <span title="Fêmea" class="text-pink-500">&#9792;</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="py-6">{{ $pet->size->category ?? 'N/A' }}</td>
                            <td class="py-6">
                                @if($pet->birthdate)
                                    {{ \Carbon\Carbon::parse($pet->birthdate)->age }} anos
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="py-6">
                                <a href="{{ route($rolePrefix . '.clients.show', $pet->client->id) }}"
                                   class=" hover:underline" title="View">
                                    {{ $pet->client->user->name }}
                                </a>
                            </td>
                            <td class="flex space-x-0.5 py-6 px-6">
                                <x-dashboard.data-display.table-actions :resource="'pets'" :id="$pet->id" :rolePrefix="$rolePrefix" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Não há informação disponível
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $pets->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

