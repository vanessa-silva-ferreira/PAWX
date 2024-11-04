<div id="sidebar" class="flex flex-col h-screen bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 transition-all duration-300 w-64">
    <!-- Toggle Button -->
    <button onclick="toggleSidebar()" class="p-2 focus:outline-none dark:text-gray-100">
        <span id="toggle-icon" class="material-icons">chevron_left</span>
    </button>

    <!-- Logo Section -->
    <div class="flex items-center justify-center p-4 bg-orange-500">
        <div class="w-8 h-8 rounded-full"></div>
    </div>

    <!-- Search Section -->
    <div id="search-section" class="p-4">
        <input type="text" placeholder="Search" class="w-full p-2 rounded bg-gray-200 dark:bg-gray-800 dark:text-gray-100 outline-none">
    </div>

    <!-- Main Menu -->
    <nav class="flex flex-col space-y-4 mt-4">
        <!-- Menu Items -->
        <a href="#" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">
            <span class="material-icons">home</span>
            <span class="menu-text ml-2">Home</span>
        </a>
        <a href="#" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">
            <span class="material-icons">dashboard</span>
            <span class="menu-text ml-2">Dashboard</span>
        </a>
        <a href="#" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">
            <span class="material-icons">notifications</span>
            <span class="menu-text ml-2">Notificações</span>
            <span class="ml-auto text-xs bg-orange-500 text-white rounded-full px-2">8</span>
        </a>

    </nav>

    <!-- Workspace Section -->
    <div class="flex flex-col mt-auto space-y-2 p-4">
        <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 menu-text">WORKSPACE</h3>
        <a href="#" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">
            <span class="material-icons">pets</span>
            <span class="menu-text ml-2">Animal A</span>
        </a>
        <a href="#" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">
            <span class="material-icons">pets</span>
            <span class="menu-text ml-2">Animal B</span>
        </a>
        <a href="#" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg">
            <span class="material-icons">pets</span>
            <span class="menu-text ml-2">Animal C</span>
        </a>
    </div>

    <!-- Bottom Theme Toggle and Help Icons -->
    <div class="flex items-center justify-between p-4">
        <button id="theme-toggle" onclick="toggleTheme()" class="p-2">
            <span id="icon-sun" class="material-icons hidden">wb_sunny</span>
            <span id="icon-moon" class="material-icons">brightness_2</span>
        </button>
        <button class="p-2">
            <span class="material-icons">help_outline</span>
        </button>
    </div>
</div>
