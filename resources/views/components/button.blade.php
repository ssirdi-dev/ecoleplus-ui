@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'disabled' => false,
    'icon' => null,
    'iconPosition' => 'left',
])


<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $classes()]) }}
    @disabled($disabled)
>
    @if($icon && $iconPosition === 'left')
        <x-dynamic-component
            :component="$icon"
            @class([
                'mr-2',
                'w-4 h-4' => $size === 'xs' || $size === 'sm',
                'w-5 h-5' => $size === 'md',
                'w-6 h-6' => $size === 'lg' || $size === 'xl',
            ])
        />
    @endif

    {{ $slot }}

    @if($icon && $iconPosition === 'right')
        <x-dynamic-component
            :component="$icon"
            @class([
                'ml-2',
                'w-4 h-4' => $size === 'xs' || $size === 'sm',
                'w-5 h-5' => $size === 'md',
                'w-6 h-6' => $size === 'lg' || $size === 'xl',
            ])
        />
    @endif
</button>
