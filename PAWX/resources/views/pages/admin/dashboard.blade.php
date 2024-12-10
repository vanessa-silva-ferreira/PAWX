@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')

    <div class="mt-10 md:ml-10 md:mr-10 mb-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class="mb-20">

                <div class="flex flex-col md:flex-row md:items-center md:justify-end mb-6">
                    <div class="flex items-center md:justify-end space-x-2">
                        <h2 class="text-md mb-0">Últimos</h2>
                        @foreach([15, 30, 90, 180, 365] as $day)
                            <button
                                class="time-button w-10 h-10 flex items-center justify-center rounded-full text-pawx-brown bg-transparent hover:bg-stone-200 text-sm"
                                data-days="{{ $day }}">{{ $day }}</button>
                        @endforeach
                        <h2 class="text-md mb-0">dias.</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 sm:gap-6 auto-rows-min">
                    <!-- Card: Marcações -->
                    <div
                        class="flex flex-col sm:flex-row items-center sm:items-start p-6 bg-pawx-orange/5 rounded-lg border border-pawx-orange/20 hover:bg-pawx-orange/10 min-w-[250px]">
                        <div class="flex-1">
                            <h2 class="text-2xl font-medium uppercase text-stone-400">Marcações</h2>
                            <p class="text-2xl text-pawx-orange" id="appointment-count">{{ $appointmentCount }}</p>
                        </div>
                        <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full text-stone-500 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="6" cy="6" r="3"/>
                                <path d="M8.12 8.12 12 12"/>
                                <path d="M20 4 8.12 15.88"/>
                                <circle cx="6" cy="18" r="3"/>
                                <path d="M14.8 14.8 20 20"/>
                            </svg>
                        </div>
                    </div>

                    <div
                        class="flex flex-col sm:flex-row items-center sm:items-start p-6 bg-pawx-orange/5 rounded-lg border border-pawx-orange/20 hover:bg-pawx-orange/10 min-w-[250px]">
                        <div class="flex-1">
                            <h2 class="text-2xl font-medium uppercase text-stone-400">Animais</h2>
                            <p class="text-2xl text-pawx-orange" id="pet-count">{{ $petCount }}</p>
                        </div>
                        <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full text-stone-500 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="4" r="2"/>
                                <circle cx="18" cy="8" r="2"/>
                                <circle cx="20" cy="16" r="2"/>
                                <path
                                    d="M9 10a5 5 0 0 1 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.84A3.5 3.5 0 0 1 5.5 10Z"/>
                            </svg>
                        </div>
                    </div>

                    <div
                        class="flex flex-col sm:flex-row items-center sm:items-start p-6 bg-pawx-orange/5 rounded-lg border border-pawx-orange/20 hover:bg-pawx-orange/10 min-w-[250px]">
                        <div class="flex-1">
                            <h2 class="text-2xl font-medium uppercase text-stone-400">Receita</h2>
                            <p class="text-2xl text-pawx-orange" id="total-revenue">{{ $totalRevenue }}€</p>
                        </div>
                        <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full text-stone-500 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-4c1-.5 1.7-1 2-2h2v-4h-2c0-1-.5-1.5-1-2V5z"/>
                                <path d="M2 9v1c0 1.1.9 2 2 2h1"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <x-dashboard.data-display.appointments-table :appointments="$appointments"/>
        </div>
    </div>
@endsection

@section('notifications')
    @include('partials.dashboard.notification-bar')
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.time-button');
        const appointmentCountEl = document.getElementById('appointment-count');
        const petCountEl = document.getElementById('pet-count');
        const totalRevenueEl = document.getElementById('total-revenue');

        const setActiveButton = (activeButton) => {
            buttons.forEach(btn => {
                btn.classList.remove('bg-pawx-orange', 'bg-opacity-90', 'text-white', 'border-transparent');
                btn.classList.add('bg-transparent', 'text-pawx-brown', 'border-pawx-brown');
            });
            activeButton.classList.remove('bg-transparent', 'text-pawx-brown', 'border-pawx-brown');
            activeButton.classList.add('bg-pawx-orange', 'bg-opacity-90', 'text-white', 'border-transparent');
        };

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const days = button.getAttribute('data-days');

                setActiveButton(button);

                fetch(`/admin/dashboard-data?days=${days}`, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        appointmentCountEl.textContent = data.appointmentCount;
                        petCountEl.textContent = data.petCount;
                        totalRevenueEl.textContent = `${data.totalRevenue}€`;
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                        alert('An error occurred while fetching data. Please try again.');
                    });
            });
        });

        setActiveButton(document.querySelector('[data-days="30"]'));
    });
</script>
