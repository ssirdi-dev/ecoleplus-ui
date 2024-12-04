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
        ->toContain('bg-background')
        ->toContain('text-foreground')
        ->toContain('border-input');
});

test('renders input with label', function () {
    $html = Blade::render(
        '<x-eplus-input name="email" label="Email Address" />'
    );

    expect($html)
        ->toContain('Email Address')
        ->toContain('<label')
        ->toContain('for="email"')
        ->toContain('text-foreground');
});

test('renders required input', function () {
    $html = Blade::render(
        '<x-eplus-input name="email" label="Email" required />'
    );

    expect($html)
        ->toContain('required')
        ->toContain('text-destructive');
});

test('renders disabled input', function () {
    $html = Blade::render(
        '<x-eplus-input name="email" disabled />'
    );

    expect($html)
        ->toContain('disabled')
        ->toContain('disabled:opacity-50')
        ->toContain('disabled:cursor-not-allowed');
});

test('renders input with error', function () {
    $html = Blade::render(
        '<x-eplus-input name="email" error="Invalid email address" />'
    );

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('Invalid email address')
        ->toContain('text-destructive')
        ->toContain('border-destructive');
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
        ->toContain('text-muted-foreground')
        ->toContain('left-0');
});

test('renders input with trailing icon', function () {
    $html = Blade::render(
        '<x-eplus-input name="password" trailing-icon="eye" />'
    );

    expect($html)
        ->toContain('pr-10')
        ->toContain('text-muted-foreground')
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

test('renders loading indicator with proper SVG', function () {
    $html = Blade::render(
        '<x-eplus-input wire:model="email" label="Email" />'
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
        '<x-eplus-input wire:model="email" label="Email" />'
    );

    expect($html)
        ->toContain('<svg class="h-4 w-4 inline-block"')
        ->toContain('xmlns="http://www.w3.org/2000/svg"')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="currentColor"')
        ->toContain('fill-rule="evenodd"');
});

test('supports livewire confirmation', function () {
    $html = Blade::render(
        '<x-eplus-input wire:model="email" wire:confirm="Are you sure?" />'
    );
    expect($html)
        ->toContain('x-on:keydown.enter.prevent="$wire.confirm(&#039;Are you sure?&#039;)"');
}); 