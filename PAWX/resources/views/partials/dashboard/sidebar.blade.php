{{--<div class="flex h-screen">--}}
    <aside id="sidebar" class="bg-white dark:bg-gray-800 p-4 transition-all duration-300" data-collapsed="false">
        <!-- Toggle Button -->
        <button onclick="toggleSidebar()" class="p-2 focus:outline-none dark:text-gray-100">
            <span id="toggle-icon" class="material-symbols-outlined">+</span>
        </button>

        <div class="px-3">
            <div class="p-2 flex items-center">
                @include('components.dashboard.sidebar.logo')
                {{--            make the logo be the toggle itself --}}
            </div>

            <div class="py-3">
                @include('components.dashboard.sidebar.search')
                {{--            keep the icon, when "toggled"--}}
            </div>
        </div>


        <nav class="flex-grow mt-4 px-3">
            {{--           @foreach($titles ?? [] as $title)--}}
            {{--               @include('components.dashboard.sidebar.title',--}}
            {{--                 ['title' => $title['title']])--}}
            {{--           @endforeach--}}

            @include('components.dashboard.sidebar.title',
                 ['title' => 'Menu'])

            {{--       bigger gap between the items--}}
            {{--       when toggled, the hover has to change its size to be proportional to the icon (square over it)--}}
            {{--       problem when the svg icons have multiple paths--}}
            @foreach($menuItems ?? [] as $item)
                @include('components.dashboard.sidebar.menu-item', [
                    'href' => $item['href'],
                    'iconPaths' => [
                        [
                            'd' => $item['icon'],
                            'stroke' => 'currentColor',
                            //'stroke-width' => '1.5',
                            'stroke-width' => '30',
                            'stroke-linecap' => 'round',
                            'stroke-linejoin' => 'round'
                        ]
                    ],
                    'label' => $item['label'],
                    'notification' => $item['notification'] ?? null
                ])
            @endforeach
        </nav>
        <nav class="flex-grow mt-4 px-3">
            {{--           @foreach($titles ?? [] as $title)--}}
            {{--               @include('components.dashboard.sidebar.title',--}}
            {{--                 ['title' => $title['title']])--}}
            {{--           @endforeach--}}

            @include('components.dashboard.sidebar.title',
                 ['title' => 'Workspace'])

            @foreach($workspaceItems ?? [] as $item)
                @include('components.dashboard.sidebar.workspace-item', [
                    'href' => $item['href'],
                    'iconPaths' => [
                        [
                            'd' => $item['icon'],
                            'stroke' => 'currentColor',
                            //'stroke-width' => '1.5',
                            'stroke-width' => '30',
                            'stroke-linecap' => 'round',
                            'stroke-linejoin' => 'round'
                        ]
                    ],
                    'label' => $item['label'],
                    'notification' => $item['notification'] ?? null
                ])
            @endforeach
        </nav>

        {{--    correct (and change) the light and dark colors--}}
        {{--    change its position and icons--}}
        @include('components.dashboard.sidebar.theme-toggle')



        {{--        @include('')--}}

    </aside>
<script>
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

        console.table({ isCollapsed, sidebar });
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
</script>



