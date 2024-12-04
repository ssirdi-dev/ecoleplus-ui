<button
    {{ $attributes->merge([
        'type' => 'button',
        'wire:loading.attr' => 'disabled',
        'role' => 'button',
        'aria-disabled' => $attributes->get('disabled', false),
        'aria-label' => $label ?? null,
        'aria-description' => $description,
        'aria-pressed' => $pressed ? 'true' : null,
        'aria-expanded' => $expanded ? 'true' : null,
        'aria-controls' => $controls,
        'aria-labelledby' => $labelledby,
        'class' => 'inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 ' . 
        match($variant) {
            'primary' => 'bg-primary text-primary-foreground hover:bg-primary/90',
            'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/80',
            'danger' => 'bg-destructive text-destructive-foreground hover:bg-destructive/90',
            'success' => 'bg-green-600 text-white hover:bg-green-600/90 dark:bg-green-500 dark:hover:bg-green-500/90',
            'warning' => 'bg-yellow-500 text-white hover:bg-yellow-500/90 dark:bg-yellow-600 dark:hover:bg-yellow-600/90',
            'info' => 'bg-sky-500 text-white hover:bg-sky-500/90 dark:bg-sky-400 dark:hover:bg-sky-400/90',
            'dark' => 'bg-gray-900 text-gray-50 hover:bg-gray-900/90 dark:bg-gray-600 dark:hover:bg-gray-600/90',
            'outline' => 'border border-input bg-background hover:bg-accent hover:text-accent-foreground',
            'ghost' => 'hover:bg-accent hover:text-accent-foreground',
            'link' => 'text-primary underline-offset-4 hover:underline',
            default => 'bg-primary text-primary-foreground hover:bg-primary/90'
        } . ' ' . 
        match($size ?? 'default') {
            'default' => 'h-10 px-4 py-2',
            'sm' => 'h-9 px-3',
            'lg' => 'h-11 px-8',
            'icon' => 'h-10 w-10',
            default => 'h-10 px-4 py-2'
        }
    ]) }}
    @if($attributes->has('wire:click') && $attributes->has('wire:confirm'))
        x-on:click.prevent="$wire.confirm('{{ $attributes->get('wire:confirm') }}')"
    @endif
>
    @if($attributes->has('wire:click'))
        <span 
            wire:loading.delay 
            wire:target="{{ $attributes->get('wire:click') }}" 
            class="{{ !is_null($icon) && $iconPosition === 'left' ? 'mr-2' : 'ml-2' }}"
            role="status"
            aria-label="Loading"
        >
            <svg 
                class="animate-spin h-5 w-5" 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24"
                aria-hidden="true"
            >
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>
    @endif
    
    @if(!is_null($icon) && $iconPosition === 'left')
        <x-eplus-icon 
            :name="$icon"
            :type="$iconType"
            class="h-5 w-5 {{ $label ? 'mr-2' : '' }}"
            wire:loading.delay.class="hidden"
            wire:target="{{ $attributes->get('wire:click') }}"
            aria-hidden="true"
        />
    @endif
    
    @if($label)
        <span 
            wire:loading.delay.class="opacity-0" 
            wire:target="{{ $attributes->get('wire:click') }}"
            class="truncate"
        >
            {{ $label }}
        </span>
    @endif
    
    @if(!is_null($icon) && $iconPosition === 'right')
        <x-eplus-icon 
            :name="$icon"
            :type="$iconType"
            class="h-5 w-5 {{ $label ? 'ml-2' : '' }}"
            wire:loading.delay.class="hidden"
            wire:target="{{ $attributes->get('wire:click') }}"
            aria-hidden="true"
        />
    @endif
</button> 