<!-- Pass appointments data to JavaScript -->
{{--<script>
    const allAppointments = @json($allAppointments);
    console.log(allAppointments);
</script>

<!-- Parent div wrapping both Calendar and Notification Sections -->
<div class="lg:block hidden w-full">
    <!-- Calendar Section -->
    <div class="bg-white rounded-lg shadow-md p-6 w-full">
        <div class="flex justify-between items-center mb-4">
            <button id="prevMonth" class="text-gray-500 hover:text-gray-800">
                &#10094;
            </button>
            <h2 id="currentMonth" class="text-lg font-bold text-gray-800 text-center">
                <!-- Month will be dynamically inserted -->
            </h2>
            <button id="nextMonth" class="text-gray-500 hover:text-gray-800">
                &#10095;
            </button>
        </div>

        <div class="grid grid-cols-7 gap-2 text-center text-gray-600 font-medium">
            <div>S</div>
            <div>T</div>
            <div>Q</div>
            <div>Q</div>
            <div>S</div>
            <div>S</div>
            <div>D</div>
        </div>

        <div id="daysContainer"
             class="grid grid-cols-7 gap-2 mt-2 text-center text-gray-700 sm:grid-cols-5 md:grid-cols-7">
            <!-- Days will be dynamically inserted -->
        </div>
    </div>--}}

    <!-- Notification Section -->
    <div id="notificationSection" class="bg-white rounded-lg shadow-md p-6 w-full mt-4">
        <h3 id="notificationDate" class="text-lg font-bold mb-4 text-gray-800 text-center">

        </h3>
        <ul id="notificationList" class="list-disc list-inside text-gray-700 mb-4"></ul>
        <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2 items-center">
            @foreach($todaysAppointments as $appointment)
                <p>{{ $appointment->pet->name }}</p>
            @endforeach
            <a
                href="{{ route('admin.appointments.create') }}"
                id="addNotification"
                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
            >
                Add
            </a>
        </div>
    </div>
{{--</div>--}}

{{--@vite('resources/js/calendar.js')--}}
