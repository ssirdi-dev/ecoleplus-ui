<div class="form-control w-full">
    @if($label)
        <label 
            for="{{ $getId() }}" 
            @class([
                'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70',
                'text-destructive' => $error,
            ])
        >
            {{ $label }}
            @if($required)
                <span class="text-destructive" aria-hidden="true">*</span>
            @endif
            @if($attributes->has('wire:model') || $attributes->has('wire:model.live'))
                <span 
                    wire:loading.delay.class="opacity-100" 
                    wire:loading.delay.class.remove="opacity-0" 
                    wire:target="{{ $attributes->whereStartsWith('wire:model')->first() }}"
                    class="ml-2 opacity-0 transition-opacity"
                >
                    <svg class="animate-spin h-4 w-4 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </span>
                <span 
                    wire:dirty.class="opacity-100" 
                    wire:dirty.class.remove="opacity-0" 
                    wire:target="{{ $attributes->whereStartsWith('wire:model')->first() }}"
                    class="ml-2 opacity-0 transition-opacity text-warning"
                >
                    <svg class="h-4 w-4 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
                    </svg>
                </span>
            @endif
        </label>
    @endif

    <div class="relative mt-2">
        <textarea
            {{ $attributes->merge([
                'id' => $getId(),
                'name' => $name,
                'rows' => $rows,
                'data-min-rows' => $minRows,
                'data-max-rows' => $maxRows,
                'placeholder' => $placeholder,
                'required' => $required,
                'disabled' => $disabled,
                'readonly' => $readonly,
                'aria-describedby' => $getDescribedBy(),
                'aria-invalid' => $error ? 'true' : null,
                'class' => $textareaClasses($attributes),
                'autocomplete' => 'off',
                'autocapitalize' => 'off',
                'autocorrect' => 'off',
                'spellcheck' => 'false',
                'x-on:keydown.enter.prevent' => $attributes->has('wire:confirm') ? "\$wire.confirm('{$attributes->get('wire:confirm')}')" : null,
                'x-data' => $autoResize ? "{
                    resize() {
                        \$el.style.height = '0px';
                        \$el.style.height = \$el.scrollHeight + 'px';
                        
                        const minRows = \$el.dataset.minRows;
                        const maxRows = \$el.dataset.maxRows;
                        const lineHeight = parseInt(window.getComputedStyle(\$el).lineHeight);
                        
                        if (minRows && \$el.scrollHeight < minRows * lineHeight) {
                            \$el.style.height = (minRows * lineHeight) + 'px';
                        }
                        
                        if (maxRows && \$el.scrollHeight > maxRows * lineHeight) {
                            \$el.style.height = (maxRows * lineHeight) + 'px';
                            \$el.style.overflowY = 'auto';
                        } else {
                            \$el.style.overflowY = 'hidden';
                        }
                    }
                }" : null,
                'x-init' => $autoResize ? "resize()" : null,
                'x-on:input' => $autoResize ? "resize()" : null,
            ])->except(['wire:confirm'])}}>
        </textarea>
    </div>

    @if($error)
        <p id="{{ $getErrorId() }}" class="text-sm font-medium text-destructive mt-2">
            {{ $error }}
        </p>
    @endif

    @if($hint)
        <p id="{{ $getHintId() }}" @class([
            'text-sm text-muted-foreground mt-2',
            'text-destructive' => $error,
        ])>
            {{ $hint }}
        </p>
    @endif
</div> 