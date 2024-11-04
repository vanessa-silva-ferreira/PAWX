@props([
    'width' => '20',
    'height' => '20',
    'viewBox' => '0 0 24 24',
    'paths' => []
])

<svg
    {{ $attributes->merge(['class' => 'text-gray-400']) }}
    width="{{ $width }}"
    height="{{ $height }}"
    viewBox="{{ $viewBox }}"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
>
    @foreach ($paths as $path)
        <path
            d="{{ $path['d'] }}"
        @foreach ($path as $attr => $value)
            @if ($attr !== 'd')
                {{ $attr }}="{{ $value }}"
            @endif
        @endforeach
        />
    @endforeach
</svg>
