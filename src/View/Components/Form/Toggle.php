<?php

namespace EcolePlus\EcolePlusUi\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;

class Toggle extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $id = null,
        public readonly ?string $label = null,
        public readonly ?string $description = null,
        public readonly bool $required = false,
        public readonly bool $disabled = false,
        public readonly bool $readonly = false,
        public readonly ?string $error = null,
        public readonly string $size = 'default', // default, sm, lg
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('ecoleplus-ui::components.form.toggle');
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
     * Get the toggle classes.
     */
    public function toggleClasses(ComponentAttributeBag $attributes): string
    {
        $baseClasses = 'peer inline-flex shrink-0 cursor-pointer items-center rounded-full border-2 border-transparent transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:ring-offset-background disabled:cursor-not-allowed disabled:opacity-50 data-[state=checked]:bg-primary data-[state=unchecked]:bg-input';
        
        $sizeClasses = match($this->size) {
            'sm' => 'h-4 w-7',
            'lg' => 'h-7 w-12',
            default => 'h-6 w-10',
        };
        
        $conditionalClasses = [];
        
        if ($this->error) {
            $conditionalClasses[] = 'border-destructive ring-destructive';
        }

        $mergedClasses = trim($baseClasses . ' ' . $sizeClasses . ' ' . implode(' ', $conditionalClasses));
        
        if ($attributes->has('class')) {
            $mergedClasses .= ' ' . $attributes->get('class');
        }

        return trim($mergedClasses);
    }

    /**
     * Get the thumb classes.
     */
    public function thumbClasses(): string
    {
        $baseClasses = 'pointer-events-none block rounded-full bg-background shadow-lg ring-0 transition-transform data-[state=checked]:translate-x-full data-[state=unchecked]:translate-x-0';
        
        return match($this->size) {
            'sm' => $baseClasses . ' h-3 w-3',
            'lg' => $baseClasses . ' h-6 w-6',
            default => $baseClasses . ' h-5 w-5',
        };
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