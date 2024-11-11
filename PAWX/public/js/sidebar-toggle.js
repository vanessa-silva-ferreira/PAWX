// Function to toggle sidebar collapse

function toggleSidebar() {

    const sidebar = document.getElementById('sidebar')

    // state of toggle is stored in data-collapsed

    const attrName = "data-collapsed";
    const isCollapsed = sidebar.getAttribute(attrName) === "true";
    sidebar.setAttribute(
        attrName,
        `${!isCollapsed}`
    );

    console.table({
        domAttr: sidebar.getAttribute(attrName),
        attrName,
        isCollapsed
    })

    const parent = document.getElementById('sidebar').parentElement;

    parent.classList.toggle("grid-cols-12")
    parent.classList.toggle("grid-cols-6")

    console.log(parent.classList.toString())


    const menuTexts = document.querySelectorAll('#menu-text');
    const toggleIcon = document.getElementById('toggle-icon');
    const searchSection = document.getElementById('search-section');

    // Toggle sidebar width
    sidebar.classList.toggle('max-w-[6.7rem]');
    sidebar.classList.toggle('max-w-64');

    // Toggle visibility of text labels
    menuTexts.forEach(text => text.classList.toggle('hidden'));

    // Toggle search section visibility
    searchSection.classList.toggle('hidden');

    // Toggle icon between chevron and menu
    toggleIcon.innerText = sidebar.classList.contains('w-16') ? '+' : '-';
}
