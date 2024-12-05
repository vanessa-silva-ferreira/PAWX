@props([
    'type' => 'text',
    'name',
    'label' => null,
    'value' => '',
    'required' => false,
    'placeholder' => '',
    'class' => 'form-control',
    'id' => null,
])

<div class="form-group">
    @if ($label)
        <label for="{{ $id ?? $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        class="w-full h-16 p-4 pt-6 pb-2 mt-1 mb-3 min-w-fit md:min-w-[12ch] border border-stone-400 rounded-md focus:outline-none focus:ring-1
        focus:ring-pawx-orange text-pawx-brown/70 placeholder:text-pawx-brown/30"
        {{ $required ? 'required' : '' }}
        {{ $attributes }}
    />
</div>
