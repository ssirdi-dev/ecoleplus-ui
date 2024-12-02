<?php

namespace Ecoleplus\EcoleplusUi;

use Ecoleplus\EcoleplusUi\Commands\EcoleplusUiCommand;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EcoleplusUiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('ecoleplus-ui')
            ->hasConfigFile()
            ->hasViews()
            ->hasViewComponents('ecp')
            ->hasAssets()
            ->hasCommand(EcoleplusUiCommand::class);
    }

    public function packageBooted()
    {
        // Register anonymous Blade components
        Blade::anonymousComponentPath(__DIR__.'/../resources/views/components', 'ecp');
    }

    public function packageRegistered()
    {
        // Register config values
        $this->mergeConfigFrom(
            __DIR__.'/../config/ecoleplus-ui.php', 'ecoleplus-ui'
        );
    }
}
