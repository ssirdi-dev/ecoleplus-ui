<?php

namespace EcolePlus\EcolePlusUi\Tests\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    View::addNamespace('ecoleplus-ui', __DIR__ . '/../../../resources/views');
});

test('renders basic radio', function () {
    $html = Blade::render(
        '<x-eplus-radio name="color" value="red" />'
    );

    expect($html)
        ->toContain('type="radio"')
        ->toContain('name="color"')
        ->toContain('value="red"')
        ->toContain('role="radio"')
        ->toContain('h-4 w-4')
        ->toContain('rounded-full')
        ->toContain('border-input');
});

test('renders radio with label', function () {
    $html = Blade::render(
        '<x-eplus-radio name="color" value="red" label="Red" />'
    );

    expect($html)
        ->toContain('Red')
        ->toContain('<label')
        ->toContain('for="color-red"');
});

test('renders required radio', function () {
    $html = Blade::render(
        '<x-eplus-radio name="color" value="red" label="Red" required />'
    );

    expect($html)
        ->toContain('required')
        ->toContain('*</span>');
});

test('renders disabled radio', function () {
    $html = Blade::render(
        '<x-eplus-radio name="color" value="red" disabled />'
    );

    expect($html)
        ->toContain('disabled');
});

test('renders radio with error', function () {
    $html = Blade::render(
        '<x-eplus-radio name="color" value="red" error="Please select a color" />'
    );

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('Please select a color')
        ->toContain('text-destructive');
});

test('renders radio with description', function () {
    $html = Blade::render(
        '<x-eplus-radio name="color" value="red" description="Choose your favorite color" />'
    );

    expect($html)
        ->toContain('Choose your favorite color')
        ->toContain('text-muted-foreground');
});

test('supports livewire binding', function () {
    $html = Blade::render(
        '<x-eplus-radio wire:model="color" name="color" value="red" label="Red" />'
    );

    expect($html)
        ->toContain('wire:model="color"')
        ->toContain('wire:loading.delay.class="opacity-100"')
        ->toContain('wire:dirty.class="opacity-100"');
});

test('renders loading indicator with proper SVG', function () {
    $html = Blade::render(
        '<x-eplus-radio wire:model="color" name="color" value="red" label="Red" />'
    );

    expect($html)
        ->toContain('<svg class="animate-spin h-4 w-4 inline-block"')
        ->toContain('xmlns="http://www.w3.org/2000/svg"')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="none"')
        ->toContain('<circle class="opacity-25"')
        ->toContain('<path class="opacity-75"');
});

test('renders dirty indicator with proper SVG', function () {
    $html = Blade::render(
        '<x-eplus-radio wire:model="color" name="color" value="red" label="Red" />'
    );

    expect($html)
        ->toContain('<svg class="h-4 w-4 inline-block"')
        ->toContain('xmlns="http://www.w3.org/2000/svg"')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="currentColor"')
        ->toContain('fill-rule="evenodd"');
});

test('generates unique ids for multiple radios with same name', function () {
    $html = Blade::render('
        <x-eplus-radio name="color" value="red" label="Red" />
        <x-eplus-radio name="color" value="blue" label="Blue" />
    ');

    expect($html)
        ->toContain('id="color-red"')
        ->toContain('id="color-blue"')
        ->toContain('for="color-red"')
        ->toContain('for="color-blue"');
}); 