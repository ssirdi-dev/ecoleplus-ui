<?php

namespace EcolePlus\EcolePlusUi\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;

class Textarea extends Component
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
        public readonly ?int $rows = 3,
        public readonly ?int $minRows = null,
        public readonly ?int $maxRows = null,
        public readonly bool $autoResize = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('ecoleplus-ui::components.form.textarea');
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
     * Get the textarea classes.
     */
    public function textareaClasses(ComponentAttributeBag $attributes): string
    {
        $baseClasses = 'flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50';
        
        $conditionalClasses = [];
        
        if ($this->error) {
            $conditionalClasses[] = 'border-destructive ring-destructive';
        }

        if ($this->autoResize) {
            $conditionalClasses[] = 'resize-none overflow-hidden';
        }

        $mergedClasses = trim($baseClasses . ' ' . implode(' ', $conditionalClasses));
        
        if ($attributes->has('class')) {
            $mergedClasses .= ' ' . $attributes->get('class');
        }

        return trim($mergedClasses);
    }
} 