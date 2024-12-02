<?php

namespace Ecoleplus\EcoleplusUi\Components;

class Spinner extends BaseComponent
{
    /**
     * The spinner size.
     *
     * @var string
     */
    public $size;

    /**
     * Create a new component instance.
     *
     * @param string $size
     */
    public function __construct(string $size = 'md')
    {
        $this->size = $size;
        
        $this->defaultClasses = [
            $this->getDefaultClasses('spinner'),
            $this->getDefaultClasses('spinner', 'size.'.$size),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.spinner');
    }

    /**
     * Get all the computed classes for the spinner.
     *
     * @return string
     */
    public function classes(): string
    {
        return $this->mergeClasses($this->defaultClasses);
    }
}
