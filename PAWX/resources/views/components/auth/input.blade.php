<input
    id="{{ $id ?? $name }}"
    name="{{ $name }}"
    type="{{ $type ?? 'text' }}"
    value="{{ $value ?? '' }}"
    {{ $attributes->merge(['class' => 'w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-2 focus:ring-pawx-orange/70 bg-white']) }}
/>

{{--<button--}}
{{--    type="{{ $type ?? 'button' }}"--}}
{{--    {{ $attributes->merge(['class' => 'w-full bg-pawx-orange text-white py-2 px-4 rounded-md font-semibold hover:bg-pawx-orange/90 transition duration-300']) }}>--}}
{{--    {{ $slot }}--}}
{{--</button>--}}

{{--@error($name)--}}
{{--<span {{ $attributes->merge(['class' => 'text-red-500 text-xs']) }}>--}}
{{--        {{ $message }}--}}
{{--    </span>--}}
{{--@enderror--}}
