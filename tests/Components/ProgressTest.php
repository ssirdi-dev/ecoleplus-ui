<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('progress component can be rendered', function () {
    $view = Blade::render('<x-eplus::progress :value="50" />');

    expect($view)
        ->toContain('role="progressbar"')
        ->toContain('style="width: 50%"');
});

test('progress component accepts different variants', function ($variant, $class) {
    $view = Blade::render('
        <x-eplus::progress 
            :value="50"
            variant="' . $variant . '"
        />
    ');

    expect($view)->toContain($class);
})->with([
    ['primary', 'bg-primary-600'],
    ['secondary', 'bg-gray-600'],
    ['success', 'bg-green-600'],
    ['danger', 'bg-red-600'],
    ['warning', 'bg-yellow-600'],
    ['info', 'bg-blue-600'],
]);

test('progress component accepts different sizes', function ($size, $class) {
    $view = Blade::render('
        <x-eplus::progress 
            :value="50"
            size="' . $size . '"
        />
    ');

    expect($view)->toContain($class);
})->with([
    ['xs', 'h-1'],
    ['sm', 'h-2'],
    ['md', 'h-3'],
    ['lg', 'h-4'],
    ['xl', 'h-5'],
]);

test('progress component shows label when provided', function () {
    $view = Blade::render('
        <x-eplus::progress 
            :value="50"
            label="Loading..."
        />
    ');

    expect($view)
        ->toContain('Loading...')
        ->toContain('text-sm font-medium');
});

test('progress component shows value when enabled', function () {
    $view = Blade::render('
        <x-eplus::progress 
            :value="50"
            label="Loading..."
            :showValue="true"
        />
    ');

    expect($view)
        ->toContain('50%')
        ->toContain('text-sm font-medium');
});

test('progress component can be animated', function () {
    $view = Blade::render('
        <x-eplus::progress 
            :value="50"
            :animated="true"
        />
    ');

    expect($view)->toContain('animate-[progress_1s_ease-in-out]');
}); 