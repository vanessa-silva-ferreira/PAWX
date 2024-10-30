@php
    $selectedDate = session('selected_date', now());
    $month = $selectedDate->month;
    $year = $selectedDate->year;
    $selectedDay = session('selected_day', $selectedDate->day);
@endphp

<div class="bg-white rounded-lg p-4 shadow-md w-64">
    <!-- Month and Year Navigation -->
    <div class="flex items-center justify-between mb-2">
        <form method="POST" action="{{ route('calendar.navigate') }}">
            @csrf
            <input type="hidden" name="monthChange" value="-1" />
            <button class="text-gray-600 hover:text-gray-800" type="submit">
                <span class="material-icons">chevron_left</span>
            </button>
        </form>
        <div class="text-center font-semibold text-gray-700">
            {{ \Carbon\Carbon::createFromFormat('!m', $month)->format('F') }} {{ $year }}
        </div>
        <form method="POST" action="{{ route('calendar.navigate') }}">
            @csrf
            <input type="hidden" name="monthChange" value="1" />
            <button class="text-gray-600 hover:text-gray-800" type="submit">
                <span class="material-icons">chevron_right</span>
            </button>
        </form>
    </div>

    <!-- Weekdays -->
    <div class="grid grid-cols-7 text-center text-gray-500 text-sm mb-1">
        <span>SEG</span>
        <span>TER</span>
        <span>QUA</span>
        <span>QUI</span>
        <span>SEX</span>
        <span>SÁB</span>
        <span>DOM</span>
    </div>

    <!-- Days Grid -->
    <div class="grid grid-cols-7 text-center">
        @for ($i = 0; $i < $firstDayOfMonth; $i++)
            <span></span> <!-- Empty placeholders -->
        @endfor
        @for ($day = 1; $day <= $daysInMonth; $day++)
            <span class="{{ $day == $selectedDay ? 'bg-green-500 text-white rounded-full p-1' : 'hover:bg-gray-200 cursor-pointer' }}"
                  onclick="event.preventDefault(); selectDay({{ $day }})">{{ $day }}</span>
        @endfor
    </div>

    <!-- Time and Date Below Calendar -->
    <div class="mt-4 text-center">
        <div class="text-gray-600 font-medium">{{ sprintf('%02d/%02d/%04d', $selectedDay, $month, $year) }}</div>
    </div>
</div>

<script>
    function selectDay(day) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('calendar.select') }}"; // Route to handle day selection
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'day';
        input.value = day;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
</script>
