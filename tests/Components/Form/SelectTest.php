<?php

namespace EcolePlus\EcolePlusUi\Tests\Components\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

test('renders basic select structure', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" />'
    );

    expect($html)
        ->toContain('form-control w-full')
        ->toContain('relative mt-2 form-select')
        ->toContain('flex h-10 w-full items-center justify-between rounded-md border border-input')
        ->toContain('role="combobox"')
        ->toContain('name="country"')
        ->toContain('aria-haspopup="listbox"');
});

test('renders select with label', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" label="Select Country" />'
    );
  
    expect(string_trim($html))
        ->toContain('text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70')
        ->toContain('for="')
        ->toContain('> Select Country <');
});

test('renders required select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" label="Country" required />'
    );

    expect($html)
        ->toContain('required')
        ->toContain('<span class="text-destructive" aria-hidden="true">*</span>');
});

test('renders disabled select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" disabled />'
    );

    expect($html)
        ->toContain('disabled')
        ->toContain('disabled:cursor-not-allowed disabled:opacity-50');
});

test('renders select with error', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" error="Please select a country" />'
    );

    expect($html)
        ->toContain('border-destructive ring-destructive')
        ->toContain('text-sm font-medium text-destructive mt-2')
        ->toContain('Please select a country')
        ->toContain('aria-invalid="true"');
});

test('renders select with hint', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" hint="Choose your country" />'
    );

    expect($html)
        ->toContain('text-sm text-muted-foreground mt-2')
        ->toContain('Choose your country');
});

test('renders select with leading icon', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" leading-icon="globe-alt" />'
    );

    expect($html)
        ->toContain('absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none')
        ->toContain('h-4 w-4 text-muted-foreground');
});

test('renders listbox with proper styling', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" />'
    );

    expect($html)
        ->toContain('absolute z-50 mt-1 max-h-60 w-full overflow-auto rounded-md bg-popover text-popover-foreground border border-border shadow-md outline-none');
});

test('renders options with proper styling and behavior', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" :options="[\'us\' => \'United States\']" />'
    );
    expect($html)
        ->toContain('relative flex w-full cursor-default select-none items-center rounded-sm py-1.5')
        ->toContain('data-value="us"')
        ->toContain('x-on:click="select($el)"')
        ->toContain('x-on:keydown.enter.space.prevent="select($el)"')
        ->toContain('tabindex="0"');
});

test('includes required alpine.js directives', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" />'
    );

    expect($html)
        ->toContain('x-data')
        ->toContain('x-on:keydown.escape.prevent.stop="onEscape()"')
        ->toContain('x-on:click.away="onClickAway($event)"')
        ->toContain('x-show="open"')
        ->toContain('x-transition:enter="transition ease-out duration-100"')
        ->toContain('x-transition:leave="transition ease-in duration-75"');
});

test('supports livewire binding and states', function () {
    $html = Blade::render(
        '<x-eplus-select label="Country" name="country" wire:model="country" />',
        ['country' => 'us']
    );
    expect($html)
        ->toContain('wire:loading.delay.class="opacity-100"')
        ->toContain('wire:loading.delay.class.remove="opacity-0"')
        ->toContain('wire:dirty.class="opacity-100"')
        ->toContain('wire:dirty.class.remove="opacity-0"')
        ->toContain('wire:model="country"');
});

test('renders searchable select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" searchable />'
    );

    expect($html)
        ->toContain('type="text"')
        ->toContain('x-model="search"')
        ->toContain('x-ref="search"')
        ->toContain('x-on:focus="open = true"')
        ->toContain('autocomplete="off"');
});

test('renders clearable select', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" clearable />'
    );

    expect($html)
        ->toContain('x-show="selected"')
        ->toContain('x-on:click="clear"')
        ->toContain('absolute inset-y-0 right-9 flex items-center pr-2');
});

test('renders multiple select', function () {
    $html = Blade::render(
        '<x-eplus-select name="countries[]" multiple />'
    );
    expect($html)
        ->toContain('name="countries[]"')
        ->toContain(':aria-multiselectable="multiple.toString()"')
        ->toContain('multiple: true');
});

test('renders option groups correctly', function () {
    $html = Blade::render(
        '<x-eplus-select name="timezone" :options="[
            \'North America\' => [
                [\'value\' => \'ny\', \'label\' => \'New York\'],
                [\'value\' => \'la\', \'label\' => \'Los Angeles\']
            ]
        ]" />'
    );

    expect($html)
        ->toContain('role="group"')
        ->toContain('aria-label="North America"')
        ->toContain('text-sm font-semibold py-1.5 px-2 text-muted-foreground')
        ->toContain('data-value="ny"')
        ->toContain('data-value="la"');
});

test('handles empty state', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" :options="[]" empty-message="No countries available" />'
    );

    expect($html)
        ->toContain('p-2 text-sm text-center text-muted-foreground')
        ->toContain('No countries available');
});

test('handles loading state', function () {
    $html = Blade::render(
        '<x-eplus-select name="country" loading-message="Loading countries..." />'
    );

    expect($html)
        ->toContain('x-show="loading"')
        ->toContain('Loading countries...');
}); 