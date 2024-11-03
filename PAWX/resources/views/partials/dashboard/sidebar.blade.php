
<aside id="sidebar" class="fixed top-0 left-0 h-screen bg-white text-white flex flex-col">
{{--<aside id="sidebar" class="fixed top-0 left-0 h-screen bg-pawx-brown text-white transition-all duration-300 ease-in-out flex flex-col w-16 hover:w-64 group">--}}
    <div class="p-5 flex items-center">
        @include('components.dashboard.sidebar.logo')

    </div>

    <div class="px-5 py-3">
        @include('components.dashboard.sidebar.search')

        <nav class="flex-grow mt-4">
            <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase mb-2">MAIN MENU</h3>
            @foreach($menuItems ?? [] as $item)
                @include('components.dashboard.sidebar.menu-item', [
                    'href' => $item['href'],
                    'icon' => $item['icon'],
                    'label' => $item['label'],
                    'notification' => $item['notification'] ?? null
                ])
            @endforeach
        </nav>

        <div class="mt-auto">
            <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase mb-2">{{ $workspaceTitle ?? 'WORKSPACE' }}</h3>
            @foreach($workspaceItems ?? [] as $item)
                @include('components.dashboard.sidebar.workspace-item', [
                    'href' => $item['href'],
                    'label' => $item['label']
                ])
            @endforeach
        </div>
    </div>
    <div class="p-4 flex justify-between">
        <!-- Add bottom icons here -->
    </div>
</aside>

{{--<aside id="sidebar" class="sticky top-0 h-screen bg-pawx-brown text-white transition-all duration-300 ease-in-out flex flex-col font-DM">--}}
{{--    <div class="p-4 flex items-center space-x-2">--}}
{{--        <div class="w-8 h-8 bg-pawx-orange rounded"></div>--}}
{{--        <h2 class="text-lg font-semibold sidebar-full-only">PAWX</h2>--}}
{{--    </div>--}}

{{--    <div class="px-4 py-2 sidebar-full-only">--}}
{{--        <div class="relative">--}}
{{--            <input type="text" placeholder="Search" class="w-full px-3 py-2 bg-pawx-grey text-pawx-brown rounded-full placeholder-pawx-brown focus:outline-none focus:ring-2 focus:ring-pawx-orange">--}}
{{--            <svg class="w-5 h-5 absolute right-3 top-1/2 transform -translate-y-1/2 text-pawx-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <nav class="mt-4 flex-grow overflow-y-auto">--}}
{{--        <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider sidebar-full-only mb-2">MAIN MENU</h3>--}}
{{--        @foreach($menuItems ?? [] as $item)--}}
{{--            <a href="{{ $item['href'] }}" class="flex items-center px-4 py-2 text-gray-300 hover:bg-pawx-grey hover:text-pawx-brown rounded-lg mx-2 mb-1">--}}
{{--                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>--}}
{{--                </svg>--}}
{{--                <span class="sidebar-full-only">{{ $item['label'] }}</span>--}}
{{--                @if(isset($item['notification']))--}}
{{--                    <span class="ml-auto bg-pawx-orange text-white text-xs font-semibold px-2 py-1 rounded-full sidebar-full-only">{{ $item['notification'] }}</span>--}}
{{--                @endif--}}
{{--            </a>--}}
{{--        @endforeach--}}
{{--    </nav>--}}

{{--    @if(isset($workspaceTitle) && isset($workspaceItems))--}}
{{--        <div class="mt-auto">--}}
{{--            <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider sidebar-full-only mb-2">{{ $workspaceTitle }}</h3>--}}
{{--            @foreach($workspaceItems as $item)--}}
{{--                <a href="{{ $item['href'] }}" class="flex items-center px-4 py-2 text-gray-300 hover:bg-pawx-grey hover:text-pawx-brown rounded-lg mx-2 mb-1">--}}
{{--                    <span class="w-2 h-2 bg-pawx-orange rounded-full mr-3"></span>--}}
{{--                    <span class="sidebar-full-only">{{ $item['label'] }}</span>--}}
{{--                    <svg class="w-4 h-4 ml-auto sidebar-full-only" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>--}}
{{--                    </svg>--}}
{{--                </a>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <div class="p-4 flex items-center justify-between text-gray-400">--}}
{{--        <button class="hover:text-white focus:outline-none">--}}
{{--            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--        <button class="hover:text-white focus:outline-none">--}}
{{--            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--        <button id="pin-sidebar" class="hover:text-white focus:outline-none">--}}
{{--            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--    </div>--}}
{{--</aside>--}}

{{--<style>--}}
{{--    .sidebar-full-only {--}}
{{--        @apply transition-opacity duration-300;--}}
{{--    }--}}
{{--    #sidebar:not(:hover) .sidebar-full-only {--}}
{{--        @apply opacity-0 invisible;--}}
{{--    }--}}
{{--    #sidebar:hover .sidebar-full-only {--}}
{{--        @apply opacity-100 visible;--}}
{{--    }--}}
{{--</style>--}}

{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function() {--}}
{{--        const sidebar = document.getElementById('sidebar');--}}
{{--        const pinButton = document.getElementById('pin-sidebar');--}}
{{--        let isPinned = false;--}}

{{--        pinButton.addEventListener('click', function() {--}}
{{--            isPinned = !isPinned;--}}
{{--            sidebar.classList.toggle('w-64', isPinned);--}}
{{--            sidebar.classList.toggle('w-16', !isPinned);--}}
{{--        });--}}

{{--        sidebar.addEventListener('mouseenter', function() {--}}
{{--            if (!isPinned) {--}}
{{--                sidebar.classList.add('w-64');--}}
{{--                sidebar.classList.remove('w-16');--}}
{{--            }--}}
{{--        });--}}

{{--        sidebar.addEventListener('mouseleave', function() {--}}
{{--            if (!isPinned) {--}}
{{--                sidebar.classList.remove('w-64');--}}
{{--                sidebar.classList.add('w-16');--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
