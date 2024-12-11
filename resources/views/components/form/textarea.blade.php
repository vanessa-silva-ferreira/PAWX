@props([
    'name' => 'textarea',
    'id' => null,
    'value' => '',
    'class' => '',
    'rows' => 3,
    'error' => true
])

<div class="form-group">
        <textarea
            id="{{ $id ?? $name }}"
            name="{{ $name }}"
            rows="{{ $rows }}"
            class="w-full p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70
      placeholder:text-pawx-brown/30 text-sm"
            {{ $attributes }}
            >{{ old($name, $value) ?: '' }}
        </textarea>



    @if($error)
        <x-form.validation-error name="{{ $name }}" />
    @endif
</div>
