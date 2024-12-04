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
        ->toContain('flex h-10 w-full rounded-md');
});

test('renders select with label', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" label="Country" />'
    );

    expect($html)
        ->toContain('Country')
        ->toContain('<label')
        ->toContain('for="country"');
});

test('renders required select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" label="Country" required />'
    );

    expect($html)
        ->toContain('required')
        ->toContain('*</span>');
});

test('renders disabled select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" disabled />'
    );

    expect($html)
        ->toContain('disabled');
});

test('renders select with error', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" error="Please select a country" />'
    );

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('Please select a country')
        ->toContain('text-destructive');
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
        ->toContain('<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">')
        ->toContain('<svg')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="none"')
        ->toContain('stroke="currentColor"')
        ->toContain('stroke-width="1.5"');
});

test('renders chevron icon by default', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" />'
    );

    expect($html)
        ->toContain('<div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">')
        ->toContain('<svg')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="none"')
        ->toContain('stroke="currentColor"')
        ->toContain('stroke-width="1.5"');
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
        ->toContain('x-on:click="clear"')
        ->toContain('<svg')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="none"')
        ->toContain('stroke="currentColor"')
        ->toContain('stroke-width="1.5"');
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

test('supports livewire loading states', function () {
    $html = Blade::render(
        '<x-eplus-select wire:model="country" label="Country" wire:loading.class="opacity-50" />'
    );

    expect($html)
        ->toContain('wire:loading.class="opacity-50"')
        ->toContain('wire:loading.delay.class="opacity-100"');
}); 