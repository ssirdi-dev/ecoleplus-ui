@php
    $id = uniqid('popover-');
@endphp

<div x-data="{ 
    open: false,
    updatePosition() {
        if (window.innerWidth < 640) {
            this.$refs.content.style.width = '90vw';
            this.$refs.content.style.maxWidth = '90vw';
        } else {
            this.$refs.content.style.width = 'auto';
            this.$refs.content.style.maxWidth = 'none';
        }
    }
}" 
    x-init="updatePosition(); window.addEventListener('resize', updatePosition)"
    {{ $attributes->merge(['class' => 'relative inline-block']) }}>
    
    {{-- Trigger --}}
    <div x-ref="trigger" @click="open = !open">
        {{ $trigger }}
    </div>

    {{-- Content --}}
    <div x-ref="content"
        x-show="open"
        @click.away="open = false"
        x-anchor:{{ $placement }}="$refs.trigger"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="{{ $classes() }}"
        style="display: none;">
        {{ $slot }}
    </div>
</div>
