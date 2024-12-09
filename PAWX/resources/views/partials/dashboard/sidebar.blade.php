{{--<div class="flex h-screen">--}}
    <aside id="sidebar" class="bg-white dark:bg-gray-800 p-4 transition-all duration-300" data-collapsed="false">
        <!-- Toggle Button -->
        <button id="toggle-sidebar" class="p-2 focus:outline-none dark:text-gray-100">
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

@vite('resources/js/sidebar-toggle.js')



