<?php

namespace EcolePlus\EcolePlusUi\Tests\Components;

use EcolePlus\EcolePlusUi\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('file upload component can be rendered', function () {
    $view = Blade::render('<x-eplus::file-upload name="file" />');

    expect($view)
        ->toContain('type="file"')
        ->toContain('name="file"')
        ->toContain('Click to upload')
        ->toContain('drag and drop')
        ->toContain('x-data');
});

test('file upload component shows label when provided', function () {
    $view = Blade::render('
        <x-eplus::file-upload
            name="file"
            label="Upload Document"
        />
    ');

    expect($view)
        ->toContain('Upload Document')
        ->toContain('text-gray-700');
});

test('file upload component shows hint when provided', function () {
    $view = Blade::render('
        <x-eplus::file-upload
            name="file"
            hint="Max file size: 10MB"
        />
    ');

    expect($view)
        ->toContain('Max file size: 10MB')
        ->toContain('text-gray-500');
});

test('file upload component shows error state', function () {
    $view = Blade::render('
        <x-eplus::file-upload
            name="file"
            error="The file is required"
        />
    ');

    expect($view)
        ->toContain('The file is required')
        ->toContain('text-red-600')
        ->toContain('border-red-300');
});

test('file upload component supports multiple files', function () {
    $view = Blade::render('
        <x-eplus::file-upload
            name="files[]"
            :multiple="true"
        />
    ');

    expect($view)
        ->toContain('multiple');
});

test('file upload component supports file type restrictions', function () {
    $view = Blade::render('
        <x-eplus::file-upload
            name="file"
            accept=".pdf,.doc,.docx"
        />
    ');

    expect($view)
        ->toContain('accept=".pdf,.doc,.docx"')
        ->toContain('.pdf,.doc,.docx');
});

test('file upload component supports max file size', function () {
    $view = Blade::render('
        <x-eplus::file-upload
            name="file"
            :maxSize="5"
        />
    ');

    expect($view)
        ->toContain('Max file size: 5MB')
        ->toContain('maxBytes: 5 * 1024 * 1024');
});

test('file upload component supports progress indicator', function () {
    $view = Blade::render('
        <x-eplus::file-upload
            name="file"
            :progress="true"
        />
    ');

    expect($view)
        ->toContain('x-show="progress > 0"')
        ->toContain('style="width: 0%"')
        ->toContain('role="progressbar"');
});

test('file upload component supports preview', function () {
    $view = Blade::render('
        <x-eplus::file-upload
            name="file"
            :preview="true"
        />
    ');

    expect($view)
        ->toContain('x-if="files.length > 0"')
        ->toContain('x-text="file.name"')
        ->toContain('x-text="formatSize(file.size)"');
}); 