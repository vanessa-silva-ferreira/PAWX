@if ($errors->has($name))
    <div class="flex items-center text-pawx-orange min-h-[1.5rem]">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <span class="text-sm text-gray-500">{{ $errors->first($name) }}</span>
    </div>
@endif

