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
     *
     * @param string|null $name The name attribute of the select
     * @param string|null $id The ID of the select. If not provided, will use the name or a random string
     * @param string|null $label The label text
     * @param string|null $hint Helper text to display below the select
     * @param string|null $error Error message to display
     * @param string|null $placeholder Placeholder text when no option is selected
     * @param string|null $emptyMessage Message to display when there are no options
     * @param string|null $notFoundMessage Message to display when search yields no results
     * @param string|null $loadingMessage Message to display during loading states
     * @param string|null $leadingIcon Name of the icon to display before the select
     * @param string|null $iconType The icon library type (heroicon, fontawesome, etc.)
     * @param bool $required Whether the select is required
     * @param bool $disabled Whether the select is disabled
     * @param bool $readonly Whether the select is readonly
     * @param bool $multiple Whether multiple options can be selected
     * @param bool $searchable Whether the options are searchable
     * @param bool $clearable Whether the selection can be cleared
     * @param array $options The options to display in the select
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $id = null,
        public readonly ?string $label = null,
        public readonly ?string $hint = null,
        public readonly ?string $error = null,
        public readonly ?string $placeholder = null,
        public readonly ?string $emptyMessage = 'No options available',
        public readonly ?string $notFoundMessage = 'No results found',
        public readonly ?string $loadingMessage = 'Loading...',
        public readonly ?string $leadingIcon = null,
        public readonly ?string $iconType = 'heroicon',
        public readonly bool $required = false,
        public readonly bool $disabled = false,
        public readonly bool $readonly = false,
        public readonly bool $multiple = false,
        public readonly bool $searchable = false,
        public readonly bool $clearable = false,
        public readonly array $options = [],
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('ecoleplus-ui::components.form.select');
    }

    /**
     * Get the select ID.
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
     * Format options into a consistent structure.
     */
    public function getFormattedOptions(): array
    {
        $options = $this->options;
        if (empty($options)) {
            return [];
        }

        // Check if the array is associative
        $isAssoc = array_keys($options) !== range(0, count($options) - 1);

        // If it's a sequential array of strings, convert to value/label pairs
        if (!$isAssoc && is_string(reset($options))) {
            return array_map(function ($value) {
                return [
                    'value' => $value,
                    'label' => $value,
                ];
            }, $options);
        }

        // If it's an associative array, convert to value/label pairs
        if ($isAssoc && !is_array(reset($options))) {
            return array_map(function ($value, $key) {
                return [
                    'value' => $key,
                    'label' => $value,
                ];
            }, $options, array_keys($options));
        }

        // If it's an array of arrays with value/label keys
        if (!$isAssoc && is_array(reset($options)) && isset(reset($options)['value'])) {
            return $options;
        }

        // If it's an array of option groups
        if ($isAssoc && is_array(reset($options))) {
            $formattedGroups = [];
            foreach ($options as $groupLabel => $groupOptions) {
                // Skip if not an array of options
                if (!is_array($groupOptions)) {
                    continue;
                }

                // Format group options
                $formattedOptions = [];
                foreach ($groupOptions as $option) {
                    if (is_array($option) && isset($option['value'])) {
                        $formattedOptions[] = $option;
                    }
                }

                if (!empty($formattedOptions)) {
                    $formattedGroups[] = [
                        'label' => $groupLabel,
                        'options' => $formattedOptions,
                    ];
                }
            }
            return $formattedGroups;
        }

        return [];
    }

    /**
     * Get the select trigger button classes.
     */
    public function triggerClasses(ComponentAttributeBag $attributes): string
    {
        $baseClasses = 'flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50';
        
        $conditionalClasses = [];
        
        if ($this->leadingIcon) {
            $conditionalClasses[] = 'pl-10';
        }
        
        if ($this->clearable) {
            $conditionalClasses[] = 'pr-20';
        } else {
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
        return 'absolute z-50 mt-1 max-h-60 w-full overflow-auto rounded-md bg-popover text-popover-foreground border border-border shadow-md outline-none';
    }

    /**
     * Get the option classes.
     */
    public function optionClasses(): string
    {
        return 'relative flex w-full cursor-default select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none data-[disabled]:pointer-events-none data-[disabled]:opacity-50 data-[selected]:bg-accent data-[selected]:text-accent-foreground data-[highlighted]:bg-accent data-[highlighted]:text-accent-foreground';
    }

    /**
     * Get the option group classes.
     */
    public function groupClasses(): string
    {
        return 'text-sm font-semibold py-1.5 px-2 text-muted-foreground';
    }

    /**
     * Get the icon classes.
     */
    public function iconClasses(): string
    {
        return 'h-4 w-4 text-muted-foreground';
    }

    /**
     * Get the option group header classes.
     */
    public function groupHeaderClasses(): string
    {
        return 'py-1.5 pl-8 pr-2 text-sm font-semibold text-muted-foreground';
    }

    /**
     * Get the separator classes.
     */
    public function separatorClasses(): string
    {
        return '-mx-1 my-1 h-px bg-muted';
    }

    /**
     * Get the content classes.
     */
    public function contentClasses(): string
    {
        return 'relative z-50 min-w-[8rem] overflow-hidden rounded-md border bg-popover text-popover-foreground shadow-md data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95';
    }

    /**
     * Get the viewport classes.
     */
    public function viewportClasses(): string
    {
        return 'p-1';
    }

    /**
     * Get the state attributes.
     */
    public function getStateAttributes(): array
    {
        return [
            'data-state' => $this->isOpen ? 'open' : 'closed',
            'data-disabled' => $this->disabled ? 'true' : null,
            'data-placeholder' => empty($this->value) ? 'true' : null,
        ];
    }

    /**
     * Get the ARIA attributes.
     */
    public function getAriaAttributes(): array
    {
        return [
            'role' => 'combobox',
            'aria-expanded' => $this->isOpen ? 'true' : 'false',
            'aria-controls' => $this->getListboxId(),
            'aria-label' => $this->label ?? $this->name,
        ];
    }
} 