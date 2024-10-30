<div class="relative w-full">
    <button onclick="toggleDropdown()" class="flex items-center justify-between w-full p-2 rounded-lg bg-white text-gray-700">
        <div class="flex items-center">
            <span class="material-icons mr-2">manage_accounts</span>
            Gestão
        </div>
        <span class="material-icons">arrow_drop_down</span>
    </button>

    <div id="dropdownMenu" class="hidden mt-2 bg-white border rounded-lg shadow-lg w-full">
        @foreach($items as $item)
            <a href="{{ $item['url'] }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                {{ $item['label'] }}
            </a>
        @endforeach
    </div>
</div>

<script>
    function toggleDropdown() {
        const menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('hidden');
    }

    // Close dropdown if clicked outside
    window.addEventListener('click', function(event) {
        const menu = document.getElementById('dropdownMenu');
        const button = event.target.closest('button');

        if (!button || !button.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
</script>
