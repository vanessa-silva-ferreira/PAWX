<a href="{{ $href }}" class="flex items-center px-4 py-2 mb-3 text-pawx-brown rounded-md hover:bg-stone-100 {{ $active ? 'bg-stone-100' : '' }}">
    <x-dashboard.sidebar.icon
        width="24"
        height="24"
        viewBox="0 0 24 24"
        :paths="$iconPaths"
        class="mr-4 mt-1 mb-1 ml-3"
    />
    <span id="menu-text" class="sidebar-full-only">{{ $label }}</span>
</a>
