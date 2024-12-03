<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('alert component can be rendered', function () {
    $view = Blade::render('<x-eplus::alert>Alert message</x-eplus::alert>');

    expect($view)
        ->toContain('Alert message')
        ->toContain('role="alert"')
        ->toContain('aria-live="polite"');
});

test('alert component accepts different types', function ($type, $baseClass, $textClass) {
    $view = Blade::render('<x-eplus::alert type="' . $type . '">Alert message</x-eplus::alert>');

    expect($view)
        ->toContain($baseClass)
        ->toContain($textClass);
})->with([
    ['info', 'bg-blue-50', 'text-blue-700'],
    ['success', 'bg-green-50', 'text-green-700'],
    ['warning', 'bg-yellow-50', 'text-yellow-700'],
    ['error', 'bg-red-50', 'text-red-700'],
]);

test('alert component shows title when provided', function () {
    $view = Blade::render('
        <x-eplus::alert title="Important!">
            Alert message
        </x-eplus::alert>
    ');

    expect($view)
        ->toContain('Important!')
        ->toContain('font-medium');
});

test('alert component can be dismissible', function () {
    $view = Blade::render('
        <x-eplus::alert dismissible>
            Alert message
        </x-eplus::alert>
    ');

    expect($view)
        ->toContain('x-data="{ show: true }"')
        ->toContain('@click="show = false"')
        ->toContain('aria-label="Dismiss"');
});

test('alert component supports dark mode', function () {
    $view = Blade::render('
        <x-eplus::alert type="info">
            Alert message
        </x-eplus::alert>
    ');

    expect($view)
        ->toContain('dark:bg-blue-900/50')
        ->toContain('dark:text-blue-200');
});

test('alert component accepts custom icon', function () {
    $view = Blade::render('
        <x-eplus::alert :icon="$icon">
            Alert message
        </x-eplus::alert>
    ', ['icon' => '<svg class="custom-icon" aria-hidden="true"></svg>']);

    expect($view)
        ->toContain('custom-icon')
        ->toContain('aria-hidden="true"');
});

test('alert component has transitions', function () {
    $view = Blade::render('
        <x-eplus::alert>
            Alert message
        </x-eplus::alert>
    ');

    expect($view)
        ->toContain('x-transition:enter')
        ->toContain('x-transition:leave');
});

test('alert component has hover and focus states for dismiss button', function () {
    $view = Blade::render('
        <x-eplus::alert type="info" dismissible>
            Alert message
        </x-eplus::alert>
    ');

    expect($view)
        ->toContain('hover:bg-blue-100')
        ->toContain('focus:ring-blue-600');
}); 