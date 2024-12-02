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
        bool $bordered = true
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
            'header' => 'rounded-t-lg bg-gray-50',
            'footer' => 'rounded-b-lg bg-gray-50',
            default => '',
        };

        $borderClasses = match ($this->type) {
            'header' => $this->bordered ? 'border-b border-gray-200' : '',
            'footer' => $this->bordered ? 'border-t border-gray-200' : '',
            default => $this->bordered ? 'border-b border-gray-200' : '',
        };

        return $this->mergeClasses([
            ...$this->defaultClasses,
            'p-4',
            $typeClasses,
            $borderClasses,
        ]);
    }
}
