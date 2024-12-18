@php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
@endphp

<div class="flex flex-col space-y-4 mt-16 py-6 px-6">
    <div class="overflow-x-auto">
        <div class="container mx-auto">
            <div class="mb-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-pawx-orange uppercase">Marcações</h1>

                    <form method="GET" action="{{ route($rolePrefix . '.appointments.index') }}"
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
                                    placeholder="Procurar por animal, raça..."
                                    class="w-full pl-10 pr-4 py-2 text-sm text-stone-700 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-300 focus:bg-white"
                                    value="{{request()->input('search') ? request()->input('search') : ''}}"
                            />
                        </div>
                        <a
                                href="{{ route($rolePrefix . '.appointments.create') }}"
                                class="flex items-center px-4 py-2 text-sm text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-calendar-plus-2">
                                <path d="M8 2v4"/>
                                <path d="M16 2v4"/>
                                <rect width="18" height="18" x="3" y="4" rx="2"/>
                                <path d="M3 10h18"/>
                                <path d="M10 16h4"/>
                                <path d="M12 14v4"/>
                            </svg>
                            <span class="ml-2">Nova</span>
                        </a>

                        @if(auth()->user()->hasRole('admin'))
                            <a
                                href="{{ route('admin.appointments.export') }}"
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
                        @endif
                    </form>
                </div>
            </div>

            <table class="table w-full">
                <thead>
                <tr class="text-stone-400 uppercase text-sm text-left">
                    <th class="py-6 px-6">#</th>
                    <th class="py-6 px-6">Animal</th>
                    <th class="py-6 px-6">Estado</th>
                    <th class="py-6 px-6">Serviço</th>
                    <th class="py-6 px-6">Data</th>
                    <th class="py-6 px-6">Preço</th>
                    <th class="py-6 px-6"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($appointments as $appointment)
                    <tr class="hover:bg-pawx-brown/5 text-pawx-brown/80  text-left">
                        <th class="py-6 px-6">{{ $appointment->id }}</th>
                        <td class="py-6 px-6">
                            <div class="flex flex-col">
                                <span class="font-bold">{{ $appointment->pet->name }}</span>
                                <span class="text-sm text-stone-500">{{ $appointment->pet->client->user->name }}</span>
                            </div>
                        </td>
                        <td class="py-6 px-6">
                            <x-utilities.appointment-status-tag :status="$appointment->status"/>
                        </td>
                        <td class="py-6 px-6">{{ $appointment->service->name }}</td>
                        <td class="py-6 px-6">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d-m-Y') }}</td>
                        <td class="py-6 px-6">{{ $appointment->total_price }} €</td>
                        <td class="flex space-x-0.5 py-6 px-6">
                            <x-dashboard.data-display.table-actions :resource="'appointments'" :id="$appointment->id" :rolePrefix="$rolePrefix" />
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-stone-400">
                                Não foram encontrados resultados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</div>

