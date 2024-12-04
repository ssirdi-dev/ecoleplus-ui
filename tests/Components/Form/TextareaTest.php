<?php

namespace EcolePlus\EcolePlusUi\Tests\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    View::addNamespace('ecoleplus-ui', __DIR__ . '/../../../resources/views');
});

test('renders basic textarea', function () {
    $html = Blade::render(
        '<x-eplus-textarea name="description" />'
    );

    expect($html)
        ->toContain('name="description"')
        ->toContain('rows="3"')
        ->toContain('flex w-full rounded-md');
});

test('renders textarea with label', function () {
    $html = Blade::render(
        '<x-eplus-textarea name="description" label="Description" />'
    );

    expect($html)
        ->toContain('Description')
        ->toContain('<label')
        ->toContain('for="description"');
});

test('renders required textarea', function () {
    $html = Blade::render(
        '<x-eplus-textarea name="description" label="Description" required />'
    );

    expect($html)
        ->toContain('required')
        ->toContain('*</span>');
});

test('renders disabled textarea', function () {
    $html = Blade::render(
        '<x-eplus-textarea name="description" disabled />'
    );

    expect($html)
        ->toContain('disabled');
});

test('renders textarea with error', function () {
    $html = Blade::render(
        '<x-eplus-textarea name="description" error="Description is required" />'
    );

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('Description is required')
        ->toContain('text-destructive');
});

test('renders textarea with hint', function () {
    $html = Blade::render(
        '<x-eplus-textarea name="description" hint="Maximum 500 characters" />'
    );

    expect($html)
        ->toContain('Maximum 500 characters')
        ->toContain('text-muted-foreground');
});

test('renders textarea with custom rows', function () {
    $html = Blade::render(
        '<x-eplus-textarea name="description" :rows="5" />'
    );

    expect($html)
        ->toContain('rows="5"');
});

test('renders auto-resizing textarea', function () {
    $html = Blade::render(
        '<x-eplus-textarea name="description" auto-resize />'
    );

    expect($html)
        ->toContain('x-data="{')
        ->toContain('@input="resize()"')
        ->toContain('resize-none overflow-hidden');
});

test('renders textarea with min and max rows', function () {
    $html = Blade::render(
        '<x-eplus-textarea name="description" auto-resize :min-rows="2" :max-rows="6" />'
    );

    expect($html)
        ->toContain('data-min-rows="2"')
        ->toContain('data-max-rows="6"')
        ->toContain('x-data="{');
});

test('supports livewire binding', function () {
    $html = Blade::render(
        '<x-eplus-textarea wire:model="description" label="Description" />'
    );

    expect($html)
        ->toContain('wire:model="description"')
        ->toContain('wire:loading.delay.class="opacity-100"')
        ->toContain('wire:dirty.class="opacity-100"');
});

test('supports livewire loading states', function () {
    $html = Blade::render(
        '<x-eplus-textarea wire:model="description" label="Description" wire:loading.class="opacity-50" />'
    );

    expect($html)
        ->toContain('wire:loading.class="opacity-50"')
        ->toContain('wire:loading.delay.class="opacity-100"');
});

test('supports livewire confirmation', function () {
    $html = Blade::render(
        '<x-eplus-textarea wire:model="description" wire:confirm="Are you sure?" />'
    );

    expect($html)
        ->toContain('x-on:keydown.enter.prevent="$wire.confirm(\'Are you sure?\')"');
}); 