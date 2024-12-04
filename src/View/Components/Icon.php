<?php

namespace EcolePlus\EcolePlusUi\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;

class Icon extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $type = 'heroicon',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('ecoleplus-ui::components.icon');
    }

    /**
     * Get the icon component name.
     */
    public function getIconComponent(): string
    {
        if ($this->type === 'heroicon') {
            $name = $this->name;
            
            // If already prefixed with heroicon-, return as is
            if (Str::startsWith($name, 'heroicon-')) {
                return $name;
            }
            
            // Handle the o- and s- prefixes
            if (Str::startsWith($name, 'o-')) {
                $name = Str::after($name, 'o-');
                return "heroicon-o-{$name}";
            }
            
            if (Str::startsWith($name, 's-')) {
                $name = Str::after($name, 's-');
                return "heroicon-s-{$name}";
            }
            
            // Default to outline if no prefix
            return "heroicon-o-{$name}";
        }

        return $this->name;
    }
} 