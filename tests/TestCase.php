<?php

namespace Ecoleplus\EcoleplusUi\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Ecoleplus\EcoleplusUi\EcoleplusUiServiceProvider;
use Ecoleplus\EcoleplusUi\Tests\Components\ComponentTestCase;
use Illuminate\Support\Facades\View;

class TestCase extends Orchestra
{
    use ComponentTestCase;

    protected function setUp(): void
    {
        parent::setUp();

        // Register the package views
        View::addNamespace('ecoleplus-ui', __DIR__.'/../resources/views');

        // Load the package config
        $this->app->make('config')->set([
            'ecoleplus-ui.defaults.button.base' => 'inline-flex items-center justify-center border rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150',
            'ecoleplus-ui.defaults.button.primary' => 'border-transparent text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-500',
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            EcoleplusUiServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [];
    }

    public function getEnvironmentSetUp($app)
    {
        // Set up any environment configuration
        $app['config']->set('view.paths', [
            __DIR__.'/../resources/views',
            resource_path('views'),
        ]);
    }
}
