<div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
    @isset($header)
        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $header }}</h2>
            @if(isset($description))
                <p class="text-gray-600 dark:text-gray-400">{{ $description }}</p>
            @endif
        </div>
    @endisset

    <div class="content">
        {{ $slot }}
    </div>
</div>
