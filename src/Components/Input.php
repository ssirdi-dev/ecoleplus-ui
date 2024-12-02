<?php

namespace Ecoleplus\EcoleplusUi\Components;

use Illuminate\View\Component;

class Input extends BaseComponent
{
    /**
     * The input type.
     */
    public string $type;

    /**
     * The input value.
     */
    public mixed $value;

    /**
     * The input placeholder.
     */
    public ?string $placeholder;

    /**
     * The prefix content.
     */
    public ?string $prefix;

    /**
     * The suffix content.
     */
    public ?string $suffix;

    /**
     * The textarea rows.
     */
    public int $rows;

    /**
     * Whether to allow multiple file uploads.
     */
    public bool $multiple;

    /**
     * Whether to enable drag and drop for file inputs.
     */
    public bool $dragAndDrop;

    /**
     * Whether to enable auto-resize for textareas.
     */
    public bool $autoResize;

    /**
     * The maximum character count for textareas.
     */
    public ?int $maxChars;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $type = 'text',
        mixed $value = null,
        ?string $placeholder = null,
        ?string $prefix = null,
        ?string $suffix = null,
        int $rows = 3,
        bool $multiple = false,
        bool $dragAndDrop = false,
        bool $autoResize = false,
        ?int $maxChars = null
    ) {
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
        $this->rows = $rows;
        $this->multiple = $multiple;
        $this->dragAndDrop = $dragAndDrop;
        $this->autoResize = $autoResize;
        $this->maxChars = $maxChars;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('ecoleplus-ui::components.input');
    }

    /**
     * Get the input wrapper classes.
     */
    public function wrapperClasses(): string
    {
        return $this->getDefaultClasses('input', 'wrapper');
    }

    /**
     * Get the input classes.
     */
    public function classes(): string
    {
        $baseClasses = $this->getDefaultClasses('input', 'base');
        
        if ($this->type === 'file') {
            $classes = $this->getDefaultClasses('input', 'file');
            if ($this->dragAndDrop) {
                $classes .= ' ' . $this->getDefaultClasses('input', 'file-drag');
            }
            return $classes;
        }

        if ($this->type === 'textarea') {
            $classes = $this->getDefaultClasses('input', 'textarea');
            if ($this->autoResize) {
                $classes .= ' ' . $this->getDefaultClasses('input', 'textarea-auto');
            }
            return $classes;
        }

        return $baseClasses;
    }

    /**
     * Get the prefix wrapper classes.
     */
    public function prefixClasses(): string
    {
        return $this->getDefaultClasses('input', 'prefix');
    }

    /**
     * Get the suffix wrapper classes.
     */
    public function suffixClasses(): string
    {
        return $this->getDefaultClasses('input', 'suffix');
    }

    /**
     * Get the drag and drop zone classes.
     */
    public function dragZoneClasses(): string
    {
        return $this->getDefaultClasses('input', 'drag-zone');
    }

    /**
     * Get the character count classes.
     */
    public function charCountClasses(): string
    {
        return $this->getDefaultClasses('input', 'char-count');
    }
}
