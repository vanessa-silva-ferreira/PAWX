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
    @if($label)
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    @endif
    <input
        type="{{ $type }}"
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @class([$class, 'is-invalid' => $errors->has($name)])
        @if($required) required @endif
        {{ $attributes }}
    >
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
