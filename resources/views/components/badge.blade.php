@props([
    'variant' => 'primary',
    'size' => 'md',
    'rounded' => true,
])

@php
    $baseClasses = config('ecoleplus-ui.components.badge.base');
    $variantClasses = config('ecoleplus-ui.components.badge.variants.' . $variant, '');
    $sizeClasses = config('ecoleplus-ui.components.badge.sizes.' . $size, '');
@endphp

<span {{ 
    $attributes->merge([
        'class' => 
            $baseClasses . ' ' . 
            $variantClasses . ' ' . 
            $sizeClasses .
            ($rounded ? ' rounded-full' : ' rounded')
    ]) 
}}>
    {{ $slot }}
</span> 