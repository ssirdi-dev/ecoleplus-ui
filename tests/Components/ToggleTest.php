<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('toggle component can be rendered', function () {
    $view = Blade::render('<x-eplus::toggle name="notifications" />');

    expect($view)
        ->toContain('type="checkbox"')
        ->toContain('name="notifications"')
        ->toContain('role="switch"');
});

test('toggle component shows label when provided', function () {
    $view = Blade::render('
        <x-eplus::toggle
            name="notifications"
            label="Enable notifications"
        />
    ');

    expect($view)
        ->toContain('Enable notifications')
        ->toContain('for="notifications"');
});

test('toggle component shows description when provided', function () {
    $view = Blade::render('
        <x-eplus::toggle
            name="notifications"
            description="Receive email notifications when someone mentions you"
        />
    ');

    expect($view)
        ->toContain('Receive email notifications when someone mentions you')
        ->toContain('text-gray-500');
});

test('toggle component can be checked', function () {
    $view = Blade::render('
        <x-eplus::toggle
            name="notifications"
            :checked="true"
        />
    ');

    expect($view)
        ->toContain('checked: true')
        ->toContain('bg-primary-600');
});

test('toggle component can be disabled', function () {
    $view = Blade::render('
        <x-eplus::toggle
            name="notifications"
            :disabled="true"
        />
    ');

    expect($view)
        ->toContain('disabled')
        ->toContain('cursor-not-allowed')
        ->toContain('opacity-50');
});

test('toggle component shows error state', function () {
    $view = Blade::render('
        <x-eplus::toggle
            name="notifications"
            error="This field is required"
        />
    ');

    expect($view)
        ->toContain('This field is required')
        ->toContain('text-red-600')
        ->toContain('bg-red-500');
});

test('toggle component accepts different sizes', function ($size, $switchClass, $buttonClass) {
    $view = Blade::render('
        <x-eplus::toggle
            name="notifications"
            size="' . $size . '"
        />
    ');

    expect($view)
        ->toContain($switchClass)
        ->toContain($buttonClass);
})->with([
    ['sm', 'h-4 w-7', 'h-3 w-3'],
    ['md', 'h-6 w-11', 'h-5 w-5'],
    ['lg', 'h-8 w-14', 'h-7 w-7'],
]);

test('toggle component supports dark mode', function () {
    $view = Blade::render('
        <x-eplus::toggle
            name="notifications"
            label="Enable notifications"
        />
    ');

    expect($view)
        ->toContain('dark:bg-gray-700')
        ->toContain('dark:text-gray-300')
        ->toContain('dark:focus:ring-offset-gray-800')
        ->toContain('dark:text-gray-400');
}); 