<?php

namespace EcolePlus\EcolePlusUi\Tests\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    View::addNamespace('ecoleplus-ui', __DIR__ . '/../../../resources/views');
});

test('renders basic checkbox', function () {
    $html = Blade::render(
        '<x-eplus-checkbox name="terms" />'
    );

    expect($html)
        ->toContain('type="checkbox"')
        ->toContain('name="terms"')
        ->toContain('role="checkbox"')
        ->toContain('h-4 w-4 rounded border');
});

test('renders checkbox with label', function () {
    $html = Blade::render(
        '<x-eplus-checkbox name="terms" label="I agree to the terms" />'
    );

    expect($html)
        ->toContain('I agree to the terms')
        ->toContain('<label')
        ->toContain('for="terms"');
});

test('renders required checkbox', function () {
    $html = Blade::render(
        '<x-eplus-checkbox name="terms" label="I agree" required />'
    );

    expect($html)
        ->toContain('required')
        ->toContain('*</span>');
});

test('renders disabled checkbox', function () {
    $html = Blade::render(
        '<x-eplus-checkbox name="terms" disabled />'
    );

    expect($html)
        ->toContain('disabled');
});

test('renders checkbox with error', function () {
    $html = Blade::render(
        '<x-eplus-checkbox name="terms" error="You must agree to the terms" />'
    );

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('You must agree to the terms')
        ->toContain('text-destructive');
});

test('renders checkbox with description', function () {
    $html = Blade::render(
        '<x-eplus-checkbox name="terms" description="By checking this box, you agree to our terms" />'
    );

    expect($html)
        ->toContain('By checking this box, you agree to our terms')
        ->toContain('text-muted-foreground');
});

test('renders indeterminate checkbox', function () {
    $html = Blade::render(
        '<x-eplus-checkbox name="select_all" indeterminate />'
    );

    expect($html)
        ->toContain('data-indeterminate="true"')
        ->toContain('aria-checked="mixed"')
        ->toContain('x-init="init()"');
});

test('supports livewire binding', function () {
    $html = Blade::render(
        '<x-eplus-checkbox wire:model="accepted" label="Accept" />'
    );

    expect($html)
        ->toContain('wire:model="accepted"')
        ->toContain('wire:loading.delay.class="opacity-100"')
        ->toContain('wire:dirty.class="opacity-100"');
});

test('renders loading indicator with proper SVG', function () {
    $html = Blade::render(
        '<x-eplus-checkbox wire:model="accepted" label="Accept" />'
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
        '<x-eplus-checkbox wire:model="accepted" label="Accept" />'
    );

    expect($html)
        ->toContain('<svg class="h-4 w-4 inline-block"')
        ->toContain('xmlns="http://www.w3.org/2000/svg"')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="currentColor"')
        ->toContain('fill-rule="evenodd"');
}); 