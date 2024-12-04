<?php

namespace EcolePlus\EcolePlusUi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use EcolePlus\EcolePlusUi\View\Components\Button;
use EcolePlus\EcolePlusUi\View\Components\Icon;
use EcolePlus\EcolePlusUi\View\Components\Form\Input;
use EcolePlus\EcolePlusUi\View\Components\Form\Textarea;
use EcolePlus\EcolePlusUi\View\Components\Form\Select;
use EcolePlus\EcolePlusUi\View\Components\Form\Checkbox;
use EcolePlus\EcolePlusUi\View\Components\Form\Radio;
use EcolePlus\EcolePlusUi\View\Components\Form\Toggle;
    
class EcolePlusUiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register Heroicons provider if not already registered
        if (!$this->app->providerIsLoaded(BladeHeroiconsServiceProvider::class)) {
            $this->app->register(BladeHeroiconsServiceProvider::class);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ecoleplus-ui');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/ecoleplus-ui'),
            __DIR__.'/../resources/css' => resource_path('css/vendor/ecoleplus-ui'),
            __DIR__.'/../resources/js' => resource_path('js/vendor/ecoleplus-ui'),
        ], 'ecoleplus-ui-assets');

        $this->registerComponents();
    }

    /**
     * Register blade components.
     */
    protected function registerComponents(): void
    {
        Blade::componentNamespace('EcolePlus\\EcolePlusUi\\View\\Components', 'eplus');
        
        // Register individual components
        Blade::component('eplus-button', Button::class);
        Blade::component('eplus-icon', Icon::class);
        Blade::component('eplus-input', Input::class);
        Blade::component('eplus-textarea', Textarea::class);
        Blade::component('eplus-select', Select::class);
        Blade::component('eplus-checkbox', Checkbox::class);
        Blade::component('eplus-radio', Radio::class);
        Blade::component('eplus-toggle', Toggle::class);
    }
} 