<input
    id="{{ $id ?? $name }}"
    name="{{ $name }}"
    type="{{ $type ?? 'text' }}"
    value="{{ $value ?? '' }}"
    {{ $attributes->merge(['class' => 'w-full p-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-2 focus:ring-pawx-orange/70 bg-white']) }}
/>
