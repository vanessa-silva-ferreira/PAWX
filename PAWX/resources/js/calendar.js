const daysContainer = document.getElementById("daysContainer");
const currentMonth = document.getElementById("currentMonth");
const prevMonth = document.getElementById("prevMonth");
const nextMonth = document.getElementById("nextMonth");
const notificationSection = document.getElementById("notificationSection");
const notificationDate = document.getElementById("notificationDate");
const notificationList = document.getElementById("notificationList");
const petNameInput = document.getElementById("petName");
const serviceInput = document.getElementById("service");
const timeInput = document.getElementById("time");  // datetime-local input
const addNotificationLink = document.getElementById("addNotification");

let date = new Date();
const notifications = {};  // Store notifications in this object

function renderCalendar() {
    const year = date.getFullYear();
    const month = date.getMonth();
    const day = date.getDate();
    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    currentMonth.textContent = `${date.toLocaleString("default", { month: "long" })} ${year}`;
    daysContainer.innerHTML = "";

    const blanks = firstDay === 0 ? 6 : firstDay - 1;
    for (let i = 0; i < blanks; i++) {
        daysContainer.innerHTML += `<div></div>`;
    }

    for (let i = 1; i <= lastDate; i++) {
        const dayKey = `${String(i).padStart(2, "0")}-${String(month + 1).padStart(2, "0")}-${year}`;
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

    const todayKey = `${String(day).padStart(2, "0")}-${String(month + 1).padStart(2, "0")}-${year}`;
    showNotificationSection(todayKey);
}

function updateNotifications(date, petName, serviceName, appointmentDate) {
    if (!notifications[date]) notifications[date] = [];

    const [notificationDate, notificationTime] = appointmentDate.split('T');
    notifications[date].push({
        petName,
        serviceName,
        notificationTime,
    });

    console.log("Updated Notifications for", date, notifications[date]);

    renderCalendar();
    showNotificationSection(date);

    const event = new CustomEvent("new-notification", {
        detail: { date, petName, serviceName, notificationTime },
    });
    document.dispatchEvent(event);
}

function showNotificationSection(date) {
    console.log("Showing notifications for:", date);
    notificationDate.textContent = `Notifications for ${date}`;
    notificationList.innerHTML = "";

    const dayNotifications = notifications[date] || [];
    dayNotifications.forEach((notification) => {
        const listItem = document.createElement("li");
        listItem.textContent = `${notification.petName} - ${notification.serviceName} at ${notification.notificationTime}`;
        notificationList.appendChild(listItem);
    });

    notificationSection.classList.remove("hidden");
}

addNotificationLink.addEventListener("click", (e) => {
    e.preventDefault();

    const selectedDate = timeInput.dataset.date || date.toISOString().split('T')[0];
    const petName = petNameInput.value.trim();
    const serviceName = serviceInput.value.trim();
    const appointmentDate = timeInput.value.trim();

    if (!petName || !serviceName || !appointmentDate) return;

    const formattedDate = `${String(timeInput.value.split('-')[2]).padStart(2, "0")}-${String(timeInput.value.split('-')[1]).padStart(2, "0")}-${timeInput.value.split('-')[0]}`;

    updateNotifications(formattedDate, petName, serviceName, appointmentDate);

    petNameInput.value = "";
    serviceInput.value = "";
    timeInput.value = "";

    setTimeout(() => {
        window.location.href = addNotificationLink.href;
    }, 300);
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
