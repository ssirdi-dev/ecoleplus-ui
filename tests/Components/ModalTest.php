<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('modal component can be rendered', function () {
    $view = Blade::render('
        <x-eplus::modal name="test-modal">
            <p>Modal Content</p>
        </x-eplus::modal>
    ');

    expect($view)
        ->toContain('Modal Content')
        ->toContain('x-modelable="show"')
        ->toContain('x-teleport="body"');
});

test('modal component shows title when provided', function () {
    $view = Blade::render('
        <x-eplus::modal name="test-modal" title="Test Title">
            <p>Modal Content</p>
        </x-eplus::modal>
    ');

    expect($view)
        ->toContain('Test Title')
        ->toContain('text-lg font-medium');
});

test('modal component accepts different max widths', function ($width, $class) {
    $view = Blade::render('
        <x-eplus::modal name="test-modal" :maxWidth="$width">
            <p>Modal Content</p>
        </x-eplus::modal>
    ', ['width' => $width]);

    expect($view)->toContain($class);
})->with([
    ['sm', 'sm:max-w-sm'],
    ['md', 'sm:max-w-md'],
    ['lg', 'sm:max-w-lg'],
    ['xl', 'sm:max-w-xl'],
    ['2xl', 'sm:max-w-2xl'],
]);

test('modal component shows footer when provided', function () {
    $view = Blade::render('
        <x-eplus::modal name="test-modal">
            <p>Modal Content</p>
            <x-slot:footer>
                <button>Close</button>
            </x-slot:footer>
        </x-eplus::modal>
    ');

    expect($view)
        ->toContain('Close')
        ->toContain('bg-gray-100');
});

test('modal component supports dark mode', function () {
    $view = Blade::render('
        <x-eplus::modal name="test-modal" title="Test Title">
            <p>Modal Content</p>
            <x-slot:footer>
                <button>Close</button>
            </x-slot:footer>
        </x-eplus::modal>
    ');

    expect($view)
        ->toContain('dark:bg-gray-800')
        ->toContain('dark:border-gray-700')
        ->toContain('dark:text-gray-100');
});

test('modal component prevents click propagation', function () {
    $view = Blade::render('
        <x-eplus::modal name="test-modal">
            <p>Modal Content</p>
        </x-eplus::modal>
    ');

    expect($view)
        ->toContain('@click.stop');
}); 