<?php

namespace Ecoleplus\EcoleplusUi\Components;

class Card extends BaseComponent
{
    /**
     * The card padding.
     *
     * @var bool
     */
    public $padded;

    /**
     * Create a new component instance.
     *
     * @param bool $padded
     */
    public function __construct(bool $padded = false)
    {
        $this->padded = $padded;

        $this->defaultClasses = [
            $this->getDefaultClasses('card'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.card');
    }

    /**
     * Get all the computed classes for the card.
     *
     * @return string
     */
    public function classes(): string
    {
        return $this->mergeClasses([
            ...$this->defaultClasses,
            'bg-white rounded-lg shadow-sm border border-gray-200',
            $this->padded ? 'p-4' : '',
        ]);
    }
}
