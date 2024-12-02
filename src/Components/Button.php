<?php

namespace Ecoleplus\EcoleplusUi\Components;

class Button extends BaseComponent
{
    /**
     * The button type.
     *
     * @var string
     */
    public $type;

    /**
     * The button variant.
     *
     * @var string
     */
    public $variant;

    /**
     * The button size.
     *
     * @var string
     */
    public $size;

    /**
     * Whether the button is disabled.
     *
     * @var bool
     */
    public $disabled;

    /**
     * The button icon.
     *
     * @var string|null
     */
    public $icon;

    /**
     * The icon position.
     *
     * @var string
     */
    public $iconPosition;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string $variant
     * @param string $size
     * @param bool $disabled
     * @param string|null $icon
     * @param string $iconPosition
     */
    public function __construct(
        string $type = 'button',
        string $variant = 'primary',
        string $size = 'md',
        bool $disabled = false,
        ?string $icon = null,
        string $iconPosition = 'left'
    ) {
        $this->type = $type;
        $this->variant = $variant;
        $this->size = $size;
        $this->disabled = $disabled;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;

        $this->defaultClasses = [
            $this->getDefaultClasses('button'),
            $this->getColorClasses($variant, 'button'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('ecoleplus-ui::components.button');
    }

    /**
     * Get the size classes for the button.
     *
     * @return string
     */
    public function sizeClasses(): string
    {
        return $this->getSizeClasses($this->size, [
            'xs' => 'px-2 py-1 text-xs',
            'sm' => 'px-3 py-1.5 text-sm',
            'md' => 'px-4 py-2 text-base',
            'lg' => 'px-5 py-2.5 text-lg',
            'xl' => 'px-6 py-3 text-xl',
        ]);
    }

    /**
     * Get all the computed classes for the button.
     *
     * @return string
     */
    public function classes(): string
    {
        return $this->mergeClasses([
            ...$this->defaultClasses,
            $this->sizeClasses(),
        ]);
    }
}
