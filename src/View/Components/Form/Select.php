<?php

namespace EcolePlus\EcolePlusUi\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $id = null,
        public readonly ?string $label = null,
        public readonly ?string $placeholder = null,
        public readonly bool $required = false,
        public readonly bool $disabled = false,
        public readonly bool $readonly = false,
        public readonly ?string $hint = null,
        public readonly ?string $error = null,
        public readonly ?string $leadingIcon = null,
        public readonly ?string $trailingIcon = null,
        public readonly ?string $iconType = 'heroicon',
        public readonly bool $searchable = false,
        public readonly bool $multiple = false,
        public readonly bool $clearable = false,
        public readonly ?string $emptyMessage = 'No options available',
        public readonly ?string $loadingMessage = 'Loading...',
        public readonly ?string $searchingMessage = 'Searching...',
        public readonly ?string $notFoundMessage = 'No results found',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('ecoleplus-ui::components.form.select');
    }

    /**
     * Get the input ID.
     */
    public function getId(): string
    {
        return $this->id ?? $this->name ?? Str::random(8);
    }

    /**
     * Get error ID for aria-describedby.
     */
    public function getErrorId(): string
    {
        return $this->getId() . '-error';
    }

    /**
     * Get hint ID for aria-describedby.
     */
    public function getHintId(): string
    {
        return $this->getId() . '-hint';
    }

    /**
     * Get listbox ID.
     */
    public function getListboxId(): string
    {
        return $this->getId() . '-listbox';
    }

    /**
     * Get describedby IDs.
     */
    public function getDescribedBy(): ?string
    {
        $ids = [];

        if ($this->error) {
            $ids[] = $this->getErrorId();
        }

        if ($this->hint) {
            $ids[] = $this->getHintId();
        }

        return !empty($ids) ? implode(' ', $ids) : null;
    }

    /**
     * Get the icon name with proper prefix.
     */
    public function getIconName(string $icon): string
    {
        if ($this->iconType === 'heroicon' && !Str::startsWith($icon, ['o-', 's-'])) {
            return 'o-' . $icon;
        }

        return $icon;
    }

    /**
     * Get the select/combobox classes.
     */
    public function selectClasses(ComponentAttributeBag $attributes): string
    {
        $baseClasses = 'flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50';
        
        $conditionalClasses = [];
        
        if ($this->leadingIcon) {
            $conditionalClasses[] = 'pl-10';
        }
        
        if ($this->trailingIcon || !$this->searchable) {
            $conditionalClasses[] = 'pr-10';
        }
        
        if ($this->error) {
            $conditionalClasses[] = 'border-destructive ring-destructive';
        }

        $mergedClasses = trim($baseClasses . ' ' . implode(' ', $conditionalClasses));
        
        if ($attributes->has('class')) {
            $mergedClasses .= ' ' . $attributes->get('class');
        }

        return trim($mergedClasses);
    }

    /**
     * Get the listbox classes.
     */
    public function listboxClasses(): string
    {
        return 'absolute z-50 mt-1 max-h-60 w-full overflow-auto rounded-md bg-popover p-1 text-popover-foreground shadow-md';
    }

    /**
     * Get the option classes.
     */
    public function optionClasses(): string
    {
        return 'relative flex cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground aria-selected:bg-accent aria-selected:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50';
    }
} 