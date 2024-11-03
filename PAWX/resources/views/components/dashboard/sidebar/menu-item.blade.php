{{--<a href="{{ $href }}" class="flex items-center px-4 py-2 text-orange-950 hover:bg-pawx-brown">--}}
{{--    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--        {!! $icon !!}--}}
{{--    </svg>--}}
{{--    <span class="sidebar-full-only">{{ $label }}</span>--}}
{{--</a>--}}


<a href="{{ $href }}" class="flex items-center px-4 py-2 text-orange-950 hover:bg-pawx-brown">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $icon }}"></path>
    </svg>
    <span class="sidebar-full-only">{{ $label }}</span>
    @if(isset($notification))
        <span class="ml-auto bg-pawx-orange text-white text-xs font-semibold px-2 py-1 rounded-full">{{ $notification }}</span>
    @endif
</a>
