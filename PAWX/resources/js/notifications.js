document.addEventListener("new-notification", function (e) {
    const { date, petName, serviceName, notificationTime } = e.detail;

    const notificationDateKey = date;
    const notificationSection = document.getElementById("notificationSection");
    const notificationList = document.getElementById("notificationList");

    const notificationTitle = `${petName} - ${serviceName} at ${notificationTime}`;

    const listItem = document.createElement("li");
    listItem.textContent = notificationTitle;
    notificationList.appendChild(listItem);

    notificationSection.classList.remove("hidden");
});
