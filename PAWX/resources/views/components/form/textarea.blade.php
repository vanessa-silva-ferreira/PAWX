@props([
    'name' => 'textarea',
    'id' => null,
    'label' => '',
    'placeholder' => '',
    'value' => '',
    'class' => '',
    'rows' => 4,
    'error' => true
])

<div class="form-group">
    @if($label)
        <label for="{{ $id ?? $name }}" class="block mb-1">{{ $label }}</label>
    @endif

        <textarea
            id="{{ $id ?? $name }}"
            name="{{ $name }}"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            class="w-full p-2 border text-sm border-pawx-grey rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange placeholder:text-pawx-brown/70 text-pawx-brown/70 {{ $class }}"
            {{ $attributes }}
            >{{ old($name, $value) ?: '' }}
        </textarea>



    @if($error)
        <x-form.validation-error name="{{ $name }}" />
    @endif
</div>
