<?php

namespace EcolePlus\EcolePlusUi\Tests\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    View::addNamespace('ecoleplus-ui', __DIR__ . '/../../../resources/views');
});

test('renders basic select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" />'
    );

    expect($html)
        ->toContain('name="country"')
        ->toContain('role="combobox"')
        ->toContain('bg-background')
        ->toContain('text-foreground')
        ->toContain('border-input');
});

test('renders select with label', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" label="Country" />'
    );

    expect($html)
        ->toContain('Country')
        ->toContain('<label')
        ->toContain('for="country"')
        ->toContain('text-foreground');
});

test('renders required select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" label="Country" required />'
    );

    expect($html)
        ->toContain('required')
        ->toContain('text-destructive');
});

test('renders disabled select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" disabled />'
    );

    expect($html)
        ->toContain('disabled')
        ->toContain('disabled:opacity-50')
        ->toContain('disabled:cursor-not-allowed');
});

test('renders select with error', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" error="Please select a country" />'
    );

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('Please select a country')
        ->toContain('text-destructive')
        ->toContain('border-destructive');
});

test('renders select with hint', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" hint="Choose your country of residence" />'
    );

    expect($html)
        ->toContain('Choose your country of residence')
        ->toContain('text-muted-foreground');
});

test('renders select with leading icon', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" leading-icon="globe-alt" />'
    );

    expect($html)
        ->toContain('pl-10')
        ->toContain('text-muted-foreground')
        ->toContain('left-0');
});

test('renders searchable select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" searchable />'
    );

    expect($html)
        ->toContain('<input')
        ->toContain('type="text"')
        ->toContain('x-model="search"');
});

test('renders multiple select', function () {
    $html = Blade::render(
        '<x-eplus-select name="countries" multiple />'
    );

    expect($html)
        ->toContain('multiple: true')
        ->toContain(':aria-multiselectable="multiple.toString()"');
});

test('renders clearable select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" clearable />'
    );

    expect($html)
        ->toContain('clearable: true')
        ->toContain('text-muted-foreground');
});

test('renders listbox with proper colors', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" />'
    );

    expect($html)
        ->toContain('bg-popover')
        ->toContain('text-popover-foreground')
        ->toContain('ring-border');
});

test('renders options with proper hover states', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" />'
    );

    expect($html)
        ->toContain('hover:bg-accent')
        ->toContain('hover:text-accent-foreground')
        ->toContain('focus:bg-accent')
        ->toContain('focus:text-accent-foreground');
});

test('supports livewire binding', function () {
    $html = Blade::render(
        '<x-eplus-select wire:model="country" label="Country" />'
    );

    expect($html)
        ->toContain('wire:model="country"')
        ->toContain('wire:loading.delay.class="opacity-100"')
        ->toContain('wire:dirty.class="opacity-100"');
});

test('renders loading indicator with proper SVG', function () {
    $html = Blade::render(
        '<x-eplus-select wire:model="country" label="Country" />'
    );

    expect($html)
        ->toContain('<svg class="animate-spin h-4 w-4 inline-block text-foreground"')
        ->toContain('xmlns="http://www.w3.org/2000/svg"')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="none"')
        ->toContain('<circle class="opacity-25"')
        ->toContain('<path class="opacity-75"');
});

test('renders dirty indicator with proper SVG', function () {
    $html = Blade::render(
        '<x-eplus-select wire:model="country" label="Country" />'
    );

    expect($html)
        ->toContain('<svg class="h-4 w-4 inline-block"')
        ->toContain('xmlns="http://www.w3.org/2000/svg"')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="currentColor"')
        ->toContain('fill-rule="evenodd"');
}); 