// Function to toggle sidebar collapse

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const toggleIcon = document.getElementById('toggle-icon');
    const menuTexts = document.querySelectorAll('#menu-text');
    const searchSection = document.getElementById('search-section');

    if (!sidebar || !toggleIcon) {
        console.error('Sidebar or Toggle Icon element is missing!');
        return;
    }

    // Toggle collapsed state
    const attrName = "data-collapsed";
    const isCollapsed = sidebar.getAttribute(attrName) === "true";
    sidebar.setAttribute(attrName, `${!isCollapsed}`);

    // Update classes for width adjustment
    sidebar.classList.toggle('max-w-[6.7rem]');
    sidebar.classList.toggle('max-w-64');

    // Toggle visibility of menu texts and search section
    menuTexts?.forEach(text => text.classList.toggle('hidden'));
    searchSection?.classList.toggle('hidden');

    // Update toggle icon
    toggleIcon.innerText = isCollapsed ? '+' : '-';

    console.table({ isCollapsed, sidebar });
}

