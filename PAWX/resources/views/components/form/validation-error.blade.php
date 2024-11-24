{{--@if ($errors->has($name))--}}
{{--    <span class="text-alert">{{ $errors->first($name) }}</span>--}}
{{--@endif--}}

{{--@if ($errors->has($name))--}}
{{--    <div class="mt-1">--}}
{{--        <svg class="w-4 h-4 mr-1 text-pawx-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>--}}
{{--        </svg>--}}
{{--    </div>--}}
{{--@endif--}}


@if ($errors->has($name))
    <div class="mt-1 flex items-center text-pawx-orange">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <span class="text-sm text-gray-500">{{ $errors->first($name) }}</span>
    </div>
@endif

