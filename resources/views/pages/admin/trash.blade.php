@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="flex flex-col space-y-4 mt-16 py-6 px-6">
        <div class="overflow-x-auto">
            <div class="container mx-auto">
                <div class="mb-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-semibold text-pawx-orange uppercase">Removidos</h1>
                    </div>
                        <div class="overflow-x-auto">
                            <table class="table w-full mt-10 border-collapse">
                                <thead>
                                <tr class="bg-white-100 text-stone-400 uppercase text-sm text-left">
                                    <th class="py-6 px-6">#</th>
                                    <th class="py-6 px-6">Tipo</th>
                                    <th class="py-6 px-6">Criado a</th>
                                    <th class="py-6 px-6">Removido a</th>
                                    <th class="py-6 px-6 text-center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($trashed as $item)
                                    <tr class="hover:bg-pawx-brown/5 text-pawx-brown/80 text-sm  text-left">
                                        <th class="py-6 px-6">{{ $item['id'] }}</th>
                                        <td class="py-6 px-6">
                                            @switch($item['type'])
                                                @case('Employee')
                                                    Colaborador
                                                    @break
                                                @case('Client')
                                                    Cliente
                                                    @break
                                                @case('Pet')
                                                    Animal
                                                    @break
                                                @case('Appointment')
                                                    Marcação
                                                    @break
                                                @case('Service')
                                                    Serviço
                                                    @break
                                                @default
                                                    {{ $item['type'] }}
                                            @endswitch
                                        </td>
                                        <td class="py-6 px-6">{{ $item['created_at']->format('d/m/Y') }}</td>
                                        <td class="py-6 px-6">{{ $item['deleted_at']->format('d/m/Y') }}</td>
                                        <td class="py-6 px-6 flex space-x-4 justify-center">
                                            <form method="POST"
                                                  action="{{ route('admin.trashed.restore', ['id' => $item['id'], 'type' => $item['type']]) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button
                                                    type="button"
                                                    class="text-pawx-brown/40 hover:text-pawx-brown/70 transition-colors"
                                                    onclick="showConfirmModal(this)"
                                                    title="Restaurar"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="lucide lucide-archive-restore">
                                                        <rect width="20" height="5" x="2" y="3" rx="1"/>
                                                        <path d="M4 8v11a2 2 0 0 0 2 2h2"/>
                                                        <path d="M20 8v11a2 2 0 0 1-2 2h-2"/>
                                                        <path d="m9 15 3-3 3 3"/>
                                                        <path d="M12 12v9"/>
                                                    </svg>
                                                </button>
                                            </form>

                                            <form method="POST"
                                                  action="{{ route('admin.trashed.forceDelete', ['id' => $item['id'], 'type' => $item['type']]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="button"
                                                    class="text-pawx-brown/40 hover:text-pawx-brown/70 transition-colors"
                                                    onclick="showForceDeleteModal(this)"
                                                    title="Remover Permanentemente"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="lucide lucide-trash">
                                                        <path d="M3 6h18"/>
                                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                                    </svg>
                                                </button>
                                            </form>
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
                        </div>
                </div>

                <div id="confirmModal"
                     class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                    <div class="bg-white rounded-lg p-6 shadow-lg text-center">
                        <p class="text-stone-600 text-md">Tem a certeza que quer <span class="font-bold">restaurar</span> o item?</p>
                        <div class="flex justify-center mt-4 space-x-4">
                            <button id="confirmYes"
                                    class="bg-pawx-orange text-white px-4 py-2 rounded-xl border border-pawx-orange hover:bg-white hover:border-pawx-orange hover:text-pawx-orange transition">
                                Sim
                            </button>
                            <button id="confirmNo"
                                    class="bg-pawx-brown text-white px-4 py-2 rounded-xl border border-pawx-brown hover:bg-white hover:border-pawx-brown hover:text-pawx-brown transition">
                                Não
                            </button>
                        </div>
                    </div>
                </div>

                <div id="confirmForceDeleteModal"
                     class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                    <div class="bg-white rounded-lg p-6 shadow-lg text-center">
                        <p class="text-stone-600 text-md">Tem a certeza que quer <span class="font-bold">remover</span> o item permanentemente?</p>
                        <div class="flex justify-center mt-4 space-x-4">
                            <button id="forceDeleteYes"
                                    class="bg-pawx-orange text-white px-4 py-2 rounded-xl border border-pawx-orange hover:bg-white hover:border-pawx-orange hover:text-pawx-orange transition">
                                Sim
                            </button>
                            <button id="forceDeleteNo"
                                    class="bg-pawx-brown text-white px-4 py-2 rounded-xl border border-pawx-brown hover:bg-white hover:border-pawx-brown hover:text-pawx-brown transition">
                                Não
                            </button>
                        </div>
                    </div>
                </div>

                <script>
                    function showConfirmModal(button) {
                        const modal = document.getElementById('confirmModal');
                        const confirmYes = document.getElementById('confirmYes');
                        const confirmNo = document.getElementById('confirmNo');

                        modal.classList.remove('hidden');

                        confirmYes.onclick = function () {
                            modal.classList.add('hidden');
                            button.closest('form').submit();
                        };

                        confirmNo.onclick = function () {
                            modal.classList.add('hidden');
                        };
                    }

                    function showForceDeleteModal(button) {
                        const modal = document.getElementById('confirmForceDeleteModal');
                        const confirmYes = document.getElementById('forceDeleteYes');
                        const confirmNo = document.getElementById('forceDeleteNo');

                        modal.classList.remove('hidden');

                        confirmYes.onclick = function () {
                            modal.classList.add('hidden');
                            button.closest('form').submit();
                        };

                        confirmNo.onclick = function () {
                            modal.classList.add('hidden');
                        };
                    }
                </script>
            </div>
        </div>
    </div>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
