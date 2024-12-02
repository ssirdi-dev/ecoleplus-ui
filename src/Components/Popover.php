<?php

namespace Ecoleplus\EcoleplusUi\Components;

class Popover extends BaseComponent
{
    /**
     * Available placements.
     */
    const PLACEMENTS = ['top', 'bottom', 'left', 'right'];

    /**
     * The popover placement.
     *
     * @var string
     */
    public $placement;

    /**
     * Create a new component instance.
     *
     * @param string $placement
     */
    public function __construct(string $placement = 'bottom')
    {
        if (!in_array($placement, self::PLACEMENTS)) {
            $placement = 'bottom';
        }

        $this->placement = $placement;
        $this->defaultClasses = [
            $this->getDefaultClasses('popover'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.popover');
    }

    /**
     * Get all the computed classes for the popover.
     *
     * @return string
     */
    public function classes(): string
    {
        return $this->mergeClasses($this->defaultClasses);
    }
}
