<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('dropdown component can be rendered', function () {
    $view = Blade::render('
        <x-eplus::dropdown>
            <x-slot:trigger>
                <button x-ref="trigger">Dropdown</button>
            </x-slot:trigger>
            <x-slot:content>
                Content
            </x-slot:content>
        </x-eplus::dropdown>
    ');

    expect($view)
        ->toContain('button')
        ->toContain('Content')
        ->toContain('x-data="{ open: false }"')
        ->toContain('x-anchor.bottom-start.offset.5="$refs.trigger"');
});

test('dropdown component accepts different alignments', function ($align, $classes) {
    $view = Blade::render('
        <x-eplus::dropdown align="' . $align . '">
            <x-slot:trigger>
                <button x-ref="trigger">Dropdown</button>
            </x-slot:trigger>
            <x-slot:content>
                Content
            </x-slot:content>
        </x-eplus::dropdown>
    ');

    expect($view)->toContain($classes);
})->with([
    ['left', 'left-0'],
    ['right', 'right-0'],
]);

test('dropdown component accepts different widths', function ($width, $class) {
    $view = Blade::render('
        <x-eplus::dropdown width="' . $width . '">
            <x-slot:trigger>
                <button x-ref="trigger">Dropdown</button>
            </x-slot:trigger>
            <x-slot:content>
                Content
            </x-slot:content>
        </x-eplus::dropdown>
    ');

    expect($view)->toContain($class);
})->with([
    ['48', 'w-48'],
    ['96', 'w-96'],
]);

test('dropdown component supports dark mode', function () {
    $view = Blade::render('
        <x-eplus::dropdown>
            <x-slot:trigger>
                <button x-ref="trigger">Dropdown</button>
            </x-slot:trigger>
            <x-slot:content>
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200">
                        Item
                    </a>
                </div>
            </x-slot:content>
        </x-eplus::dropdown>
    ');

    expect($view)
        ->toContain('dark:text-gray-200')
        ->toContain('dark:bg-gray-700');
}); 