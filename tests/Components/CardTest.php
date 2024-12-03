<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('card component can be rendered', function () {
    $view = Blade::render('<x-eplus::card>Content</x-eplus::card>');

    expect($view)
        ->toContain('Content')
        ->toContain('bg-white')
        ->toContain('rounded-lg')
        ->toContain('border-gray-200');
});

test('card component can have header', function () {
    $view = Blade::render('
        <x-eplus::card>
            <x-slot:header>Header Content</x-slot:header>
            Body Content
        </x-eplus::card>
    ');

    expect($view)
        ->toContain('Header Content')
        ->toContain('Body Content');
});

test('card component can have footer', function () {
    $view = Blade::render('
        <x-eplus::card>
            Body Content
            <x-slot:footer>Footer Content</x-slot:footer>
        </x-eplus::card>
    ');

    expect($view)
        ->toContain('Footer Content')
        ->toContain('Body Content');
});

test('card component can disable padding', function () {
    $view = Blade::render('<x-eplus::card :padding="false">Content</x-eplus::card>');

    /** @var \Pest\Expectation|\Pest\Support\Extendable $expect */
    $expect = expect($view);
    $expect->not->toContain('p-4')
        ->not->toContain('sm:p-6');
});

test('card component can disable shadow', function () {
    $view = Blade::render('<x-eplus::card :shadow="false">Content</x-eplus::card>');

    /** @var \Pest\Expectation|\Pest\Support\Extendable $expect */
    $expect = expect($view);
    $expect->not->toContain('shadow-sm');
});

test('card component merges attributes', function () {
    $view = Blade::render('<x-eplus::card class="custom-class" id="custom-id">Content</x-eplus::card>');

    expect($view)
        ->toContain('custom-class')
        ->toContain('custom-id');
}); 