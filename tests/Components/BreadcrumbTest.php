<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('breadcrumb component can be rendered', function () {
    $view = Blade::render('
        <x-eplus::breadcrumb :items="[
            [\'label\' => \'Home\', \'url\' => \'/\'],
            [\'label\' => \'Users\', \'url\' => \'/users\'],
            [\'label\' => \'Details\']
        ]" />
    ');

    expect($view)
        ->toContain('Home')
        ->toContain('Users')
        ->toContain('Details')
        ->toContain('href="/"')
        ->toContain('href="/users"')
        ->toContain('role="list"')
        ->toContain('aria-label="Breadcrumb"');
});

test('breadcrumb component supports icons', function () {
    $view = Blade::render('
        <x-eplus::breadcrumb :items="[
            [\'label\' => \'Home\', \'url\' => \'/\', \'icon\' => \'heroicon-m-home\'],
            [\'label\' => \'Users\']
        ]" />
    ');

    expect($view)
        ->toContain('<svg')
        ->toContain('mr-1.5');
});

test('breadcrumb component supports custom separator', function () {
    $view = Blade::render('
        <x-eplus::breadcrumb 
            :items="[
                [\'label\' => \'Home\', \'url\' => \'/\'],
                [\'label\' => \'Users\']
            ]"
            separator="/"
        />
    ');
    /** @var \Pest\Expectation|\Pest\Support\Extendable $expect */
    $expect = expect($view)
        ->toContain('/');
    $expect->not->toContain('heroicon-m-chevron-right');
});

test('breadcrumb component styles last item differently', function () {
    $view = Blade::render('
        <x-eplus::breadcrumb :items="[
            [\'label\' => \'Home\', \'url\' => \'/\'],
            [\'label\' => \'Current\']
        ]" />
    ');

    expect($view)
        ->toContain('text-gray-500')
        ->toContain('text-gray-900');
}); 