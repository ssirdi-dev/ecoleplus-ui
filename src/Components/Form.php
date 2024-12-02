<?php

namespace Ecoleplus\EcoleplusUi\Components;

class Form extends BaseComponent
{
    /**
     * The form method.
     *
     * @var string
     */
    public string $method;

    /**
     * Whether the form has file uploads.
     *
     * @var bool
     */
    public bool $hasFiles;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $method = 'POST',
        bool $hasFiles = false
    ) {
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.form');
    }

    /**
     * Get the form classes.
     *
     * @return string
     */
    public function classes(): string
    {
        return $this->getDefaultClasses('form');
    }

    /**
     * Get the group classes.
     *
     * @return string
     */
    public function groupClasses(): string
    {
        return $this->getDefaultClasses('form', 'group');
    }

    /**
     * Get the label classes.
     *
     * @return string
     */
    public function labelClasses(): string
    {
        return $this->getDefaultClasses('form', 'label');
    }

    /**
     * Get the help text classes.
     *
     * @return string
     */
    public function helpClasses(): string
    {
        return $this->getDefaultClasses('form', 'help');
    }

    /**
     * Get the error message classes.
     *
     * @return string
     */
    public function errorClasses(): string
    {
        return $this->getDefaultClasses('form', 'error');
    }

    /**
     * Get the actions section classes.
     *
     * @return string
     */
    public function actionsClasses(): string
    {
        return $this->getDefaultClasses('form', 'actions');
    }

    /**
     * Get the real form method to be used.
     *
     * @return string
     */
    public function realMethod(): string
    {
        return in_array($this->method, ['GET', 'POST'])
            ? $this->method
            : 'POST';
    }

    /**
     * Determine if the form needs a spoofed method.
     *
     * @return bool
     */
    public function spoofMethod(): bool
    {
        return !in_array($this->method, ['GET', 'POST']);
    }
}
