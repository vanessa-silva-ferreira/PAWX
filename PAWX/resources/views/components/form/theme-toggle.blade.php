<!-- Tailwind CSS Script -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {},
        },
        plugins: [],
    }
</script>

<!-- Updated Material Symbols Link -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<!-- Theme Toggle -->
<div class="flex flex-col items-center space-y-4 p-4 mt-auto">
    <button id="theme-toggle" onclick="toggleTheme()" class="p-2 flex items-center justify-center">
        <span id="icon-sun" class="material-symbols-outlined bg-black text-white rounded-full p-1 text-2xl hidden">dark_mode</span>
        <span id="icon-moon" class="material-symbols-outlined bg-white text-black rounded-full p-1 text-2xl">light_mode</span>
    </button>
</div>

<!-- Script to toggle the theme -->
<script>
    function toggleTheme() {
        const html = document.documentElement;
        html.classList.toggle('dark');

        const iconSun = document.getElementById('icon-sun');
        const iconMoon = document.getElementById('icon-moon');

        iconSun.classList.toggle('hidden');
        iconMoon.classList.toggle('hidden');
    }
</script>
