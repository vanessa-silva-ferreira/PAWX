@if ($errors->has($name))
    <span class="text-alert">{{ $errors->first($name) }}</span>
@endif
