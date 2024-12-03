<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('avatar component can be rendered with image', function () {
    $view = Blade::render('
        <x-eplus::avatar 
            src="https://example.com/avatar.jpg"
            alt="John Doe"
        />
    ');

    expect($view)
        ->toContain('src="https://example.com/avatar.jpg"')
        ->toContain('alt="John Doe"')
        ->toContain('rounded-full');
});

test('avatar component shows initials when no image provided', function () {
    $view = Blade::render('
        <x-eplus::avatar 
            alt="John Doe"
        />
    ');

    expect($view)
        ->toContain('JD')
        ->toContain('bg-gray-100');
});

test('avatar component accepts different sizes', function ($size, $class) {
    $view = Blade::render('
        <x-eplus::avatar 
            alt="John Doe"
            size="' . $size . '"
        />
    ');

    expect($view)->toContain($class);
})->with([
    ['xs', 'h-6 w-6'],
    ['sm', 'h-8 w-8'],
    ['md', 'h-10 w-10'],
    ['lg', 'h-12 w-12'],
    ['xl', 'h-14 w-14'],
    ['2xl', 'h-16 w-16'],
]);

test('avatar component shows status indicator', function ($status, $class) {
    $view = Blade::render('
        <x-eplus::avatar 
            alt="John Doe"
            status="' . $status . '"
        />
    ');

    expect($view)->toContain($class);
})->with([
    ['online', 'bg-green-400'],
    ['offline', 'bg-gray-400'],
    ['busy', 'bg-red-400'],
    ['away', 'bg-yellow-400'],
]); 