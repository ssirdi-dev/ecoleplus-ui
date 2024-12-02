<?php

namespace Ecoleplus\EcoleplusUi\Components;

class FormGroup extends BaseComponent
{
    /**
     * The group label.
     *
     * @var string|null
     */
    public ?string $label;

    /**
     * The help text.
     *
     * @var string|null
     */
    public ?string $help;

    /**
     * The error message.
     *
     * @var string|null
     */
    public ?string $error;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $label = null,
        ?string $help = null,
        ?string $error = null
    ) {
        $this->label = $label;
        $this->help = $help;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.form-group');
    }

    /**
     * Get the group classes.
     *
     * @return string
     */
    public function classes(): string
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
}
