<?php

namespace EcolePlus\EcolePlusUi\Tests\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    View::addNamespace('ecoleplus-ui', __DIR__ . '/../../../resources/views');
});

test('renders basic input', function () {
    $html = Blade::render(
        '<x-eplus-input name="email" type="email" />'
    );

    expect($html)
        ->toContain('type="email"')
        ->toContain('name="email"')
        ->toContain('flex h-10 w-full rounded-md');
});

test('renders input with label', function () {
    $html = Blade::render(
        '<x-eplus-input name="email" label="Email Address" />'
    );

    expect($html)
        ->toContain('Email Address')
        ->toContain('<label')
        ->toContain('for="email"');
});

test('renders required input', function () {
    $html = Blade::render(
        '<x-eplus-input name="email" label="Email" required />'
    );

    expect($html)
        ->toContain('required')
        ->toContain('*</span>');
});

test('renders disabled input', function () {
    $html = Blade::render(
        '<x-eplus-input name="email" disabled />'
    );

    expect($html)
        ->toContain('disabled');
});

test('renders input with error', function () {
    $html = Blade::render(
        '<x-eplus-input name="email" error="Invalid email address" />'
    );

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('Invalid email address')
        ->toContain('text-destructive');
});

test('renders input with hint', function () {
    $html = Blade::render(
        '<x-eplus-input name="password" hint="Must be at least 8 characters" />'
    );

    expect($html)
        ->toContain('Must be at least 8 characters')
        ->toContain('text-muted-foreground');
});

test('renders input with leading icon', function () {
    $html = Blade::render(
        '<x-eplus-input name="search" leading-icon="magnifying-glass" />'
    );

    expect($html)
        ->toContain('pl-10')
        ->toContain('<svg')
        ->toContain('left-0');
});

test('renders input with trailing icon', function () {
    $html = Blade::render(
        '<x-eplus-input name="password" trailing-icon="eye" />'
    );

    expect($html)
        ->toContain('pr-10')
        ->toContain('<svg')
        ->toContain('right-0');
});

test('supports livewire binding', function () {
    $html = Blade::render(
        '<x-eplus-input wire:model="email" label="Email" />'
    );

    expect($html)
        ->toContain('wire:model="email"')
        ->toContain('wire:loading.delay.class="opacity-100"')
        ->toContain('wire:dirty.class="opacity-100"');
});

test('supports livewire loading states', function () {
    $html = Blade::render(
        '<x-eplus-input wire:model="email" label="Email" wire:loading.class="opacity-50" />'
    );

    expect($html)
        ->toContain('wire:loading.class="opacity-50"')
        ->toContain('wire:loading.delay.class="opacity-100"');
});

test('supports livewire confirmation', function () {
    $html = Blade::render(
        '<x-eplus-input wire:model="email" wire:confirm="Are you sure?" />'
    );

    expect($html)
        ->toContain('x-on:keydown.enter.prevent="$wire.confirm(\'Are you sure?\')"');
}); 