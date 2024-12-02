<?php

namespace Ecoleplus\EcoleplusUi\Components;

class Dropdown extends BaseComponent
{
    /**
     * The dropdown width.
     *
     * @var string
     */
    public $width;

    /**
     * Create a new component instance.
     *
     * @param string $width
     */
    public function __construct(string $width = '48')
    {
        $this->width = $width;
        
        $this->defaultClasses = [
            $this->getDefaultClasses('dropdown'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.dropdown');
    }

    /**
     * Get all the computed classes for the dropdown.
     *
     * @return string
     */
    public function classes(): string
    {
        return $this->mergeClasses($this->defaultClasses);
    }
}
