<button
    type="{{ $type ?? 'button' }}"
    {{ $attributes->merge(['class' => 'w-full bg-pawx-orange text-white py-2 px-4 rounded-md font-semibold hover:bg-pawx-orange/90 transition duration-300']) }}>
    {{ $slot }}
</button>
