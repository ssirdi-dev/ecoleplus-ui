<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('card section component can be rendered', function () {
    $view = Blade::render('<x-eplus::card-section>Content</x-eplus::card-section>');

    expect($view)
        ->toContain('Content')
        ->toContain('border-b border-gray-200');
});

test('card section component can have title', function () {
    $view = Blade::render('<x-eplus::card-section title="Section Title">Content</x-eplus::card-section>');

    expect($view)
        ->toContain('Section Title')
        ->toContain('Content')
        ->toContain('text-base font-semibold');
});

test('card section component can have description', function () {
    $view = Blade::render('
        <x-eplus::card-section 
            title="Section Title" 
            description="Section Description"
        >Content</x-eplus::card-section>
    ');

    expect($view)
        ->toContain('Section Description')
        ->toContain('text-gray-500');
});

test('card section component can disable divider', function () {
    $view = Blade::render('<x-eplus::card-section :noDivider="true">Content</x-eplus::card-section>');

    /** @var \Pest\Expectation|\Pest\Support\Extendable $expect */
    $expect = expect($view);
    $expect->not->toContain('border-b')
        ->not->toContain('border-gray-200');
});

test('card section component adds spacing when has title or description', function () {
    $view = Blade::render('<x-eplus::card-section title="Title">Content</x-eplus::card-section>');

    expect($view)
        ->toContain('mt-5');
});

test('card section component merges attributes', function () {
    $view = Blade::render('<x-eplus::card-section class="custom-class" id="custom-id">Content</x-eplus::card-section>');

    expect($view)
        ->toContain('custom-class')
        ->toContain('custom-id');
}); 