// Function to toggle the theme between light and dark mode
function toggleTheme() {
    const html = document.documentElement;
    const isDarkMode = html.classList.toggle('dark'); // Add/remove 'dark' class to <html> element

    // Toggle visibility of sun and moon icons based on the theme
    document.getElementById('icon-sun').classList.toggle('hidden', isDarkMode);
    document.getElementById('icon-moon').classList.toggle('hidden', !isDarkMode);

    // Save theme preference to localStorage
    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
}

// Load the saved theme on page load
document.addEventListener("DOMContentLoaded", function() {
    const savedTheme = localStorage.getItem('theme');
    const html = document.documentElement;
    const isDarkMode = savedTheme === 'dark';

    // Apply the saved theme and adjust icon visibility accordingly
    if (isDarkMode) {
        html.classList.add('dark'); // Set dark mode
        document.getElementById('icon-sun').classList.add('hidden'); // Hide sun icon
        document.getElementById('icon-moon').classList.remove('hidden'); // Show moon icon
    } else {
        html.classList.remove('dark'); // Set light mode
        document.getElementById('icon-sun').classList.remove('hidden'); // Show sun icon
        document.getElementById('icon-moon').classList.add('hidden'); // Hide moon icon
    }
});
