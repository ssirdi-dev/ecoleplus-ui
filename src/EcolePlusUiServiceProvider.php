<?php

namespace EcolePlus\EcolePlusUi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use BladeUI\Heroicons\BladeHeroiconsServiceProvider;

class EcolePlusUiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/ecoleplus-ui.php', 'ecoleplus-ui'
        );

        // Register Heroicons provider if not already registered
        if (!$this->app->providerIsLoaded(BladeHeroiconsServiceProvider::class)) {
            $this->app->register(BladeHeroiconsServiceProvider::class);
        }
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ecoleplus-ui');

        $this->publishes([
            __DIR__.'/../config/ecoleplus-ui.php' => config_path('ecoleplus-ui.php'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/ecoleplus-ui'),
            __DIR__.'/../resources/css' => resource_path('css/vendor/ecoleplus-ui'),
            __DIR__.'/../resources/js' => resource_path('js/vendor/ecoleplus-ui'),
        ], 'ecoleplus-ui-assets');

        $this->registerComponents();
    }

    protected function registerComponents(): void
    {
        Blade::anonymousComponentPath(__DIR__.'/../resources/views/components', 'eplus');
    }
} 