<script src="https://cdn.tailwindcss.com"></script>
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

<script>
    const daysContainer = document.getElementById("daysContainer");
    const currentMonth = document.getElementById("currentMonth");
    const prevMonth = document.getElementById("prevMonth");
    const nextMonth = document.getElementById("nextMonth");
    const notificationSection = document.getElementById("notificationSection");
    const notificationDate = document.getElementById("notificationDate");
    const notificationList = document.getElementById("notificationList");
    const newNotificationInput = document.getElementById("newNotification");
    const addNotificationButton = document.getElementById("addNotification");

    let date = new Date();

    const notifications = {};

    function renderCalendar() {
        const year = date.getFullYear();
        const month = date.getMonth();
        const day = date.getDate();
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        currentMonth.textContent = `${date.toLocaleString("default", {
            month: "long",
        })} ${year}`;

        daysContainer.innerHTML = "";
        const blanks = firstDay === 0 ? 6 : firstDay - 1;

        for (let i = 0; i < blanks; i++) {
            daysContainer.innerHTML += `<div></div>`;
        }

        for (let i = 1; i <= lastDate; i++) {
            const dayKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(
                i
            ).padStart(2, "0")}`;
            const hasNotification = notifications[dayKey];
            daysContainer.innerHTML += `
          <div
            class="p-2 rounded-lg cursor-pointer hover:bg-stone-200 relative ${
                i === day ? "bg-stone-300" : ""
            }"
            data-date="${dayKey}">
            ${i}
            ${
                hasNotification
                    ? '<span class="absolute top-1 right-1 h-2 w-2 bg-orange-500 rounded-full"></span>'
                    : ""
            }
          </div>
        `;
        }

        document.querySelectorAll("#daysContainer div[data-date]").forEach((day) => {
            day.addEventListener("click", (e) => {
                const date = e.target.dataset.date;
                showNotificationSection(date);
            });
        });

        const todayKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(
            day
        ).padStart(2, "0")}`;
        showNotificationSection(todayKey);
    }

    function showNotificationSection(date) {
        notificationDate.textContent = `Notifications for ${date}`;
        notificationList.innerHTML = "";

        if (notifications[date]) {
            notifications[date].forEach((note) => {
                const li = document.createElement("li");
                li.innerHTML = `<a href="${note.link}" class="text-stone-500 hover:underline">${note.text}</a>`;
                notificationList.appendChild(li);
            });
        } else {
            notificationList.innerHTML = "<li>No notifications</li>";
        }

        notificationSection.classList.remove("hidden");
        newNotificationInput.value = ""; // Clear input
        newNotificationInput.dataset.date = date;
    }

    addNotificationButton.addEventListener("click", () => {
        const date = newNotificationInput.dataset.date;
        const text = newNotificationInput.value.trim();

        if (!text) return;

        if (!notifications[date]) notifications[date] = [];
        notifications[date].push({
            text,
            link: "show-appointment.html",
        });
        showNotificationSection(date);
        renderCalendar();
    });

    prevMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() - 1);
        renderCalendar();
    });

    nextMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() + 1);
        renderCalendar();
    });

    renderCalendar();
</script>
