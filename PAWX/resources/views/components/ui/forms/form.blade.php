@props(['link', 'method' => 'POST', 'enctype' => 'application/x-www-form-urlencoded'])

<form action="{{ $link }}" method="{{ strtolower($method) === 'get' ? 'GET' : 'POST' }}" enctype="{{ $enctype }}">
    @csrf
    @if(!in_array(strtoupper($method), ['GET', 'POST']))
        @method($method)
    @endif

    {{ $slot }}
</form>
