<div class="flex h-screen">
    <aside id="sidebar" class="bg-white dark:bg-gray-800 p-4 transition-all duration-300">
{{--        w-64--}}

        <div class="p-5 flex items-center">
            @include('components.dashboard.sidebar.logo')
        </div>

        <div class="px-5 py-3">
            @include('components.dashboard.sidebar.search')
        </div>

{{--        @include('')--}}

    </aside>
</div>
