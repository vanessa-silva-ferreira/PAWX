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

// Sample appointments data (replace with your actual `$allAppointments`)
const allAppointments = [
    {
        petName: 'Rex',
        serviceName: 'Grooming',
        appointmentTime: '2024-12-09T14:30:00',
    },
    {
        petName: 'Bella',
        serviceName: 'Vet Check',
        appointmentTime: '2024-12-09T09:00:00',
    },
    {
        petName: 'Charlie',
        serviceName: 'Boarding',
        appointmentTime: '2024-12-10T10:30:00',
    },
    // Add more appointments here...
];

// Initialize notification object
const notifications = {};

// Helper function to format appointment time
function formatAppointmentTime(dateTime) {
    const [date, time] = dateTime.split("T");
    return `${time.slice(0, 5)}`; // Only show the hour and minutes (e.g., 14:30)
}

// Process appointments into notifications
function processAppointments() {
    allAppointments.forEach(appointment => {
        const dateKey = appointment.appointmentTime.split("T")[0]; // Get only the date part (e.g., '2024-12-09')
        if (!notifications[dateKey]) {
            notifications[dateKey] = [];
        }

        const notificationText = `${appointment.petName} - ${appointment.serviceName} at ${formatAppointmentTime(appointment.appointmentTime)}`;
        notifications[dateKey].push({
            text: notificationText,
            link: `#` // You can add a link to view more details if necessary
        });
    });
}

// Render the calendar
function renderCalendar() {
    const year = date.getFullYear();
    const month = date.getMonth();
    const day = date.getDate(); // Current day of the month
    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    currentMonth.textContent = `${date.toLocaleString("default", {
        month: "long",
    })} ${year}`;

    daysContainer.innerHTML = "";
    const blanks = firstDay === 0 ? 6 : firstDay - 1; // Start on Monday

    // Empty spaces before the first day of the month
    for (let i = 0; i < blanks; i++) {
        daysContainer.innerHTML += `<div></div>`;
    }

    // Add days of the month
    for (let i = 1; i <= lastDate; i++) {
        const dayKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(i).padStart(2, "0")}`;
        const hasNotification = notifications[dayKey];
        daysContainer.innerHTML += `
          <div
            class="p-2 rounded-lg cursor-pointer hover:bg-gray-200 relative ${i === day ? "bg-blue-100" : ""}"
            data-date="${dayKey}">
            ${i}
            ${hasNotification ? '<span class="absolute top-1 right-1 h-2 w-2 bg-orange-500 rounded-full"></span>' : ""}
          </div>
        `;
    }

    // Add click listeners for each day
    document.querySelectorAll("#daysContainer div[data-date]").forEach((day) => {
        day.addEventListener("click", (e) => {
            const date = e.target.dataset.date;
            showNotificationSection(date);
        });
    });

    // Focus on today's date by default
    const todayKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
    showNotificationSection(todayKey);
}

// Show the notification section for the selected date
/*function showNotificationSection(date) {
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
}*/

// Navigate to the previous or next month
prevMonth.addEventListener("click", () => {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
});

nextMonth.addEventListener("click", () => {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
});

// Initialize calendar with appointments
processAppointments();
renderCalendar();

