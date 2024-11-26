@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'options' => [],
    'placeholder' => 'Select an option',
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
        class="w-full p-2.5 mt-1 mb-2 border border-pawx-grey rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange/70 bg-white text-pawx-brown/70"
        {{ $required ? 'required' : '' }}>
        @if ($placeholder)
            <option>{{ $placeholder }}</option>
        @endif

    @foreach ($options as $option)
            <option
                value="{{ $option[$valueKey] }}"
            {{ $selected == $option[$valueKey] ? 'selected' : '' }}
            @foreach ($extraAttributes as $attrKey => $attrValue)
                {{ $attrKey }}="{{ $option[$attrValue] ?? '' }}"
            @endforeach
            >
            {{ data_get($option, $labelKey) }}
            </option>
        @endforeach
    </select>
</div>
