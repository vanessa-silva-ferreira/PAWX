
@vite('resources/js/calendar.js')

<div class="bg-white rounded-lg p-6 w-full">

    <div class="flex justify-end items-center w-full mb-8">
        <p class="text-right text-lg text-stone-500 uppercase mr-4">
            Olá, <br><span class="font-bold">{{ Auth::user()->name }}</span>
        </p>

        <div class="relative flex items-center">
            <button class="profile-button flex items-center text-stone-500 hover:text-stone-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-user-round">
                    <circle cx="12" cy="8" r="5"/>
                    <path d="M20 21a8 8 0 0 0-16 0"/>
                </svg>
            </button>
            <div
                class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-stone-200 hidden">
                <a href="/profile" class="block px-4 py-2 text-stone-600 hover:bg-stone-100 hover:text-stone-800">Editar
                    Conta</a>
                <a href="/logout"
                   class="block px-4 py-2 text-stone-600 hover:bg-stone-100 hover:text-stone-800">Sair</a>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="flex justify-between items-center mb-4">
        <button id="prevMonth" class="text-stone-500 hover:stone-stone-800">
            &#10094;
        </button>
        <h2 id="currentMonth" class="text-lg font-bold text-stone-800"></h2>
        <button id="nextMonth" class="text-stone-500 hover:text-stone-800">
            &#10095;
        </button>
    </div>

    <div class="grid grid-cols-7 gap-2 text-center text-stone-600 font-medium">
        <div>S</div>
        <div>T</div>
        <div>Q</div>
        <div>Q</div>
        <div>S</div>
        <div>S</div>
        <div>D</div>
    </div>

    <div id="daysContainer" class="grid grid-cols-7 gap-2 mt-2 text-center text-stone-700"></div>
</div>

<!-- Secção de Notificações -->
<div id="notificationSection" class="bg-white rounded-lg p-6 w-full mt-4 hidden">
    <h3 id="notificationDate" class="text-lg font-bold mb-4 text-stone-800"></h3>
    <ul id="notificationList" class="list-disc list-inside text-stone-700 mb-4"></ul>
    <div class="flex items-center space-x-2">
        <input
            type="text"
            id="newNotification"
            class="flex-grow border border-stone-300 rounded px-2 py-1"
            placeholder="Add a new notification"
        />
        <a
            href="{{ route('admin.appointments.create') }}"
            id="addNotification"
            class="bg-stone-500 text-white px-3 py-1 rounded hover:bg-pawx-orange"
        >
            Add
        </a>
    </div>
</div>
