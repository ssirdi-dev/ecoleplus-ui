<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('checkbox component can be rendered', function () {
    $view = Blade::render('<x-eplus::checkbox name="terms" />');

    expect($view)
        ->toContain('type="checkbox"')
        ->toContain('name="terms"');
});

test('checkbox component shows label when provided', function () {
    $view = Blade::render('
        <x-eplus::checkbox
            name="terms"
            label="I agree to the terms"
        />
    ');

    expect($view)
        ->toContain('I agree to the terms')
        ->toContain('for="terms"');
});

test('checkbox component can be checked', function () {
    $view = Blade::render('
        <x-eplus::checkbox
            name="terms"
            :checked="true"
        />
    ');

    expect($view)->toContain('checked');
});

test('checkbox component can be disabled', function () {
    $view = Blade::render('
        <x-eplus::checkbox
            name="terms"
            :disabled="true"
        />
    ');

    expect($view)
        ->toContain('disabled')
        ->toContain('cursor-not-allowed')
        ->toContain('opacity-50');
});

test('checkbox component shows error message', function () {
    $view = Blade::render('
        <x-eplus::checkbox
            name="terms"
            error="You must accept the terms"
        />
    ');

    expect($view)
        ->toContain('You must accept the terms')
        ->toContain('text-red-600');
});

test('checkbox component supports dark mode', function () {
    $view = Blade::render('<x-eplus::checkbox name="terms" />');

    expect($view)
        ->toContain('dark:border-gray-600')
        ->toContain('dark:bg-gray-700')
        ->toContain('dark:checked:border-primary-500')
        ->toContain('dark:checked:bg-primary-500');
}); 