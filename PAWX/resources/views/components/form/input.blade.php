@props([
    "ref",
    "title" => null,
    "val" => null,
    "placeholder" => null,
    "class" => null,
])

<div class="mb-4">
    {{-- Label --}}
    <label for="{{ $ref }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $title ?? Str::ucfirst($ref) }}
    </label>
    {{-- .Label --}}

    {{-- Input --}}
    <input
        id="{{ $ref }}"
        name="{{ $ref }}"
        autocomplete="{{ $ref }}"
        value="{{ old($ref, $val) }}"
        {{ $attributes->merge([
                "class" => "block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 " .
                (isset($class) ? $class : "") .
                ($errors->has($ref) ? " border-red-500" : " border-gray-300"),
                "placeholder" => $placeholder ?? "Insert " . $ref,
        ]) }}
    >
    {{-- .Input --}}

    {{-- Error Message --}}
    @error($ref)
    <span class="text-red-600 text-sm mt-1" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    {{-- .Error Message --}}
</div>
