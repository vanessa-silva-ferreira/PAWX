<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Calendar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
<div class="bg-white rounded-lg shadow-md p-6 w-96">
    <!-- Calendar Header -->
    <div class="flex justify-between items-center mb-4">
        <button id="prevMonth" class="text-gray-500 hover:text-gray-800">
            &#10094;
        </button>
        <h2 id="currentMonth" class="text-lg font-bold text-gray-800"></h2>
        <button id="nextMonth" class="text-gray-500 hover:text-gray-800">
            &#10095;
        </button>
    </div>

    <!-- Weekdays -->
    <div class="grid grid-cols-7 gap-2 text-center text-gray-600 font-medium">
        <div>Mon</div>
        <div>Tue</div>
        <div>Wed</div>
        <div>Thu</div>
        <div>Fri</div>
        <div>Sat</div>
        <div>Sun</div>
    </div>

    <!-- Days -->
    <div id="daysContainer" class="grid grid-cols-7 gap-2 mt-2 text-center text-gray-700"></div>
</div>

<!-- Pop-up -->
<div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-80 relative">
        <button id="closePopup" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
            &times;
        </button>
        <h3 id="popupDate" class="text-lg font-bold mb-4 text-gray-800"></h3>
        <ul id="popupNotifications" class="list-disc list-inside text-gray-700 mb-4"></ul>
        <div class="flex items-center space-x-2">
            <input
                type="text"
                id="newNotification"
                class="flex-grow border border-gray-300 rounded px-2 py-1"
                placeholder="Add a new notification"
            />
            <button
                id="addNotification"
                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
            >
                Add
            </button>
        </div>
    </div>
</div>

<script>
    const daysContainer = document.getElementById("daysContainer");
    const currentMonth = document.getElementById("currentMonth");
    const prevMonth = document.getElementById("prevMonth");
    const nextMonth = document.getElementById("nextMonth");
    const popup = document.getElementById("popup");
    const popupContent = document.querySelector("#popup .bg-white");
    const closePopup = document.getElementById("closePopup");
    const popupDate = document.getElementById("popupDate");
    const popupNotifications = document.getElementById("popupNotifications");
    const newNotificationInput = document.getElementById("newNotification");
    const addNotificationButton = document.getElementById("addNotification");

    let date = new Date();

    // Initialize an empty notifications object
    const notifications = {};

    // Render the calendar
    function renderCalendar() {
        const year = date.getFullYear();
        const month = date.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        currentMonth.textContent = `${date.toLocaleString("default", {
            month: "long",
        })} ${year}`;

        daysContainer.innerHTML = "";
        const blanks = firstDay === 0 ? 6 : firstDay - 1; // Adjusting for Monday start

        // Add blank days
        for (let i = 0; i < blanks; i++) {
            daysContainer.innerHTML += `<div></div>`;
        }

        // Add days
        for (let i = 1; i <= lastDate; i++) {
            const dayKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(
                i
            ).padStart(2, "0")}`;
            const hasNotification = notifications[dayKey];
            daysContainer.innerHTML += `
          <div
            class="p-2 rounded-lg cursor-pointer hover:bg-gray-200 relative"
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

        // Add click listeners for days
        document.querySelectorAll("#daysContainer div[data-date]").forEach((day) => {
            day.addEventListener("click", (e) => {
                const date = e.target.dataset.date;
                showPopup(date);
            });
        });
    }

    // Show pop-up
    function showPopup(date) {
        popupDate.textContent = `Notifications for ${date}`;
        popupNotifications.innerHTML = "";

        if (notifications[date]) {
            notifications[date].forEach((note) => {
                const li = document.createElement("li");
                li.innerHTML = `<a href="${note.link}" class="text-blue-500 hover:underline">${note.text}</a>`;
                popupNotifications.appendChild(li);
            });
        } else {
            popupNotifications.innerHTML = "<li>No notifications</li>";
        }

        popup.classList.remove("hidden");
        newNotificationInput.value = ""; // Clear input field
        newNotificationInput.dataset.date = date;
    }

    // Add notification
    addNotificationButton.addEventListener("click", () => {
        const date = newNotificationInput.dataset.date;
        const text = newNotificationInput.value.trim();

        if (!text) return; // Do nothing if input is empty

        if (!notifications[date]) notifications[date] = [];
        notifications[date].push({
            text,
            link: "show-appointment.html", // Placeholder link for the show appointment form
        });
        showPopup(date);
        renderCalendar(); // Re-render calendar to update notifications indicator
    });

    // Close pop-up
    closePopup.addEventListener("click", () => {
        popup.classList.add("hidden");
    });

    // Close pop-up when clicking outside the content
    popup.addEventListener("click", (e) => {
        if (!popupContent.contains(e.target)) {
            popup.classList.add("hidden");
        }
    });

    // Navigate months
    prevMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() - 1);
        renderCalendar();
    });

    nextMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() + 1);
        renderCalendar();
    });

    // Initialize calendar
    renderCalendar();
</script>
</body>
</html>
