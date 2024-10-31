@props([
    'type' => $type ?? 'text',
    'name' => $name,
    'label' => $label,
    'value' => $value ?? '',
    'required' => $required ?? false,
    'placeholder' => $placeholder ?? '',
    'class' => $class ?? 'form-control',
])

<div class="form-group">
    @if($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        class="{{ $class }}"
        @if($required) required @endif
        {{ $attributes }}
    >
</div>
