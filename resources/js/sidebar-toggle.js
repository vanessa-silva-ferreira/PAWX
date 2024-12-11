let wasMobile = window.matchMedia("(max-width: 768px)").matches;

function getCollapsedState() {
    return localStorage.getItem('sidebarCollapsed') === 'true';
}

function setSidebarState(isCollapsed) {
    const sidebar = document.getElementById('sidebar');
    sidebar.setAttribute("data-collapsed", isCollapsed);

    // Update classes for width adjustment
    sidebar.classList.toggle('max-w-[6.7rem]', isCollapsed); // Collapse
    sidebar.classList.toggle('max-w-64', !isCollapsed); // Expand

    const menuTexts = document.querySelectorAll('#menu-text');
    menuTexts.forEach(text => text.classList.toggle('hidden', isCollapsed));
}

function toggleSidebar() {
    const isCollapsed = getCollapsedState();
    setSidebarState(!isCollapsed);

    localStorage.setItem('sidebarCollapsed', `${!isCollapsed}`);
}

function highlightMenuItem() {
    const menuItems = document.querySelectorAll('a');

    menuItems.forEach(menuItem => menuItem.classList.remove('bg-stone-200'));

    this.classList.add('bg-stone-200'); // Use 'this' to refer to the clicked item
}

function handleViewportChange() {
    const isMobile = window.matchMedia("(max-width: 768px)").matches;

    if (isMobile !== wasMobile) {
        toggleSidebar(isMobile);
        wasMobile = isMobile;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const initialState = getCollapsedState();
    setSidebarState(initialState);

    const menuItems = document.querySelectorAll('a');
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            highlightMenuItem.call(this);
        });
    });

    handleViewportChange();
});

const toggleBtn = document.querySelector('#toggle-sidebar');
toggleBtn.addEventListener('click', toggleSidebar);
window.addEventListener('resize', handleViewportChange);
