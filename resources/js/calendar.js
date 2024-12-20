

document.addEventListener('DOMContentLoaded', function () {
    const daysContainer = document.getElementById("daysContainer");
    const currentMonth = document.getElementById("currentMonth");
    const prevMonthText = document.getElementById("prevMonthText");
    const nextMonthText = document.getElementById("nextMonthText");
    const prevMonth = document.getElementById("prevMonth");
    const nextMonth = document.getElementById("nextMonth");
    const timeHour = document.getElementById("timeHour");
    const timeMinute = document.getElementById("timeMinute");
    const timePeriod = document.getElementById("timePeriod");
    const currentDateDisplay = document.getElementById("currentDate");
    const notificationDate = document.getElementById("notificationDate");
    const notificationList = document.getElementById("notificationList");

    const userRole = document.body.dataset.userRole;
    const rolePrefix = userRole === 'client' ? '' : 'admin';

    let date = new Date();

    function getPortugalTime() {
        const now = new Date();
        const lisbonTime = now.toLocaleString("en-US", {
            timeZone: "Europe/Lisbon",
            hour12: false,
        });
        return new Date(lisbonTime);
    }

    function renderCalendar() {
        const year = date.getFullYear();
        const month = date.getMonth();
        const day = date.getDate();
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        const monthsInPortuguese = [
            "JANEIRO", "FEVEREIRO", "MARÇO", "ABRIL", "MAIO", "JUNHO",
            "JULHO", "AGOSTO", "SETEMBRO", "OUTUBRO", "NOVEMBRO", "DEZEMBRO"
        ];

        currentMonth.textContent = `${monthsInPortuguese[month]} ${year}`;
        prevMonthText.textContent = monthsInPortuguese[(month - 1 + 12) % 12].slice(0, 3);
        nextMonthText.textContent = monthsInPortuguese[(month + 1) % 12].slice(0, 3);

        daysContainer.innerHTML = "";

        const blanks = firstDay === 0 ? 6 : firstDay - 1;

        for (let i = 0; i < blanks; i++) {
            const blankDiv = document.createElement("div");
            daysContainer.appendChild(blankDiv);
        }

        fetch(`/${rolePrefix}/notifications/monthly?year=${year}&month=${month + 1}`)
            .then(response => response.json())
            .then(data => {
                const appointmentDays = data.appointments;

                for (let i = 1; i <= lastDate; i++) {
                    const dayKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(i).padStart(2, "0")}`;
                    const hasAppointment = appointmentDays[dayKey];

                    const dayDiv = document.createElement("div");
                    dayDiv.classList.add("p-2", "relative", "cursor-pointer", "rounded-full", "hover:bg-stone-300", "hover:scale-105", "transition-all", "duration-200");
                    dayDiv.dataset.date = dayKey;

                    const daySpan = document.createElement("span");
                    daySpan.classList.add("relative", "z-0");
                    daySpan.textContent = i;

                    if (hasAppointment) {
                        const appointmentMarker = document.createElement("span");
                        appointmentMarker.classList.add("absolute", "h-2", "w-2", "bg-pawx-orange", "rounded-full", "z-10");
                        appointmentMarker.style.top = "1.4rem";
                        appointmentMarker.style.right = "0.4rem";
                        dayDiv.appendChild(appointmentMarker);
                    }

                    dayDiv.appendChild(daySpan);
                    daysContainer.appendChild(dayDiv);

                    dayDiv.addEventListener("click", () => {
                        updateNotifications(dayKey);
                    });
                }
            })
            .catch(error => console.error("Error fetching monthly appointments:", error));
    }

    function updateNotifications(selectedDate) {
        const options = {day: '2-digit', month: 'long', year: 'numeric'};
        const formattedDate = new Date(selectedDate).toLocaleDateString('pt-PT', options);

        notificationDate.innerHTML = `
        <div class="flex items-center justify-between">
            <button id="prevDay" class="text-stone-500 hover:text-stone-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
            </button>
            <span class="text-lg font-bold text-stone-600">${formattedDate}</span>
            <button id="nextDay" class="text-stone-500 hover:text-stone-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6"/>
                </svg>
            </button>
        </div>
    `;

        fetch(`/${rolePrefix}/notifications/by-date?date=${selectedDate}`)
            .then(response => response.json())
            .then(data => {
                const notifications = data.notifications;

                notificationList.innerHTML = userRole === 'admin' ? `
                <div class="mb-4 p-2 border border-stone-300 rounded-lg bg-white flex justify-center">
                    <a
                        href="/${rolePrefix}/appointments/create?date=${selectedDate}"
                        class="flex items-center justify-center px-4 py-2 text-sm text-stone-500"
                        style="width: 100%;"
                    >
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
                        <span class="ml-2">Nova Marcação</span>
                    </a>
                </div>
            ` : '';

                if (notifications.length > 0) {
                    notifications.forEach(notification => {
                        const notificationDiv = document.createElement("div");
                        notificationDiv.classList.add("mb-4", "p-2", "border", "rounded-lg", "hover:bg-pawx-brown/5", "space-y-2");
                        notificationDiv.innerHTML = `
                        <a href="/${rolePrefix}/appointments/${notification.id}" class="text-pawx-brown/60 hover:text-pawx-brown/60 block" title="Show">
                            <strong>${notification.pet.name}</strong>, ${notification.pet.species}<br>
                            ${notification.pet.breed}, ${notification.pet.fur_type}, ${notification.pet.size}<br>
                            ${notification.service}, às ${new Date(notification.appointment_date).toLocaleTimeString('pt-PT', {
                            hour: '2-digit',
                            minute: '2-digit'
                        })}<br><br>
                            ${notification.status_html}<br>
                        </a>
                    `;
                        notificationList.appendChild(notificationDiv);
                    });
                } else {
                    const noNotificationsDiv = document.createElement("div");
                    noNotificationsDiv.classList.add("text-stone-500", "text-center", "italic", "mt-4");
                    noNotificationsDiv.textContent = "Não tem notificações";
                    notificationList.appendChild(noNotificationsDiv);
                }
            })
            .catch(error => console.error("Error fetching notifications:", error));

        setTimeout(() => {
            document.getElementById("prevDay")?.addEventListener("click", () => {
                const prevDate = new Date(selectedDate);
                prevDate.setDate(prevDate.getDate() - 1);
                updateNotifications(prevDate.toISOString().split("T")[0]);
            });

            document.getElementById("nextDay")?.addEventListener("click", () => {
                const nextDate = new Date(selectedDate);
                nextDate.setDate(nextDate.getDate() + 1);
                updateNotifications(nextDate.toISOString().split("T")[0]);
            });
        }, 100);
    }

    function updateTime() {
        const now = getPortugalTime();
        const hours = now.getHours();
        const minutes = now.getMinutes();
        const period = hours >= 12 ? "PM" : "AM";

        timeHour.textContent = String(hours % 12 || 12).padStart(2, "0");
        timeMinute.textContent = String(minutes).padStart(2, "0");
        timePeriod.textContent = period;
        currentDateDisplay.textContent = now.toLocaleDateString("pt-PT");
    }

    prevMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() - 1);
        renderCalendar();
    });

    nextMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() + 1);
        renderCalendar();
    });

    setInterval(updateTime, 60000);
    updateTime();
    renderCalendar();
    updateNotifications(new Date().toISOString().split("T")[0]);
});
