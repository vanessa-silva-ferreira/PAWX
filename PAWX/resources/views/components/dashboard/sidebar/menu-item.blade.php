<a href="{{ $href }}" class="flex items-center px-4 py-2 text-orange-950 hover:bg-pawx-brown">
    <div style="max-width: 100px;">
        <x-dashboard.sidebar.icon
            width="100%"
            height=""
            viewBox="0 0 411 431"
            :paths="$iconPaths"
            class="w-5 h-5 mr-3"
        />
    </div>
    <span class="sidebar-full-only">{{ $label }}</span>
    @if(isset($notification))
        <span class="ml-auto bg-pawx-orange text-white text-xs font-semibold px-2 py-1 rounded-full">{{ $notification }}</span>
    @endif
</a>
