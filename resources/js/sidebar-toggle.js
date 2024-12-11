let wasMobile = window.matchMedia("(max-width: 768px)").matches;

// Function to get collapsed state from localStorage
function getCollapsedState() {
    return localStorage.getItem('sidebarCollapsed') === 'true';
}

// Update the sidebar based on the collapsed state
function setSidebarState(isCollapsed) {
    const sidebar = document.getElementById('sidebar');
    sidebar.setAttribute("data-collapsed", isCollapsed);

    // Update classes for width adjustment
    sidebar.classList.toggle('max-w-[6.7rem]', isCollapsed); // Collapse
    sidebar.classList.toggle('max-w-64', !isCollapsed); // Expand

    const menuTexts = document.querySelectorAll('#menu-text');
    menuTexts.forEach(text => text.classList.toggle('hidden', isCollapsed));
}

// Toggle sidebar visibility and save to localStorage
function toggleSidebar() {
    const isCollapsed = getCollapsedState();
    setSidebarState(!isCollapsed);

    // Save new state to localStorage
    localStorage.setItem('sidebarCollapsed', `${!isCollapsed}`);
}

// Function to highlight the selected menu item without changing sidebar state
function highlightMenuItem() {
    const menuItems = document.querySelectorAll('a');

    // Remove active class from all items
    menuItems.forEach(menuItem => menuItem.classList.remove('bg-stone-200'));

    // Add active class to the selected item
    this.classList.add('bg-stone-200'); // Use 'this' to refer to the clicked item
}

function handleViewportChange() {
    const isMobile = window.matchMedia("(max-width: 768px)").matches;

    // Collapse or expand based on viewport state
    if (isMobile !== wasMobile) {
        toggleSidebar(isMobile);
        wasMobile = isMobile;
    }
}

// Event listeners
document.addEventListener('DOMContentLoaded', () => {
    const initialState = getCollapsedState();
    setSidebarState(initialState); // Set initial sidebar state

    const menuItems = document.querySelectorAll('a');
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            highlightMenuItem.call(this); // Call highlight function
        });
    });

    handleViewportChange();
});

const toggleBtn = document.querySelector('#toggle-sidebar');
toggleBtn.addEventListener('click', toggleSidebar);
window.addEventListener('resize', handleViewportChange);
