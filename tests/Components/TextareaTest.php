<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('textarea component can be rendered', function () {
    $view = Blade::render('<x-eplus::textarea>Content</x-eplus::textarea>');

    expect($view)
        ->toContain('Content')
        ->toContain('textarea');
});

test('textarea component shows label when provided', function () {
    $view = Blade::render('<x-eplus::textarea label="Description">Content</x-eplus::textarea>');

    expect($view)
        ->toContain('Description')
        ->toContain('label');
});

test('textarea component shows hint when provided', function () {
    $view = Blade::render('<x-eplus::textarea hint="Max 200 characters">Content</x-eplus::textarea>');

    expect($view)
        ->toContain('Max 200 characters')
        ->toContain('text-gray-500');
});

test('textarea component shows error state', function () {
    $view = Blade::render('<x-eplus::textarea error="This field is required">Content</x-eplus::textarea>');

    expect($view)
        ->toContain('This field is required')
        ->toContain('text-red-600')
        ->toContain('border-red-300');
});

test('textarea component accepts custom rows', function () {
    $view = Blade::render('<x-eplus::textarea :rows="5">Content</x-eplus::textarea>');

    expect($view)
        ->toContain('rows="5"');
});

test('textarea component merges attributes', function () {
    $view = Blade::render('<x-eplus::textarea class="custom-class" id="custom-id">Content</x-eplus::textarea>');

    expect($view)
        ->toContain('custom-class')
        ->toContain('custom-id');
}); 