<?php

namespace Ecoleplus\EcoleplusUi\Components;

class Button extends BaseComponent
{
    /**
     * Available button variants.
     */
    const VARIANTS = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
        'link',
        'outline-primary',
        'outline-secondary',
        'outline-success',
        'outline-danger',
        'outline-warning',
        'outline-info',
        'outline-light',
        'outline-dark',
    ];

    /**
     * Available button sizes.
     */
    const SIZES = ['xs', 'sm', 'md', 'lg', 'xl'];

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
        if (!in_array($variant, self::VARIANTS)) {
            $variant = 'primary';
        }

        if (!in_array($size, self::SIZES)) {
            $size = 'md';
        }

        $this->type = $type;
        $this->variant = $variant;
        $this->size = $size;
        $this->disabled = $disabled;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;

        $this->defaultClasses = [
            $this->getDefaultClasses('button'),
            $this->getColorClasses('variant.'.$variant, 'button'),
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
            'xs' => 'px-2 py-1 text-xs leading-4',
            'sm' => 'px-3 py-1.5 text-sm leading-5',
            'md' => 'px-4 py-2 text-base leading-6',
            'lg' => 'px-5 py-2.5 text-lg leading-7',
            'xl' => 'px-6 py-3 text-xl leading-8',
        ]);
    }

    /**
     * Get all the computed classes for the button.
     *
     * @return string
     */
    public function classes(): string
    {
        $classes = [
            ...$this->defaultClasses,
            $this->sizeClasses(),
        ];

        if ($this->disabled) {
            $classes[] = 'opacity-50 cursor-not-allowed';
        }

        if (str_starts_with($this->variant, 'outline-')) {
            $classes[] = 'bg-transparent border-2';
        }

        if ($this->variant === 'link') {
            $classes[] = 'border-0 bg-transparent underline hover:no-underline';
        }

        return $this->mergeClasses($classes);
    }
}
