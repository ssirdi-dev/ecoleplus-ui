@props([
    'type' => 'button',
    'variant' => 'primary',
    'iconLeft' => null,
    'iconRight' => null,
])

@php
    $baseClasses = config('ecoleplus-ui.components.button.base');
    $variantClasses = config('ecoleplus-ui.components.button.variants.' . $variant, '');
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $baseClasses . ' ' . $variantClasses]) }}
>
    @if($iconLeft)
        <x-dynamic-component 
            :component="$iconLeft" 
            class="-ml-1 mr-2 h-5 w-5"
        />
    @endif

    {{ $slot }}

    @if($iconRight)
        <x-dynamic-component 
            :component="$iconRight" 
            class="-mr-1 ml-2 h-5 w-5"
        />
    @endif
</button> 