<form method="POST" action="{{ route('logout') }}" style="display: inline;">
    @csrf
    <a href="#"
       onclick="event.preventDefault(); this.closest('form').submit();"
       class="block px-4 py-2 text-stone-600 hover:bg-stone-100 hover:text-stone-800 transition ease-in-out duration-150">
        Terminar Sessão
    </a>
</form>
