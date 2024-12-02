<?php

namespace Ecoleplus\EcoleplusUi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ecoleplus\EcoleplusUi\Commands\EcoleplusUiCommand;

class EcoleplusUiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('ecoleplus-ui')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_ecoleplus_ui_table')
            ->hasCommand(EcoleplusUiCommand::class);
    }
}
