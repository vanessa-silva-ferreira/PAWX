@vite('resources/js/calendar.js')

@php
    $rolePrefix = auth()->user()->getRole();
    $date = $date ?? now()->toDateString();
@endphp

<div class="bg-white rounded-lg p-6 w-full">
    <div class="flex justify-end items-center w-full mb-8">
        <div class="flex items-center justify-end">
            <div class="relative inline-block text-right">
                <div>
                    <button type="button" class="inline-flex items-center space-x-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <p class="text-right text-lg text-stone-500 uppercase mr-4">
                            Olá, <br><span class="font-bold">{{ Auth::user()->name }}</span>
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-user-round text-stone-500 hover:text-stone-700">
                            <circle cx="12" cy="8" r="5"/>
                            <path d="M20 21a8 8 0 0 0-16 0"/>
                        </svg>
                    </button>
                </div>

                <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-lg border border-stone-200 hidden"
                     role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <a href="{{url($rolePrefix . '/account/edit')}}" class="block px-4 py-2 text-stone-600 hover:bg-stone-100 hover:text-stone-800" role="menuitem" tabindex="-1" id="user-menu-item-0">Editar Conta</a>
                    <a href="#" class="block px-4 py-2 text-stone-600 hover:bg-stone-100 hover:text-stone-800" role="menuitem" tabindex="-1" id="user-menu-item-0">Lista de Removidos</a>
                    <x-action.logout />
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userMenuButton = document.getElementById('user-menu-button');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        userMenuButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
            this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');
        });

        window.addEventListener('click', function(event) {
            if (!userMenuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                userMenuButton.setAttribute('aria-expanded', 'false');
            }
        });
    });
</script>

@include('components.dashboard.notification-bar.notification-calendar')


