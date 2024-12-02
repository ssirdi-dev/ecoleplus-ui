@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'disabled' => false,
    'icon' => null,
    'iconPosition' => 'left',
])

@php
    $baseClasses = config('ecoleplus-ui.defaults.button.base', '');
    $variantClasses = config("ecoleplus-ui.defaults.button.$variant", '');
    
    $sizeClasses = match ($size) {
        'xs' => 'px-2 py-1 text-xs',
        'sm' => 'px-3 py-1.5 text-sm',
        'lg' => 'px-5 py-2.5 text-lg',
        'xl' => 'px-6 py-3 text-xl',
        default => 'px-4 py-2 text-base',
    };
    
    $classes = trim("$baseClasses $variantClasses $sizeClasses");
@endphp

<button 
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $classes()]) }}
    @disabled($disabled)
>
    @if($icon && $iconPosition === 'left')
        <x-dynamic-component :component="$icon" class="w-5 h-5 mr-2" />
    @endif
    
    {{ $slot }}
    
    @if($icon && $iconPosition === 'right')
        <x-dynamic-component :component="$icon" class="w-5 h-5 ml-2" />
    @endif
</button>
