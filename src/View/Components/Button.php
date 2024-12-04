<?php

namespace EcolePlus\EcolePlusUi\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string|null $variant Available variants: primary, secondary, danger, success, warning, info, dark, outline, ghost, link
     * @param string|null $size Available sizes: default, sm, lg, icon
     * @param string|null $label The button text
     * @param string|null $icon The icon name (e.g., 'o-plus' for heroicon outline plus)
     * @param string|null $iconType The icon library type (heroicon, fontawesome, etc.)
     * @param string|null $iconPosition Position of the icon: 'left' or 'right'
     * @param string|null $iconClass CSS classes for the icon
     * @param string|null $description ARIA description for the button
     * @param bool $pressed Whether the button is in a pressed state (aria-pressed)
     * @param bool $expanded Whether the button controls an expanded element (aria-expanded)
     * @param string|null $controls ID of the element this button controls (aria-controls)
     * @param string|null $labelledby ID of the element that labels this button (aria-labelledby)
     */
    public function __construct(
        public readonly ?string $variant = 'primary',
        public readonly ?string $size = 'default',
        public readonly ?string $label = null,
        public readonly ?string $icon = null,
        public readonly ?string $iconType = 'heroicon',
        public readonly ?string $iconPosition = 'left',
        public readonly ?string $iconClass = 'w-5 h-5',
        public readonly ?string $description = null,
        public readonly bool $pressed = false,
        public readonly bool $expanded = false,
        public readonly ?string $controls = null,
        public readonly ?string $labelledby = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('ecoleplus-ui::components.button');
    }
} 