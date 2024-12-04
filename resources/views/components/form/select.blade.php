<div class="form-control w-full">
    @if($label)
        <label 
            for="{{ $getId() }}" 
            @class([
                'text-sm font-medium leading-none text-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-70',
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
                    <svg class="animate-spin h-4 w-4 inline-block text-foreground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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
            selected: @if($attributes->has('wire:model') || $attributes->has('wire:model.live')) @if($multiple) @entangle($attributes->wire('model')) @else @entangle($attributes->wire('model')).live @endif @else null @endif,
            multiple: {{ $multiple ? 'true' : 'false' }},
            searchable: {{ $searchable ? 'true' : 'false' }},
            clearable: {{ $clearable ? 'true' : 'false' }},
            options: [],
            loading: false,
            init() {
                this.$watch('search', value => {
                    if (this.searchable) {
                        this.$wire.call('search', value)
                    }
                })
            },
            isSelected(value) {
                if (this.multiple) {
                    return this.selected?.includes(value)
                }
                return this.selected == value
            },
            select(value) {
                if (this.multiple) {
                    if (!this.selected) this.selected = []
                    if (this.isSelected(value)) {
                        this.selected = this.selected.filter(item => item !== value)
                    } else {
                        this.selected.push(value)
                    }
                } else {
                    this.selected = value
                    this.open = false
                }
            },
            clear() {
                this.selected = this.multiple ? [] : null
                this.open = false
            },
            onEscape() {
                this.open = false
                this.$refs.button?.focus()
            },
            onClickAway($event) {
                if (!$event.target.closest('.form-select')) {
                    this.open = false
                }
            }
        }" 
        x-on:click.away="onClickAway($event)"
        x-on:keydown.escape.prevent.stop="onEscape()"
        class="relative mt-2 form-select"
        {{ $attributes->only(['wire:model', 'wire:model.live']) }}
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
                    class="{{ $selectClasses($attributes) }}"
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
                    @if($getDescribedBy()) aria-describedby="{{ $getDescribedBy() }}" @endif
                    @if($error) aria-invalid="true" @endif
                    class="{{ $selectClasses($attributes) }}"
                    {{ $attributes->except(['class'])->merge([
                        'role' => 'combobox',
                        'aria-controls' => $getListboxId(),
                        'aria-expanded' => 'false',
                        'aria-haspopup' => 'listbox',
                    ]) }}
                >
                    <span x-text="selected ? options.find(option => option.value == selected)?.label : '{{ $placeholder ?? 'Select an option' }}'"></span>
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
            :id="$id('listbox')"
            tabindex="-1"
        >
            <div x-show="loading" class="p-2 text-sm text-center text-muted-foreground">
                {{ $loadingMessage }}
            </div>

            <template x-if="!loading">
                <div x-show="options.length === 0" class="p-2 text-sm text-center text-muted-foreground">
                    <span x-text="search.length > 0 ? '{{ $notFoundMessage }}' : '{{ $emptyMessage }}'"></span>
                </div>
            </template>

            <template x-for="option in options" :key="option.value">
                <div
                    x-on:click="select(option.value)"
                    :class="{ 'bg-accent text-accent-foreground': isSelected(option.value) }"
                    class="{{ $optionClasses() }}"
                    role="option"
                    :aria-selected="isSelected(option.value)"
                    :tabindex="isSelected(option.value) ? 0 : -1"
                >
                    <template x-if="multiple">
                        <div class="mr-2 h-4 w-4 rounded-sm border border-primary" :class="{ 'bg-primary text-primary-foreground': isSelected(option.value) }">
                            <svg x-show="isSelected(option.value)" class="h-4 w-4" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </template>
                    <span x-text="option.label"></span>
                </div>
            </template>
        </div>
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