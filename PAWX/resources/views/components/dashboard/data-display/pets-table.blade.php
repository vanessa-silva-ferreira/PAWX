@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
    use Carbon\Carbon;
@endphp

<div class="mx-10 my-10 bg-white">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-10 uppercase" style="color: #81C784">Animais</h1>

        <div class="flex items-center justify-between mb-10 space-x-4">
            <form method="GET" action="{{ route($rolePrefix . '.pets.index') }}" class="flex w-full max-w-full">
                <div class="relative flex-grow">
                    <input
                        type="text"
                        name="search"
                        placeholder="Procure por nome, tipo, raça, etc..."
                        class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        value="{{ request('search') }}"
                    />
                    <button
                        type="submit"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-stone-400 hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-search">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" x2="16.65" y1="21" y2="16.65"/>
                        </svg>
                    </button>
                </div>
            </form>

            <a
                href="{{ route($rolePrefix . '.pets.create') }}"
                class="px-4 py-2 text-white font-semibold rounded-lg focus:ring-2 focus:ring-blue-400"
                style="background-color: #81C784">
                Adicionar
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                <tr class="bg-white-100 text-stone-400">
                    <th>#</th>
                    <th>ANIMAL</th>
                    <th>TAMANHO</th>
                    <th>IDADE</th>
                    <th>CLIENTE</th>
                    <th>AÇÕES</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($pets as $pet)
                    <tr class="hover:bg-stone-100 text-stone-700 cursor-pointer" onclick="window.location='{{ route($rolePrefix . '.pets.show', $pet->id) }}';">
                        <th>{{ $pet->id }}</th>
                        <td>
                            <div class="flex items-center gap-8">
                                <div class="avatar">
                                    <div class="mask mask-circle h-16 w-16">
                                        <img
                                            src="{{ $pet->photo_url ?? 'https://images.pexels.com/photos/20787/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' }}"
                                            alt="Foto"/>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">{{ $pet->name }}</div>
                                    <div class="text-sm opacity-50 flex items-center gap-2">
                                        <span>{{ $pet->type ?? 'N/A' }} - {{ $pet->breed ?? 'N/A' }}</span>
                                        @if($pet->gender === 'male')
                                            <span title="Macho" class="text-blue-500">&#9794;</span>
                                        @else
                                            <span title="Fêmea" class="text-pink-500">&#9792;</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $pet->size ?? 'N/A' }}</td>
                        <td>
                            @if($pet->birthdate)
                                {{ \Carbon\Carbon::parse($pet->birthdate)->age }} anos
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route($rolePrefix . '.clients.show', $pet->client->id) }}"
                               class=" hover:underline" title="View">
                                {{ $pet->client->user->name }}
                            </a>
                        </td>
                        <td class="flex space-x-1">
                            <a href="{{ route($rolePrefix . '.pets.show', $pet->id) }}"
                               class="text-stone-400 hover:text-blue-800" title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="none"
                                     stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-eye">
                                    <path
                                        d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </a>
                            <a href="{{ route($rolePrefix . '.pets.edit', $pet->id) }}"
                               class="text-stone-400 hover:text-yellow-800" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="none"
                                     stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-pencil">
                                    <path
                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>


            </table>
            <div class="mt-10">
                {{ $pets->links() }}
            </div>
        </div>
    </div>
</div>


