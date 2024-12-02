@php
    $widthClass = [
        '48' => 'w-48',
        '56' => 'w-56',
        '64' => 'w-64',
        'full' => 'w-full',
    ][$width] ?? 'w-48';
@endphp

<div x-data="{ open: false }" 
    {{ $attributes->merge(['class' => 'relative inline-block text-left']) }}>
    
    {{-- Trigger --}}
    <div x-ref="trigger" @click="open = !open">
        {{ $trigger }}
    </div>

    {{-- Content --}}
    <div x-ref="content"
        x-show="open"
        @click.away="open = false"
        x-anchor:bottom="$refs.trigger"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-1"
        class="{{ $classes() }} {{ $widthClass }}"
        style="display: none;">
        {{ $slot }}
    </div>
</div>
