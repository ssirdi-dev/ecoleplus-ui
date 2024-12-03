<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('select component can be rendered', function () {
    $view = Blade::render('
        <x-eplus::select :options="[
            1 => \'Option 1\',
            2 => \'Option 2\'
        ]" />'
    );

    expect($view)
        ->toContain('Option 1')
        ->toContain('Option 2')
        ->toContain('select');
});

test('select component shows label when provided', function () {
    $view = Blade::render('
        <x-eplus::select 
            label="Select an option"
            :options="[\'1\' => \'Option 1\']"
        />'
    );

    expect($view)
        ->toContain('Select an option')
        ->toContain('label');
});

test('select component shows hint when provided', function () {
    $view = Blade::render('
        <x-eplus::select 
            hint="Choose wisely"
            :options="[\'1\' => \'Option 1\']"
        />'
    );

    expect($view)
        ->toContain('Choose wisely')
        ->toContain('text-gray-500');
});

test('select component shows error state', function () {
    $view = Blade::render('
        <x-eplus::select 
            error="This field is required"
            :options="[\'1\' => \'Option 1\']"
        />'
    );

    expect($view)
        ->toContain('This field is required')
        ->toContain('text-red-600')
        ->toContain('border-red-300');
});

test('select component shows placeholder when provided', function () {
    $view = Blade::render('
        <x-eplus::select 
            placeholder="Select..."
            :options="[\'1\' => \'Option 1\']"
        />'
    );

    expect($view)
        ->toContain('Select...')
        ->toContain('<option value="">');
});

test('select component accepts slot content', function () {
    $view = Blade::render('
        <x-eplus::select>
            <option value="1">Custom Option</option>
        </x-eplus::select>'
    );

    expect($view)
        ->toContain('Custom Option')
        ->toContain('value="1"');
});

test('select component merges attributes', function () {
    $view = Blade::render('
        <x-eplus::select 
            class="custom-class" 
            id="custom-id"
            :options="[\'1\' => \'Option 1\']"
        />'
    );

    expect($view)
        ->toContain('custom-class')
        ->toContain('custom-id');
}); 