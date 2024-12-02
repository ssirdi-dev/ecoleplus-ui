@props([
    'method' => 'POST',
    'hasFiles' => false,
])

<form
    method="{{ $realMethod() }}"
    {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!}
    {{ $attributes->merge(['class' => $classes()]) }}
>
    @csrf

    @if($spoofMethod())
        @method($method)
    @endif

    {{ $slot }}
</form>
