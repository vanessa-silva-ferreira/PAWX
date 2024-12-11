@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'options' => [],
    'placeholder' => null,
    'required' => false,
    'valueKey' => 'id',
    'labelKey' => 'name',
    'extraAttributes' => [],
    'selected' => null,
])

<div class="form-group">
    <select
        id="{{ $id }}"
        name="{{ $name }}"
        class="w-full h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white"
        {{ $required ? 'required' : '' }}
    >
        @if ($placeholder)
            <option value="" disabled selected hidden>{{ $placeholder }}</option>
        @endif
        {{ $slot }}
        @foreach ($options as $option)
            <option
                value="{{ data_get($option, $valueKey) }}"
            {{ $selected == data_get($option, $valueKey) ? 'selected' : '' }}
            @foreach ($extraAttributes as $attrKey => $attrValue)
                {{ $attrKey }}="{{ data_get($option, $attrValue) }}"
            @endforeach
            >
            {{ data_get($option, $labelKey) }}
            </option>
        @endforeach
    </select>
</div>
