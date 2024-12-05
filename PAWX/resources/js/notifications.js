document.addEventListener("DOMContentLoaded", function () {
    const daysContainer = document.getElementById("daysContainer");
    const currentMonth = document.getElementById("currentMonth");
    const prevMonth = document.getElementById("prevMonth");
    const nextMonth = document.getElementById("nextMonth");
    const notificationSection = document.getElementById("notificationSection");
    const notificationDate = document.getElementById("notificationDate");
    const notificationList = document.getElementById("notificationList");
    const newNotificationInput = document.getElementById("newNotification");
    const addNotificationButton = document.getElementById("addNotification");
    const toggleSidebar = document.getElementById("toggleSidebar");

    let date = new Date();

    // Initialize notifications object
    const notifications = {};

    // Render the calendar
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

        // Add empty spaces for alignment
        for (let i = 0; i < blanks; i++) {
            daysContainer.innerHTML += `<div></div>`;
        }

        // Add days of the month
        for (let i = 1; i <= lastDate; i++) {
            const dayKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(i).padStart(2, "0")}`;
            const hasNotification = notifications[dayKey];
            daysContainer.innerHTML += `
                <div
                    class="p-2 rounded-lg cursor-pointer hover:bg-gray-200 relative ${
                i === day ? "bg-blue-100" : ""
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

        // Add click listeners to days
        document.querySelectorAll("#daysContainer div[data-date]").forEach((day) => {
            day.addEventListener("click", (e) => {
                const date = e.target.dataset.date;
                showNotificationSection(date);
            });
        });

        // Focus on the current day by default
        const todayKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
        showNotificationSection(todayKey);
    }

    // Show notification section
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
        newNotificationInput.value = "";
        newNotificationInput.dataset.date = date;
    }

    // Add notification
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

    // Navigate months
    prevMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() - 1);
        renderCalendar();
    });

    nextMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() + 1);
        renderCalendar();
    });

    // Toggle sidebar visibility
    toggleSidebar.addEventListener("click", () => {
        notificationSection.classList.toggle("hidden");
    });

    // Initialize calendar
    renderCalendar();
});

document.addEventListener("DOMContentLoaded", () => {
    const toggleSidebarButton = document.getElementById("toggleSidebar");
    const notificationBarContainer = document.getElementById("notificationBarContainer");

    toggleSidebarButton.addEventListener("click", () => {
        // Toggle visibility by adding/removing the translate-x-full class
        notificationBarContainer.classList.toggle("translate-x-full");
    });
});
