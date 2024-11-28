{{--<form method="POST" action="{{ route($route) }}" {{ $attributes }}>--}}
{{--    @csrf--}}
{{--    <button type="{{ $type }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">--}}
{{--        Terminar Sessão--}}
{{--    </button>--}}
{{--</form>--}}

<form method="POST" action="{{ route('logout') }}" {{ $attributes }}>
    @csrf
    <button type="submit" class="mt-6 font-semibold text-gray-800 text-sm hover:text-gray-600 transition ease-in-out duration-150">
        Terminar Sessão
    </button>
</form>

