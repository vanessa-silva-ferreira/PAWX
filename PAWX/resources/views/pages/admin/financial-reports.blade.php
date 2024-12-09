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
                        <h1 class="text-2xl font-semibold text-pawx-orange uppercase">Relatórios Financeiros</h1>

                        <div class="flex items-center space-x-6">
                            <form method="GET" action="{{ url('/admin/financial-reports') }}" class="flex items-center space-x-4">
                                <input
                                    type="date"
                                    name="start_date"
                                    class="form-control border border-stone-300 rounded-lg px-3 py-2 text-sm text-stone-500"
                                    value="{{ request()->input('start_date', $startDate) }}"
                                    placeholder="Start Date"
                                >
                                <input
                                    type="date"
                                    name="end_date"
                                    class="form-control border border-stone-300 rounded-lg px-3 py-2 text-sm text-stone-500"
                                    value="{{ request()->input('end_date', $endDate) }}"
                                    placeholder="End Date"
                                >

                                <button
                                    type="submit"
                                    class="flex items-center px-4 py-2 text-sm text-stone-500 bg-white border border-stone-300 rounded-lg hover:bg-stone-100 focus:outline-none"
                                >
                                    Filtrar
                                </button>

                                <a
                                    href="{{ route('admin.financial-reports.export', ['start_date' => request()->input('start_date', $startDate), 'end_date' => request()->input('end_date', $endDate)]) }}"
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



                    <table class="table w-full mt-10">
                        <thead>
                        <tr class="text-stone-400 uppercase text-sm text-left">
                            <th class="py-6 px-6 text-bold">ID</th>
                            <th class="py-6 px-6">Data</th>
                            <th class="py-6 px-6">Marcação</th>
                            <th class="py-6 px-6">Serviço</th>
                            <th class="py-6 px-6">Animal</th>
                            <th class="py-6 px-6">Cliente</th>
                            <th class="py-6 px-6">Custo</th>
                            <th class="py-6 px-6">Preço</th>
                            <th class="py-6 px-6">Diferença</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($financialReports as $report)
                            <tr class="hover:bg-pawx-brown/5 text-pawx-brown/80 text-sm text-left">
                                <th class="py-6 px-6">{{ $report->id }}</th>
                                <td class="py-6 px-6">{{ $report->appointment->appointment_date->format('d/m/Y') }}</td>                                <td class="py-6 px-6">{{ $report->appointment_id }}</td>
                                <td class="py-6 px-6">{{ $report->appointment->service->name ?? 'N/A' }}</td>
                                <td class="py-6 px-6">{{ $report->appointment->pet->name }}</td>
                                <td class="py-6 px-6">{{ $report->appointment->pet->client->user->name }}</td>
                                <td class="py-6 px-6">{{ number_format($report->appointment->service->cost, 2, '.', '.') }} €</td>
                                <td class="py-6 px-6">{{ $report->appointment->total_price }} €</td>
                                <td class="py-6 px-6">{{ number_format($report->profit, 2, '.', '.') }} €</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-stone-400">
                                    Não foram encontrados resultados
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{ $financialReports->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection
