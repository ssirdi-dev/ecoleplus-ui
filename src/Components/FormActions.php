<?php

namespace Ecoleplus\EcoleplusUi\Components;

class FormActions extends BaseComponent
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.form-actions');
    }

    /**
     * Get the actions classes.
     *
     * @return string
     */
    public function classes(): string
    {
        return $this->getDefaultClasses('form', 'actions');
    }
}
