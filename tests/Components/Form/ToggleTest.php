<?php

namespace EcolePlus\EcolePlusUi\Tests\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    View::addNamespace('ecoleplus-ui', __DIR__ . '/../../../resources/views');
});

test('renders basic toggle', function () {
    $html = Blade::render(
        '<x-eplus-toggle name="notifications" />'
    );

    expect($html)
        ->toContain('role="switch"')
        ->toContain('type="button"')
        ->toContain('aria-checked="false"')
        ->toContain('data-state="unchecked"')
        ->toContain('h-6 w-10')
        ->toContain('rounded-full');
});

test('renders toggle with label', function () {
    $html = Blade::render(
        '<x-eplus-toggle name="notifications" label="Enable notifications" />'
    );

    expect($html)
        ->toContain('Enable notifications')
        ->toContain('<label')
        ->toContain('for="notifications"');
});

test('renders required toggle', function () {
    $html = Blade::render(
        '<x-eplus-toggle name="notifications" label="Enable notifications" required />'
    );

    expect($html)
        ->toContain('required')
        ->toContain('*</span>');
});

test('renders disabled toggle', function () {
    $html = Blade::render(
        '<x-eplus-toggle name="notifications" disabled />'
    );

    expect($html)
        ->toContain('disabled');
});

test('renders toggle with error', function () {
    $html = Blade::render(
        '<x-eplus-toggle name="notifications" error="This field is required" />'
    );

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('This field is required')
        ->toContain('text-destructive');
});

test('renders toggle with description', function () {
    $html = Blade::render(
        '<x-eplus-toggle name="notifications" description="You will receive notifications for important updates" />'
    );

    expect($html)
        ->toContain('You will receive notifications for important updates')
        ->toContain('text-muted-foreground');
});

test('renders small toggle', function () {
    $html = Blade::render(
        '<x-eplus-toggle name="notifications" size="sm" />'
    );

    expect($html)
        ->toContain('h-4 w-7')
        ->toContain('h-3 w-3');
});

test('renders large toggle', function () {
    $html = Blade::render(
        '<x-eplus-toggle name="notifications" size="lg" />'
    );
    expect($html)
        ->toContain('h-7 w-12')
        ->toContain('h-6 w-6');
});

test('supports livewire binding', function () {
    $html = Blade::render(
        '<x-eplus-toggle wire:model="notifications" label="Enable notifications" />'
    );

    expect($html)
        ->toContain('wire:model="notifications"')
        ->toContain('wire:loading.delay.class="opacity-100"')
        ->toContain('wire:dirty.class="opacity-100"');
});

test('renders loading indicator with proper SVG', function () {
    $html = Blade::render(
        '<x-eplus-toggle wire:model="notifications" label="Enable notifications" />'
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
        '<x-eplus-toggle wire:model="notifications" label="Enable notifications" />'
    );

    expect($html)
        ->toContain('<svg class="h-4 w-4 inline-block"')
        ->toContain('xmlns="http://www.w3.org/2000/svg"')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="currentColor"')
        ->toContain('fill-rule="evenodd"');
});

test('has hidden checkbox for form submission', function () {
    $html = Blade::render(
        '<x-eplus-toggle name="notifications" />'
    );

    expect($html)
        ->toContain('<input')
        ->toContain('type="checkbox"')
        ->toContain('name="notifications"')
        ->toContain('class="sr-only"');
}); 