<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-white rounded-lg shadow-md p-6 w-full">
    <div class="flex justify-between items-center mb-4">
        <button id="prevMonth" class="text-gray-500 hover:text-gray-800">
            &#10094;
        </button>
        <h2 id="currentMonth" class="text-lg font-bold text-gray-800"></h2>
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

    <div id="daysContainer" class="grid grid-cols-7 gap-2 mt-2 text-center text-gray-700"></div>
</div>

<!-- Secção de Notificações -->
<div id="notificationSection" class="bg-white rounded-lg shadow-md p-6 w-full mt-4 hidden">
    <h3 id="notificationDate" class="text-lg font-bold mb-4 text-gray-800"></h3>
    <ul id="notificationList" class="list-disc list-inside text-gray-700 mb-4"></ul>
    <div class="flex items-center space-x-2">
        <input
            type="text"
            id="newNotification"
            class="flex-grow border border-gray-300 rounded px-2 py-1"
            placeholder="Add a new notification"
        />
        <a
            href="{{ route('admin.appointments.create') }}"
            id="addNotification"
            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
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

    // Inicializar objeto das notificações
    const notifications = {};

    // Render no calendário
    function renderCalendar() {
        const year = date.getFullYear();
        const month = date.getMonth();
        const day = date.getDate(); // Dia atual do mês
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        currentMonth.textContent = `${date.toLocaleString("default", {
            month: "long",
        })} ${year}`;

        daysContainer.innerHTML = "";
        const blanks = firstDay === 0 ? 6 : firstDay - 1; // Começar na 2ª feira

        // Espaços vazios antes do 1ª dia do mês
        for (let i = 0; i < blanks; i++) {
            daysContainer.innerHTML += `<div></div>`;
        }

        // Adicionar dias do mês
        for (let i = 1; i <= lastDate; i++) {
            const dayKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(
                i
            ).padStart(2, "0")}`;
            const hasNotification = notifications[dayKey];
            daysContainer.innerHTML += `
          <div
            class="p-2 rounded-lg cursor-pointer hover:bg-gray-200 relative ${
                i === day ? "bg-blue-100" : "" //Dar highlight ao dia atual
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

        // Adicionar click listeners para cada dia
        document.querySelectorAll("#daysContainer div[data-date]").forEach((day) => {
            day.addEventListener("click", (e) => {
                const date = e.target.dataset.date;
                showNotificationSection(date);
            });
        });

        // Focar no dia atual por default
        const todayKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(
            day
        ).padStart(2, "0")}`;
        showNotificationSection(todayKey);
    }

    // Mostrar secção de notifcações
    function showNotificationSection(date) {
        notificationDate.textContent = `Notifications for ${date}`;
        notificationList.innerHTML = "";

        if (notifications[date]) {
            notifications[date].forEach((note) => {
                const li = document.createElement("li");
                li.innerHTML = `<a href="${note.link}" class="text-blue-500 hover:underline">${note.text}</a>`;
                notificationList.appendChild(li);
            });
        } else {
            notificationList.innerHTML = "<li>No notifications</li>";
        }

        notificationSection.classList.remove("hidden");
        newNotificationInput.value = ""; // Clear input
        newNotificationInput.dataset.date = date;
    }

    // Adicionar notificação
    addNotificationButton.addEventListener("click", () => {
        const date = newNotificationInput.dataset.date;
        const text = newNotificationInput.value.trim();

        if (!text) return; // Do nothing if input is empty

        if (!notifications[date]) notifications[date] = [];
        notifications[date].push({
            text,
            link: "show-appointment.html", // Aqui fica o link para o ficheiro show do appointment
        });
        showNotificationSection(date);
        renderCalendar(); // Atualizar calendario para mostrar icone de notificação
    });

    // Navegar meses
    prevMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() - 1);
        renderCalendar();
    });

    nextMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() + 1);
        renderCalendar();
    });

    // Inicializar calendário
    renderCalendar();
</script>
