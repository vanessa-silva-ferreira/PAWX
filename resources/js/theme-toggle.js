
function toggleTheme() {
    const html = document.documentElement;
    const isDarkMode = html.classList.toggle('dark');

    document.getElementById('icon-sun').classList.toggle('hidden', isDarkMode);
    document.getElementById('icon-moon').classList.toggle('hidden', !isDarkMode);

    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
}

document.addEventListener("DOMContentLoaded", function() {
    const savedTheme = localStorage.getItem('theme');
    const html = document.documentElement;
    const isDarkMode = savedTheme === 'dark';

    html.classList.toggle('dark', isDarkMode);
    document.getElementById('icon-sun').classList.toggle('hidden', isDarkMode);
    document.getElementById('icon-moon').classList.toggle('hidden', !isDarkMode);
});
