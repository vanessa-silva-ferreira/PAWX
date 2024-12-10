<div id="appointment-list">
    <h2 class="text-lg font-bold mb-4">Appointments</h2>

    <div class="flex justify-between mb-4">
        <button id="previous-day" data-url="{{ route('admin.notifications.by-date', ['date' => \Carbon\Carbon::parse($date)->subDay()->toDateString()]) }}" class="text-blue-500 hover:underline">
            Previous Day
        </button>

        <span class="font-bold">{{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</span>

        <button id="next-day" data-url="{{ route('admin.notifications.by-date', ['date' => \Carbon\Carbon::parse($date)->addDay()->toDateString()]) }}" class="text-blue-500 hover:underline">
            Next Day
        </button>
    </div>

    <ul>
        @forelse ($appointments as $appointment)
            <li class="mb-2">
                <p><strong>Service:</strong> {{ $appointment->service->name }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y H:i') }}</p>
            </li>
        @empty
            <li>No appointments for this day.</li>
        @endforelse
    </ul>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bindButtonEvents = () => {
            const previousButton = document.getElementById('previous-day');
            const nextButton = document.getElementById('next-day');

            previousButton?.addEventListener('click', function () {
                updateAppointments(this.dataset.url);
            });

            nextButton?.addEventListener('click', function () {
                updateAppointments(this.dataset.url);
            });
        };

        const updateAppointments = (url) => {
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('appointment-list').innerHTML = html;
                    bindButtonEvents(); // Rebind click events after updating content
                })
                .catch(error => console.error('Error fetching appointments:', error));
        };

        bindButtonEvents();
    });
</script>
