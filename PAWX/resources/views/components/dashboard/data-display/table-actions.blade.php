<td class="px-1.5">
    <a href="{{ route($rolePrefix . '.' . $resource . '.edit', $id) }}"
       class="text-pawx-brown/40 hover:text-pawx-brown/70 transition-colors" title="Edit">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
            <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
            <path d="m15 5 4 4"/>
        </svg>
    </a>
</td>
<td class="px-1.5">
    <a href="{{ route($rolePrefix . '.' . $resource . '.show', $id) }}"
       class="text-pawx-brown/40 hover:text-pawx-brown/70 transition-colors" title="View">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
    </a>
</td>
@if(auth()->user()->hasRole('admin'))
    <td class="px-1.5">
        <form method="POST" action="{{ route($rolePrefix . '.' . $resource . '.destroy', $id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-pawx-brown/40 hover:text-pawx-brown/70 transition-colors" title="Delete">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                    <path d="M3 6h18"/>
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                </svg>
            </button>
        </form>
    </td>
@endif
