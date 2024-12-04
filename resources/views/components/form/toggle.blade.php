<div class="flex items-start space-x-2">
    <div class="flex items-center">
        <button
            {{ $attributes->merge([
                'type' => 'button',
                'role' => 'switch',
                'id' => $getId(),
                'required' => $required,
                'disabled' => $disabled,
                'readonly' => $readonly,
                'aria-describedby' => $getDescribedBy(),
                'aria-invalid' => $error ? 'true' : null,
                'class' => $toggleClasses($attributes),
                'x-data' => '{
                    checked: false,
                    disabled: @json($disabled),
                    readonly: @json($readonly),
                    init() {
                        this.checked = this.$el.getAttribute("aria-checked") === "true";
                        this.$watch("checked", value => {
                            this.$el.setAttribute("aria-checked", value);
                            this.$el.setAttribute("data-state", value ? "checked" : "unchecked");
                            this.$refs.thumb.setAttribute("data-state", value ? "checked" : "unchecked");
                            if (this.$refs.input) {
                                this.$refs.input.checked = value;
                                this.$refs.input.dispatchEvent(new Event("change"));
                            }
                        });
                    }
                }',
                'x-on:click' => '!disabled && !readonly && (checked = !checked)',
                'aria-checked' => 'false',
                'data-state' => 'unchecked',
            ])->except([ 'wire:model', 'wire:model.live'])}}>
            <span 
                x-ref="thumb"
                class="{{ $thumbClasses() }}"
                data-state="unchecked"
            ></span>
        </button>
        <input
            type="checkbox"
            name="{{ $name }}"
            x-ref="input"
            class="sr-only"
            {{ $attributes->only(['wire:model', 'wire:model.live']) }}
        >
    </div>

    @if($label || $description || $error)
        <div class="grid gap-1.5 leading-none">
            @if($label)
                <label 
                    for="{{ $getId() }}" 
                    @class([
                        $labelClasses(),
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

            @if($description)
                <p id="{{ $getDescriptionId() }}" @class([
                    $descriptionClasses(),
                    'text-destructive' => $error,
                ])>
                    {{ $description }}
                </p>
            @endif

            @if($error)
                <p id="{{ $getErrorId() }}" class="text-sm font-medium text-destructive">
                    {{ $error }}
                </p>
            @endif
        </div>
    @endif
</div> 