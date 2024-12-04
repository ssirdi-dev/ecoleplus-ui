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

    <div 
        x-data="{ 
            open: false,
            search: '',
            selected: $wire.entangle(@js($attributes->get('wire:model'))),
            loading: false,
            error: null,
            multiple: @js($multiple),
            clearable: @js($clearable),
            init() {
                // Handle search with debounce
                if (this.$wire && @js($searchable)) {
                    this.$watch('search', Alpine.debounce((value) => {
                        if (value.length > 0) {
                            this.loading = true;
                            this.$wire.call('search', value)
                                .then(() => {
                                    this.loading = false;
                                })
                                .catch(error => {
                                    this.error = error;
                                    this.loading = false;
                                    setTimeout(() => this.error = null, 3000);
                                });
                        }
                    }, 300));
                }

                // Listen for option updates from Livewire
                if (this.$wire) {
                    this.$wire.on('optionsUpdated', () => {
                        this.loading = false;
                    });
                }
            },
            getSelectedLabel() {
                const selectedEl = this.$refs.listbox?.querySelector( @js('[aria-selected="true"]'));
                if (!selectedEl) {
                    return @js($placeholder ?? 'Select an option');
                }
                return selectedEl.textContent.trim();
            },
            select(el) {
                const value = el.getAttribute('data-value');
                if (this.multiple) {
                    if (!Array.isArray(this.selected)) {
                        this.selected = [];
                    }
                    const index = this.selected.indexOf(value);
                    
                    if (index === -1) {
                        this.selected.push(value);
                    } else {
                        this.selected.splice(index, 1);
                    }
                } else {
                    this.selected = value;
                    this.open = false;
                }
            },
            clear() {
                this.selected = this.multiple ? [] : null;
                this.open = false;
            },
            isSelected(value) {
                if (this.multiple) {
                    return Array.isArray(this.selected) && this.selected.includes(value);
                }
                return this.selected === value;
            },
            onEscape() {
                this.open = false;
                this.$refs.button?.focus();
            },
            onClickAway(event) {
                if (!event.target.closest('.form-select')) {
                    this.open = false;
                }
            }
        }"
        x-on:keydown.escape.prevent.stop="onEscape()"
        x-on:click.away="onClickAway($event)"
        class="relative mt-2 form-select"
        {{ $attributes->only(['wire:model', 'wire:model.live', 'wire:key'])->merge([
            'role' => 'combobox',
            'aria-controls' => $getListboxId(),
            'aria-expanded' => 'false',
            'aria-haspopup' => 'listbox',
        ]) }}
    >
        <div class="relative">
            @if($leadingIcon)
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <x-eplus-icon 
                        :name="$getIconName($leadingIcon)"
                        :type="$iconType"
                        :class="$iconClasses()"
                        aria-hidden="true"
                    />
                </div>
            @endif

            @if($searchable)
                <input
                    type="text"
                    id="{{ $getId() }}"
                    name="{{ $name }}"
                    x-model="search"
                    x-ref="search"
                    x-on:focus="open = true"
                    x-on:keydown.enter.prevent="$refs.listbox?.querySelector('[aria-selected=true]')?.click()"
                    x-on:keydown.arrow-down.prevent="$refs.listbox?.querySelector('[role=option]')?.focus()"
                    @if($placeholder) placeholder="{{ $placeholder }}" @endif
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    @if($readonly) readonly @endif
                    @if($getDescribedBy()) aria-describedby="{{ $getDescribedBy() }}" @endif
                    @if($error) aria-invalid="true" @endif
                    class="{{ $triggerClasses($attributes) }}"
                    {{ $attributes->except(['class'])->merge([
                        'autocomplete' => 'off',
                        'role' => 'combobox',
                        'aria-controls' => $getListboxId(),
                        'aria-expanded' => 'false',
                        'aria-haspopup' => 'listbox',
                    ]) }}
                >
            @else
                <button
                    type="button"
                    id="{{ $getId() }}"
                    name="{{ $name }}"
                    x-ref="button"
                    x-on:click="open = !open"
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    @if($readonly) readonly @endif
                    @if($getDescribedBy()) aria-describedby="{{ $getDescribedBy() }}" @endif
                    @if($error) aria-invalid="true" @endif
                    class="{{ $triggerClasses($attributes) }}"
                    {{ $attributes->except(['class'])->merge([
                        'role' => 'combobox',
                        'aria-controls' => $getListboxId(),
                        'aria-expanded' => 'false',
                        'aria-haspopup' => 'listbox',
                    ]) }}
                >
                    <span x-text="getSelectedLabel()"></span>
                </button>
            @endif

            @if($clearable)
                <button
                    type="button"
                    x-show="selected"
                    x-on:click="clear"
                    class="absolute inset-y-0 right-9 flex items-center pr-2"
                >
                    <x-eplus-icon 
                        name="o-x-mark"
                        :class="$iconClasses()"
                        aria-hidden="true"
                    />
                </button>
            @endif

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <x-eplus-icon 
                    name="o-chevron-up-down"
                    :class="$iconClasses()"
                    aria-hidden="true"
                />
            </div>
        </div>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="{{ $listboxClasses() }}"
            x-ref="listbox"
            role="listbox"
            :aria-multiselectable="multiple.toString()"
            :id="{{ $getListboxId() }}"
            tabindex="-1"
        >
            <div x-show="loading" class="p-2 text-sm text-center text-muted-foreground">
                {{ $loadingMessage }}
            </div>

            @php
                $formattedOptions = $getFormattedOptions();
            @endphp

            @if(empty($formattedOptions))
                <div class="p-2 text-sm text-center text-muted-foreground">
                    {{ $emptyMessage }}
                </div>
            @else
                @foreach($formattedOptions as $optionOrGroup)
                    @if(isset($optionOrGroup['options']))
                        <div role="group" aria-label="{{ $optionOrGroup['label'] }}">
                            <div class="{{ $groupClasses() }}" role="presentation">
                                {{ $optionOrGroup['label'] }}
                            </div>
                            @foreach($optionOrGroup['options'] as $option)
                                <div
                                    role="option"
                                    class="{{ $optionClasses() }}"
                                    :class="{ 'bg-accent text-accent-foreground': isSelected(@js($option['value'])) }"
                                    :aria-selected="isSelected(@js($option['value'])).toString()"
                                    data-value="{{ $option['value'] }}"
                                    x-on:click="select($el)"
                                    x-on:keydown.enter.space.prevent="select($el)"
                                    tabindex="0"
                                >
                                    {{ $option['label'] }}
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div
                            role="option"
                            class="{{ $optionClasses() }}"
                            :class="{ 'bg-accent text-accent-foreground': isSelected(@js($optionOrGroup['value'])) }"
                            :aria-selected="isSelected(@js($optionOrGroup['value'])).toString()"
                            data-value="{{ $optionOrGroup['value'] }}"
                            x-on:click="select($el)"
                            x-on:keydown.enter.space.prevent="select($el)"
                            tabindex="0"
                        >
                            {{ $optionOrGroup['label'] }}
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>

    @if($hint)
        <p id="{{ $getHintId() }}" @class([
            'text-sm text-muted-foreground mt-2',
            'text-destructive' => $error,
        ])>
            {{ $hint }}
        </p>
    @endif

    @if($error)
        <p id="{{ $getErrorId() }}" class="text-sm font-medium text-destructive mt-2">
            {{ $error }}
        </p>
    @endif
</div> 