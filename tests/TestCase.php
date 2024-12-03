<?php

namespace EcolePlus\EcolePlusUi\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use EcolePlus\EcolePlusUi\EcolePlusUiServiceProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        // Load package views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ecoleplus-ui');

        // Load package config
        $this->mergeConfigFrom(__DIR__.'/../config/ecoleplus-ui.php', 'ecoleplus-ui');
    }

    protected function getPackageProviders($app): array
    {
        return [
            BladeIconsServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            EcolePlusUiServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        // Set up any environment configuration
        $app['config']->set('app.key', 'base64:'.base64_encode(random_bytes(32)));
    }

    protected function loadViewsFrom(string $path, string $namespace): void
    {
        /** @var Application $app */
        $app = $this->app;
        $app['view']->addNamespace($namespace, $path);
    }

    protected function mergeConfigFrom(string $path, string $key): void
    {
        /** @var Application $app */
        $app = $this->app;
        $app['config']->set($key, require $path);
    }
} 