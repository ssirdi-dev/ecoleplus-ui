<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    View::addNamespace('ecoleplus-ui', __DIR__ . '/../../resources/views');
});

test('renders a button with label', function () {
    $html = Blade::render(
        '<x-eplus-button label="Click me" variant="primary" />'
    );

    expect($html)
        ->toContain('Click me')
        ->toContain('type="button"')
        ->toContain('inline-flex items-center');
});

test('renders a button with different variants', function (string $variant, array $expectedClasses) {
    $html = Blade::render(
        '<x-eplus-button label="Click me" :variant="$variant" />', 
        ['variant' => $variant]
    );

    foreach ($expectedClasses as $class) {
        expect($html)->toContain($class);
    }
})->with([
    'primary' => ['primary', ['bg-primary', 'text-primary-foreground']],
    'secondary' => ['secondary', ['bg-secondary', 'text-secondary-foreground']],
    'danger' => ['danger', ['bg-destructive', 'text-destructive-foreground']],
    'success' => ['success', ['bg-green-600', 'dark:bg-green-500']],
    'warning' => ['warning', ['bg-yellow-500', 'dark:bg-yellow-600']],
    'info' => ['info', ['bg-sky-500', 'dark:bg-sky-400']],
    'dark' => ['dark', ['bg-gray-900', 'dark:bg-gray-600']],
    'outline' => ['outline', ['border', 'border-input', 'bg-background']],
    'ghost' => ['ghost', ['hover:bg-accent']],
    'link' => ['link', ['text-primary', 'underline-offset-4']],
]);

test('renders buttons with different sizes', function (string $size, string $expectedClass) {
    $html = Blade::render(
        '<x-eplus-button label="Click me" variant="primary" :size="$size" />', 
        ['size' => $size]
    );

    expect($html)->toContain($expectedClass);
})->with([
    'default' => ['default', 'h-10 px-4'],
    'sm' => ['sm', 'h-9 px-3'],
    'lg' => ['lg', 'h-11 px-8'],
    'icon' => ['icon', 'h-10 w-10'],
]);

test('renders a button with an icon', function () {
    $html = Blade::render(
        '<x-eplus-button label="Click me" variant="primary" icon="heroicon-o-plus" />'
    );

    expect($html)
        ->toContain('<svg')
        ->toContain('w-5 h-5');
});

test('renders a button with right positioned icon', function () {
    $html = Blade::render(
        '<x-eplus-button label="Click me" variant="primary" icon="heroicon-o-plus" icon-position="right" />'
    );

    expect($html)
        ->toContain('<svg')
        ->toContain('w-5 h-5');
});

test('handles missing icon gracefully', function () {
    $html = Blade::render(
        '<x-eplus-button label="Click me" variant="primary" />'
    );

    expect($html)
        ->not->toContain('heroicon')
        ->not->toContain('undefined');
});

test('uses primary variant as default for invalid variants', function () {
    $html = Blade::render(
        '<x-eplus-button label="Click me" variant="invalid" />'
    );

    expect($html)
        ->toContain('bg-primary')
        ->toContain('text-primary-foreground');
});

test('includes dark mode focus ring offset', function () {
    $html = Blade::render(
        '<x-eplus-button label="Click me" variant="primary" />'
    );

    expect($html)->toContain('focus-visible:ring-2');
});

test('handles livewire loading states', function () {
    $html = Blade::render(
        '<x-eplus-button wire:click="save" label="Save" variant="primary" />'
    );

    expect($html)
        ->toContain('wire:loading.attr="disabled"')
        ->toContain('wire:loading.delay.class="opacity-0"')
        ->toContain('animate-spin');
});

test('shows loading spinner when processing', function () {
    $html = Blade::render(
        '<x-eplus-button wire:click="process" label="Process" variant="primary" icon="heroicon-o-arrow-path" />'
    );

    expect($html)
        ->toContain('wire:loading.delay')
        ->toContain('wire:target="process"')
        ->toContain('animate-spin');
});

test('supports livewire confirmation', function () {
    $html = Blade::render(
        '<x-eplus-button wire:click="delete" wire:confirm="Are you sure?" label="Delete" variant="danger" />'
    );

    expect($html)
        ->toContain('x-on:click.prevent="$wire.confirm(\'Are you sure?\')"');
}); 