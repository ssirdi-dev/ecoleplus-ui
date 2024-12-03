<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('radio component can be rendered', function () {
    $view = Blade::render('
        <x-eplus::radio
            name="color"
            value="red"
        />
    ');

    expect($view)
        ->toContain('type="radio"')
        ->toContain('name="color"')
        ->toContain('value="red"');
});

test('radio component shows label when provided', function () {
    $view = Blade::render('
        <x-eplus::radio
            name="color"
            value="red"
            label="Red"
        />
    ');

    expect($view)
        ->toContain('Red')
        ->toContain('for="color_red"');
});

test('radio component can be checked', function () {
    $view = Blade::render('
        <x-eplus::radio
            name="color"
            value="red"
            :checked="true"
        />
    ');

    expect($view)->toContain('checked');
});

test('radio component can be disabled', function () {
    $view = Blade::render('
        <x-eplus::radio
            name="color"
            value="red"
            :disabled="true"
        />
    ');

    expect($view)
        ->toContain('disabled')
        ->toContain('cursor-not-allowed')
        ->toContain('opacity-50');
});

test('radio component shows error message', function () {
    $view = Blade::render('
        <x-eplus::radio
            name="color"
            value="red"
            error="Please select a color"
        />
    ');

    expect($view)
        ->toContain('Please select a color')
        ->toContain('text-red-600');
});

test('radio component supports dark mode', function () {
    $view = Blade::render('
        <x-eplus::radio
            name="color"
            value="red"
        />
    ');

    expect($view)
        ->toContain('dark:border-gray-600')
        ->toContain('dark:bg-gray-700')
        ->toContain('dark:checked:border-primary-500')
        ->toContain('dark:checked:bg-primary-500');
}); 