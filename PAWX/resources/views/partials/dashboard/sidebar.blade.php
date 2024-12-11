<p id="toggle-sidebar" class="text-left text-3xl text-stone-500 uppercase mr-4 p-6 cursor-pointer">
    PAWX
</p>
<aside id="sidebar" class="bg-white dark:bg-stone-800 p-4 transition-all duration-300 max-w-64" data-collapsed="false">
    <nav class="mt-3">
        <ul>
            @foreach($menuItems ?? [] as $item)
                <li>
                    @include('components.dashboard.sidebar.menu-item', [
                        'href' => $item['href'],
                        'iconPaths' => $item['iconPaths'],
                        'label' => $item['label'],
                        'active' => Request::is(trim($item['href'], '/')), // Check if current route matches menu item href
                        'notification' => $item['notification'] ?? null
                    ])
                </li>
            @endforeach
        </ul>
    </nav>
</aside>



@vite('resources/js/sidebar-toggle.js')
