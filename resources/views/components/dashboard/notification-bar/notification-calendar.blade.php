@vite('resources/js/calendar.js')
@vite('resources/css/calendar.css')

@php
    $user = Auth::user();
    $rolePrefix = $user->hasRole('client') ? '' : 'admin/';
@endphp

<div id="notification-bar" class="bg-white rounded-lg p-6 w-full hidden lg:block" data-user-role="{{ $user->getRole() }}">
    <div class="mb-4">
        <div class="flex justify-between items-center mb-4">
            <button id="prevMonth" class="text-stone-500 hover:text-stone-800 uppercase text-sm font-bold">
                <span id="prevMonthText"></span>
            </button>
            <h2 id="currentMonth" class="text-lg font-bold text-stone-800"></h2>
            <button id="nextMonth" class="text-stone-500 hover:text-stone-800 uppercase text-sm font-bold">
                <span id="nextMonthText"></span>
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

    <div id="timeAndDay" class="flex items-center justify-center mt-6 space-x-4">
        <div class="flex items-center space-x-2">
            <div class="time-button w-12 h-12 flex items-center justify-center rounded-full text-stone-500 bg-transparent border border-stone-300">
                <span id="timeHour" class="text-lg font-bold">00</span>
            </div>
            <span class="text-lg font-bold text-stone-800">:</span>
            <div class="time-button w-12 h-12 flex items-center justify-center rounded-full text-stone-500 bg-transparent border border-stone-300">
                <span id="timeMinute" class="text-lg font-bold">00</span>
            </div>
            <div class="time-button w-12 h-12 flex items-center justify-center rounded-full text-white bg-pawx-orange ">
                <span id="timePeriod" class="text-lg font-bold">AM</span>
            </div>
        </div>
        <div id="currentDate" class="text-lg font-bold text-stone-700">DD/MM/YYYY</div>
    </div>

    <div id="notificationSection" class="bg-white rounded-lg p-6 w-full mt-6">
        <h3 id="notificationDate" class="text-lg font-bold mb-4 text-stone-700"></h3>
        <ul id="notificationList" class="list-disc list-inside text-stone-600"></ul>
    </div>
</div>


