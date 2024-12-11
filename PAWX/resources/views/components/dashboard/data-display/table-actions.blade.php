<td class="px-1.5">
    <a href="{{ route($rolePrefix . '.' . $resource . '.show', $id) }}"
       class="text-pawx-brown/40 hover:text-pawx-brown/70 transition-colors" title="View">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
    </a>
</td>

<td class="px-1.5">
    <a href="{{ route($rolePrefix . '.' . $resource . '.edit', $id) }}"
       class="text-pawx-brown/40 hover:text-pawx-brown/70 transition-colors" title="Edit">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
            <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
            <path d="m15 5 4 4"/>
        </svg>
    </a>
</td>

<div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 shadow-lg text-center">
        <p class="text-stone-600 text-md">Tem a certeza que quer <span class="font-bold">remover</span> o item?</p>
        <div class="flex justify-center mt-4 space-x-4">
            <button id="confirmYes" class="bg-pawx-orange text-white px-4 py-2 rounded-xl border border-pawx-orange hover:bg-white hover:border-pawx-orange hover:text-pawx-orange transition">Sim</button>
            <button id="confirmNo" class="bg-pawx-brown text-white px-4 py-2 rounded-xl border border-pawx-brown hover:bg-white hover:border-pawx-brown hover:text-pawx-brown transition">Não</button>
        </div>
    </div>
</div>

<td class="px-1.5">
    <form method="POST" action="{{ route($rolePrefix . '.' . $resource . '.destroy', $id) }}">
        @csrf
        @method('DELETE')
        <button
            type="button"
            class="text-pawx-brown/40 hover:text-pawx-brown/70 transition-colors"
            title="Delete"
            onclick="showConfirmModal(this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                <path d="M3 6h18"/>
                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
            </svg>
        </button>
    </form>
</td>

<script>
    function showConfirmModal(button) {
        const modal = document.getElementById('confirmModal');
        const confirmYes = document.getElementById('confirmYes');
        const confirmNo = document.getElementById('confirmNo');

        modal.classList.remove('hidden');

        confirmYes.onclick = function () {
            modal.classList.add('hidden');
            button.closest('form').submit();
        };

        confirmNo.onclick = function () {
            modal.classList.add('hidden');
        };
    }
</script>
