<?php

namespace Ecoleplus\EcoleplusUi\Tests\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Testing\TestView;

trait ComponentTestCase
{
    protected function blade(string $template, array $data = []): TestView
    {
        $tempDirectory = sys_get_temp_dir();

        if (! in_array($tempDirectory, View::getFinder()->getPaths())) {
            View::addLocation($tempDirectory);
        }

        $tempFile = tempnam($tempDirectory, 'blade') . '.blade.php';

        file_put_contents($tempFile, $template);

        return new TestView(View::make(basename($tempFile, '.blade.php'), $data));
    }

    protected function assertComponentRenders(string $expected, string $template, array $data = []): void
    {
        $blade = trim((string) $this->blade($template, $data));
        $html = trim($expected);

        $this->assertStringContainsString($html, $blade);
    }
}
