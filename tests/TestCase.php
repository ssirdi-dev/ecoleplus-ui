<?php

namespace EcolePlus\EcolePlusUi\Tests;

use EcolePlus\EcolePlusUi\EcolePlusUiServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Support\Facades\View;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            EcolePlusUiServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        // Configure the app for testing
        $app['config']->set('app.key', 'base64:'.base64_encode(random_bytes(32)));
    }
} 