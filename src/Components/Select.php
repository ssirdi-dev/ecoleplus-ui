<?php

namespace Ecoleplus\EcoleplusUi\Components;

class Select extends BaseComponent
{
    /**
     * The select label.
     *
     * @var string|null
     */
    public $label;

    /**
     * The error message.
     *
     * @var string|null
     */
    public $error;

    /**
     * The help text.
     *
     * @var string|null
     */
    public $help;

    /**
     * The prefix content.
     *
     * @var string|null
     */
    public $prefix;

    /**
     * The suffix content.
     *
     * @var string|null
     */
    public $suffix;

    /**
     * The select options.
     *
     * @var array
     */
    public $options;

    /**
     * The selected value.
     *
     * @var mixed
     */
    public $selected;

    /**
     * Create a new component instance.
     */
    public function __construct(
        array $options = [],
        $selected = null,
        ?string $label = null,
        ?string $error = null,
        ?string $help = null,
        ?string $prefix = null,
        ?string $suffix = null
    ) {
        $this->options = $options;
        $this->selected = $selected;
        $this->label = $label;
        $this->error = $error;
        $this->help = $help;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.select');
    }

    /**
     * Get all the computed classes for the select.
     *
     * @return string
     */
    public function classes(): string
    {
        $classes = [
            $this->getDefaultClasses('select'),
            $this->error ? $this->getDefaultClasses('select', 'error') : '',
            $this->attributes->get('disabled') ? $this->getDefaultClasses('select', 'disabled') : '',
            $this->prefix ? 'pl-10' : '',
            $this->suffix ? 'pr-10' : '',
        ];

        return $this->mergeClasses($classes);
    }

    /**
     * Get the wrapper classes.
     *
     * @return string
     */
    public function wrapperClasses(): string
    {
        return $this->getDefaultClasses('select', 'wrapper');
    }

    /**
     * Get the label classes.
     *
     * @return string
     */
    public function labelClasses(): string
    {
        return $this->getDefaultClasses('select', 'label');
    }

    /**
     * Get the help text classes.
     *
     * @return string
     */
    public function helpClasses(): string
    {
        return $this->getDefaultClasses('select', 'help');
    }

    /**
     * Get the error message classes.
     *
     * @return string
     */
    public function errorClasses(): string
    {
        return $this->getDefaultClasses('select', 'error-text');
    }

    /**
     * Get the prefix classes.
     *
     * @return string
     */
    public function prefixClasses(): string
    {
        return $this->getDefaultClasses('select', 'prefix');
    }

    /**
     * Get the suffix classes.
     *
     * @return string
     */
    public function suffixClasses(): string
    {
        return $this->getDefaultClasses('select', 'suffix');
    }
}
