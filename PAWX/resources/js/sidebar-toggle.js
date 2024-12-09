// Keep track of the current viewport state
let wasMobile = false;

function toggleSidebar(forceCollapse = null) {
    const sidebar = document.getElementById('sidebar');
    const toggleIcon = document.getElementById('toggle-icon');
    const menuTexts = document.querySelectorAll('#menu-text');
    const searchSection = document.getElementById('search-section');

    if (!sidebar || !toggleIcon) {
        console.error('Sidebar or Toggle Icon element is missing!');
        return;
    }

    // Determine if we should collapse or expand based on `forceCollapse`
    const attrName = "data-collapsed";
    const isCollapsed = forceCollapse !== null ? forceCollapse : sidebar.getAttribute(attrName) === "true";
    sidebar.setAttribute(attrName, `${!isCollapsed}`);

    // Update classes for width adjustment
    sidebar.classList.toggle('max-w-[6.7rem]', isCollapsed); // Collapse for mobile
    sidebar.classList.toggle('max-w-64', !isCollapsed); // Expand for desktop

    // Toggle visibility of menu texts and search section
    menuTexts?.forEach(text => text.classList.toggle('hidden', isCollapsed));
    searchSection?.classList.toggle('hidden', isCollapsed);

    // Update toggle icon
    toggleIcon.innerText = isCollapsed ? '+' : '-';
}

function handleViewportChange() {
    const isMobile = window.matchMedia("(max-width: 768px)").matches;

    // Only toggle if transitioning between mobile and desktop states
    if (isMobile !== wasMobile) {
        toggleSidebar(isMobile); // Collapse if mobile, expand if desktop
        wasMobile = isMobile;    // Update the state
    }
}

// Add event listener for viewport changes
window.addEventListener('resize', handleViewportChange);

// Run on page load to set the initial state
document.addEventListener('DOMContentLoaded', () => {
    wasMobile = window.matchMedia("(max-width: 768px)").matches; // Initialize the state
    toggleSidebar(wasMobile); // Collapse for mobile, expand for desktop
    handleViewportChange(); // Ensure correct initial state
});

const toggleBtn = document.querySelector('#toggle-sidebar');
toggleBtn.addEventListener('click', () => toggleSidebar());
