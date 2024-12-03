<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('list group component can be rendered', function () {
    $view = Blade::render('
        <x-eplus::list-group :items="[
            [\'label\' => \'Item 1\'],
            [\'label\' => \'Item 2\'],
            [\'label\' => \'Item 3\']
        ]" />
    ');

    expect($view)
        ->toContain('Item 1')
        ->toContain('Item 2')
        ->toContain('Item 3')
        ->toContain('divide-y')
        ->toContain('rounded-lg');
});

test('list group component supports links', function () {
    $view = Blade::render('
        <x-eplus::list-group :items="[
            [\'label\' => \'Item 1\', \'url\' => \'/item-1\'],
            [\'label\' => \'Item 2\', \'url\' => \'/item-2\']
        ]" />
    ');

    expect($view)
        ->toContain('href="/item-1"')
        ->toContain('href="/item-2"');
});

test('list group component supports icons', function () {
    $view = Blade::render('
        <x-eplus::list-group :items="[
            [\'label\' => \'Item 1\', \'icon\' => \'heroicon-m-user\']
        ]" />
    ');

    expect($view)
        ->toContain('<svg')
        ->toContain('h-5 w-5');
});

test('list group component supports badges', function () {
    $view = Blade::render('
        <x-eplus::list-group :items="[
            [
                \'label\' => \'Item 1\',
                \'badge\' => [
                    \'label\' => \'New\',
                    \'variant\' => \'primary\'
                ]
            ]
        ]" />
    ');

    expect($view)
        ->toContain('New')
        ->toContain('bg-blue-100');
});

test('list group component supports descriptions', function () {
    $view = Blade::render('
        <x-eplus::list-group :items="[
            [
                \'label\' => \'Item 1\',
                \'description\' => \'Description text\'
            ]
        ]" />
    ');

    expect($view)
        ->toContain('Description text')
        ->toContain('text-gray-500');
});

test('list group component supports different variants', function () {
    $view = Blade::render('
        <x-eplus::list-group
            variant="primary"
            :items="[[\'label\' => \'Item 1\']]"
        />
    ');

    expect($view)
        ->toContain('bg-primary-50')
        ->toContain('text-primary-900');
});

test('list group component supports active items', function () {
    $view = Blade::render('
        <x-eplus::list-group :items="[
            [\'label\' => \'Item 1\', \'active\' => true]
        ]" />
    ');

    expect($view)
        ->toContain('bg-gray-50');
}); 