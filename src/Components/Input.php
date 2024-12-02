<?php

namespace Ecoleplus\EcoleplusUi\Components;

class Input extends BaseComponent
{
    /**
     * The input type.
     *
     * @var string
     */
    public $type;

    /**
     * The input label.
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
     * Create a new component instance.
     *
     * @param string $type
     * @param string|null $label
     * @param string|null $error
     * @param string|null $prefix
     * @param string|null $suffix
     */
    public function __construct(
        string $type = 'text',
        ?string $label = null,
        ?string $error = null,
        ?string $prefix = null,
        ?string $suffix = null
    ) {
        $this->type = $type;
        $this->label = $label;
        $this->error = $error;
        $this->prefix = $prefix;
        $this->suffix = $suffix;

        $this->defaultClasses = [
            $this->getDefaultClasses('input'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.input');
    }

    /**
     * Get all the computed classes for the input.
     *
     * @return string
     */
    public function classes(): string
    {
        return $this->mergeClasses([
            ...$this->defaultClasses,
            // Add error state classes
            $this->error ? 'border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500' : '',
            // Add padding classes for prefix/suffix
            $this->prefix ? 'pl-7' : '',
            $this->suffix ? 'pr-7' : '',
        ]);
    }

    /**
     * Get the container classes.
     *
     * @return string
     */
    public function containerClasses(): string
    {
        return 'relative rounded-md shadow-sm';
    }

    /**
     * Get the label classes.
     *
     * @return string
     */
    public function labelClasses(): string
    {
        return 'block text-sm font-medium text-gray-700 mb-1';
    }

    /**
     * Get the error message classes.
     *
     * @return string
     */
    public function errorClasses(): string
    {
        return 'mt-1 text-sm text-red-600';
    }

    /**
     * Get the prefix/suffix container classes.
     *
     * @return string
     */
    public function addonClasses(): string
    {
        return 'absolute inset-y-0 flex items-center pointer-events-none text-gray-500 sm:text-sm';
    }

    /**
     * Get the left addon (prefix) classes.
     *
     * @return string
     */
    public function leftAddonClasses(): string
    {
        return $this->addonClasses() . ' left-0 pl-3';
    }

    /**
     * Get the right addon (suffix) classes.
     *
     * @return string
     */
    public function rightAddonClasses(): string
    {
        return $this->addonClasses() . ' right-0 pr-3';
    }
}
