<?php

namespace EcolePlus\EcolePlusUi\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;

class Radio extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $id = null,
        public readonly ?string $value = null,
        public readonly ?string $label = null,
        public readonly ?string $description = null,
        public readonly bool $required = false,
        public readonly bool $disabled = false,
        public readonly bool $readonly = false,
        public readonly ?string $error = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('ecoleplus-ui::components.form.radio');
    }

    /**
     * Get the input ID.
     */
    public function getId(): string
    {
        return $this->id ?? $this->name . '-' . $this->value ?? Str::random(8);
    }

    /**
     * Get error ID for aria-describedby.
     */
    public function getErrorId(): string
    {
        return $this->getId() . '-error';
    }

    /**
     * Get description ID for aria-describedby.
     */
    public function getDescriptionId(): string
    {
        return $this->getId() . '-description';
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

        if ($this->description) {
            $ids[] = $this->getDescriptionId();
        }

        return !empty($ids) ? implode(' ', $ids) : null;
    }

    /**
     * Get the radio classes.
     */
    public function radioClasses(ComponentAttributeBag $attributes): string
    {
        $baseClasses = 'h-4 w-4 shrink-0 rounded-full border border-input ring-offset-background focus:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 checked:bg-primary checked:text-primary-foreground';
        
        $conditionalClasses = [];
        
        if ($this->error) {
            $conditionalClasses[] = 'border-destructive focus-visible:ring-destructive';
        }

        $mergedClasses = trim($baseClasses . ' ' . implode(' ', $conditionalClasses));
        
        if ($attributes->has('class')) {
            $mergedClasses .= ' ' . $attributes->get('class');
        }

        return trim($mergedClasses);
    }

    /**
     * Get the label classes.
     */
    public function labelClasses(): string
    {
        return 'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70';
    }

    /**
     * Get the description classes.
     */
    public function descriptionClasses(): string
    {
        return 'text-sm text-muted-foreground';
    }
} 