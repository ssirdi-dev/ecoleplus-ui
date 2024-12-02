<?php

namespace Ecoleplus\EcoleplusUi\Components;

class CardSection extends BaseComponent
{
    /**
     * The section type.
     *
     * @var string
     */
    public $type;

    /**
     * Whether the section has a border.
     *
     * @var bool
     */
    public $bordered;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param bool $bordered
     */
    public function __construct(
        string $type = 'default',
        bool $bordered = false
    ) {
        $this->type = $type;
        $this->bordered = $bordered;

        $this->defaultClasses = [
            $this->getDefaultClasses('card-section'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.card-section');
    }

    /**
     * Get all the computed classes for the card section.
     *
     * @return string
     */
    public function classes(): string
    {
        $typeClasses = match ($this->type) {
            'header' => $this->getDefaultClasses('card-section', 'type.header'),
            'footer' => $this->getDefaultClasses('card-section', 'type.footer'),
            default => $this->getDefaultClasses('card-section', 'type.default'),
        };

        $borderClasses = match ($this->type) {
            'header' => $this->bordered ? $this->getDefaultClasses('card-section', 'bordered-type.header') : '',
            'footer' => $this->bordered ? $this->getDefaultClasses('card-section', 'bordered-type.footer') : '',
            default => $this->bordered ? $this->getDefaultClasses('card-section', 'bordered-type.default') : '',
        };

        return $this->mergeClasses([
            ...$this->defaultClasses,
            'p-4',
            $typeClasses,
            $borderClasses,
        ]);
    }
}
