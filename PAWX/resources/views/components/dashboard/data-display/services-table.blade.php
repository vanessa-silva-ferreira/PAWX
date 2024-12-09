<div class="flex flex-col space-y-4 mt-16 py-6 px-6">
<div class="overflow-x-auto">
        <div class="container mx-auto">
            <div class="mb-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-pawx-orange uppercase">Serviços</h1>

                    <form method="GET" action="{{ route('admin.services.index') }}" class="flex items-center space-x-4">
                        <div class="relative flex-grow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="absolute left-3 top-1/2 transform -translate-y-1/2 text-stone-500">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" x2="16.65" y1="21" y2="16.65"/>
                            </svg>
                            <input
                                type="text"
                                name="search"
                                placeholder="Procurar por nome, custo..."
                                class="w-full pl-10 pr-4 py-2 text-sm text-stone-700 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-300 focus:bg-white"
                                value="{{ request('search') }}"
                            />
                        </div>
                        <a
                            href="{{ route('admin.services.create') }}"
                            class="flex items-center px-4 py-2 text-sm text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scissors"><circle cx="6" cy="6" r="3"/><path d="M8.12 8.12 12 12"/><path d="M20 4 8.12 15.88"/><circle cx="6" cy="18" r="3"/><path d="M14.8 14.8 20 20"/></svg>
                            <span class="ml-2">Novo</span>
                        </a>
                        <a
                            href="{{ route('admin.services.export') }}"
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
            </div>
            <table class="table w-full">
                <thead>
                <tr class="text-stone-400 uppercase text-sm text-left">
                    <th class="py-6 px-6">#</th>
                    <th class="py-6 px-6">Nome</th>
                    <th class="py-6 px-6">Custo</th>
                    <th class="py-6 px-6">Preço</th>
                    <th class="py-6 px-6">Observações</th>
                    <th class="py-6 px-6"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($services as $service)
                    <tr class="hover:bg-pawx-brown/5 text-pawx-brown/80  text-left">
                        <th class="py-6 px-6">{{ $service->id }}</th>
                        <td class="py-6 px-6">{{ $service->name }}</td>

                        <td class="py-6 px-6">{{ $service->cost }}</td>
                        <td class="py-6 px-6">{{ $service->price }}</td>
                        <td class="py-6 px-6">{{ $service->obs}}</td>
                        <td class="flex space-x-1 py-6 px-6">
                        {{--                            <a href="{{ route('admin.services.show', $service->id) }}" class="text-stone-400 hover:text-blue-800" title="View">--}}
                        {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">--}}
                        {{--                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>--}}
                        {{--                                    <circle cx="12" cy="12" r="3"/>--}}
                        {{--                                </svg>--}}
                        {{--                            </a>--}}
                        {{--                            <a href="{{ route('admin.services.edit', $service->id) }}" class="text-stone-400 hover:text-yellow-800" title="Edit">--}}
                        {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">--}}
                        {{--                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>--}}
                        {{--                                    <path d="m15 5 4 4"/>--}}
                        {{--                                </svg>--}}
                        {{--                            </a>--}}
                        {{--                        </td>--}}
                        {{--                        <td class="px-2 text-left">--}}
                        {{--                            <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}">--}}
                        {{--                                @csrf--}}
                        {{--                                @method('DELETE')--}}
                        {{--                                <button type="submit" class="text-red-500 hover:text-red-800">Delete</button>--}}
                        {{--                            </form>--}}
                        {{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $services->links() }}
            </div>
        </div>
    </div>
</div>
