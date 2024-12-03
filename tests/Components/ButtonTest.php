<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('button component can be rendered', function () {
    $view = Blade::render('<x-eplus::button class="custom">Click me</x-eplus::button>');

    expect($view)
        ->toContain('button')
        ->toContain('inline-flex items-center')
        ->toContain('custom');
});

test('button component accepts type attribute', function () {
    $view = Blade::render('<x-eplus::button type="submit">Submit</x-eplus::button>');

    expect($view)
        ->toContain('type="submit"');
});

test('button component accepts variant attribute', function () {
    $view = Blade::render('<x-eplus::button variant="secondary">Click me</x-eplus::button>');

    expect($view)
        ->toContain('bg-gray-600')
        ->toContain('hover:bg-gray-700');
});

test('button component can be disabled', function () {
    $view = Blade::render('<x-eplus::button disabled>Click me</x-eplus::button>');

    expect($view)
        ->toContain('disabled')
        ->toContain('disabled:opacity-50')
        ->toContain('disabled:cursor-not-allowed');
});

test('button component accepts left icon', function () {
    $view = Blade::render('<x-eplus::button :iconLeft="\'heroicon-m-plus\'">Click me</x-eplus::button>');

    expect($view)
        ->toContain('svg')
        ->toContain('-ml-1 mr-2');
});

test('button component accepts right icon', function () {
    $view = Blade::render('<x-eplus::button :iconRight="\'heroicon-m-arrow-right\'">Click me</x-eplus::button>');

    expect($view)
        ->toContain('svg')
        ->toContain('-mr-1 ml-2');
});

test('button component merges attributes', function () {
    $view = Blade::render('<x-eplus::button class="custom-class" data-test="button">Click me</x-eplus::button>');

    expect($view)
        ->toContain('custom-class')
        ->toContain('data-test="button"');
}); 