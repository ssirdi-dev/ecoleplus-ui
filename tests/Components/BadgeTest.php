<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('badge component can be rendered', function () {
    $view = Blade::render('<x-eplus::badge>Status</x-eplus::badge>');

    expect($view)
        ->toContain('Status')
        ->toContain('bg-blue-100')
        ->toContain('text-blue-800');
});

test('badge component accepts different variants', function ($variant, $classes) {
    $view = Blade::render("<x-eplus::badge variant=\"{$variant}\">Status</x-eplus::badge>");

    expect($view)->toContain($classes);
})->with([
    ['primary', 'bg-blue-100 text-blue-800'],
    ['secondary', 'bg-gray-100 text-gray-800'],
    ['success', 'bg-green-100 text-green-800'],
    ['danger', 'bg-red-100 text-red-800'],
    ['warning', 'bg-yellow-100 text-yellow-800'],
    ['info', 'bg-indigo-100 text-indigo-800'],
]);

test('badge component accepts different sizes', function ($size, $classes) {
    $view = Blade::render("<x-eplus::badge size=\"{$size}\">Status</x-eplus::badge>");

    expect($view)->toContain($classes);
})->with([
    ['sm', 'px-2 py-0.5 text-xs'],
    ['md', 'px-2.5 py-0.5 text-sm'],
    ['lg', 'px-3 py-1 text-base'],
]);

test('badge component can disable rounded corners', function () {
    $view = Blade::render('<x-eplus::badge :rounded="false">Status</x-eplus::badge>');

    expect($view)
        ->not->toContain('rounded-full')
        ->toContain('rounded');
});

test('badge component merges attributes', function () {
    $view = Blade::render('<x-eplus::badge class="custom-class" id="custom-id">Status</x-eplus::badge>');

    expect($view)
        ->toContain('custom-class')
        ->toContain('custom-id');
}); 