@if($url)
    <a href="{{ $url }}" {{ $attributes }}>
        {{ $slot }}
    </a>
@else
    <button type="submit" {{ $attributes }}>
        {{ $slot }}
    </button>
@endif
