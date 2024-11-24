<div class="flex flex-col items-center space-y-4">
    <div class="flex items-center w-full">
        <hr class="flex-grow border-gray-200" />
        <span class="mx-4 text-sm text-gray-400">{{ $dividerText ?? 'OU' }}</span>
        <hr class="flex-grow border-gray-200" />
    </div>

    <div class="flex space-x-4">
        @foreach ($buttons as $button)
            <button
                class="flex items-center justify-center w-12 h-12 border rounded-md border-pawx-gray">
                <img src="{{ $button['src'] }}" alt="{{ $button['alt'] }}" class="h-[50%]" />
            </button>
        @endforeach
    </div>
</div>

<link href="{{ asset('css/auth.css') }}" rel="stylesheet">

