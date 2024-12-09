@props([
    'action',
    'placeholder' => 'Search...'
])

<form method="GET" action="{{ $action }}" class="relative flex-grow">
    <input
        type="text"
        name="search"
        placeholder="{{ $placeholder }}"
        class="text-sm w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="{{ request('search') }}"
    />
    <button
        type="submit"
        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" x2="16.65" y1="21" y2="16.65"/>
        </svg>
    </button>
</form>
