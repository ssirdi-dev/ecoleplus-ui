<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('input component can be rendered', function () {
    $view = Blade::render('<x-eplus::input name="test" class="custom" />');

    expect($view)
        ->toContain('input')
        ->toContain('name="test"')
        ->toContain('block w-full rounded-md')
        ->toContain('custom');
});

test('input component shows label when provided', function () {
    $view = Blade::render('<x-eplus::input name="test" label="Test Label" />');

    expect($view)
        ->toContain('Test Label')
        ->toContain('label');
});

test('input component shows hint when provided', function () {
    $view = Blade::render('<x-eplus::input name="test" hint="Test hint" />');

    expect($view)
        ->toContain('Test hint')
        ->toContain('text-gray-500');
});

test('input component shows error state', function () {
    $view = Blade::render('<x-eplus::input name="test" error="Test error" />');

    expect($view)
        ->toContain('Test error')
        ->toContain('text-red-600')
        ->toContain('border-red-300');
});

test('input component shows validation error message', function () {
    $view = Blade::render('<x-eplus::input name="test" error="Field is required" />');

    expect($view)
        ->toContain('Field is required')
        ->toContain('text-red-600');
});

test('input component shows icon when provided', function () {
    $view = Blade::render('<x-eplus::input name="test" icon="heroicon-m-envelope" />');

    expect($view)
        ->toContain('svg')
        ->toContain('absolute inset-y-0')
        ->toContain('text-gray-400');
});

test('input component accepts different types', function () {
    $view = Blade::render('<x-eplus::input name="test" type="email" />');

    expect($view)
        ->toContain('type="email"');
});

test('input component merges attributes', function () {
    $view = Blade::render('<x-eplus::input name="test" class="custom-class" data-test="input" />');

    expect($view)
        ->toContain('custom-class')
        ->toContain('data-test="input"');
}); 