// Function to toggle sidebar collapse
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const menuTexts = document.querySelectorAll('.menu-text');
    const toggleIcon = document.getElementById('toggle-icon');
    const searchSection = document.getElementById('search-section');

    // Toggle sidebar width
    sidebar.classList.toggle('w-16');
    sidebar.classList.toggle('w-64');

    // Toggle visibility of text labels
    menuTexts.forEach(text => text.classList.toggle('hidden'));

    // Toggle search section visibility
    searchSection.classList.toggle('hidden');

    // Toggle icon between chevron and menu
    toggleIcon.innerText = sidebar.classList.contains('w-16') ? 'menu' : 'chevron_left';
}
