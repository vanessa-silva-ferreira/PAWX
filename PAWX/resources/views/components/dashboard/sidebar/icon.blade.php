@props([
    'width' => '20',
    'height' => '20',
    'viewBox' => '0 0 24 24',
    'paths' => []
])

{{--<div style="max-width: 100px;">--}}
{{--    <svg--}}
{{--        {{ $attributes->merge(['class' => 'text-gray-400']) }}--}}
{{--        width="{{ $width }}"--}}
{{--        height="{{ $height }}"--}}
{{--        viewBox="{{ $viewBox }}"--}}
{{--        fill="none"--}}
{{--        xmlns="http://www.w3.org/2000/svg"--}}
{{--    >--}}
{{--        @foreach ($paths as $path)--}}
{{--            <path--}}
{{--                d="{{ $path['d'] }}"--}}
{{--            @foreach ($path as $attr => $value)--}}
{{--                @if ($attr !== 'd')--}}
{{--                    {{ $attr }}="{{ $value }}"--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--            />--}}
{{--        @endforeach--}}
{{--    </svg>--}}
{{--</div>--}}


<div style="max-width: 100px;">
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
                    @if (is_array($value))
                        {{ $attr }}="{{ implode(' ', $value) }}"
                    @else
                        {{ $attr }}="{{ $value }}"
                    @endif
                @endif
            @endforeach
            />
        @endforeach
    </svg>
</div>
