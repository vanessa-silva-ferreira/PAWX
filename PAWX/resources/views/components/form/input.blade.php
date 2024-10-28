<input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'default-class']) }}
/>
