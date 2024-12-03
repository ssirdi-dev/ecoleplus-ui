@props([
    'name' => null,
    'id' => null,
    'label' => null,
    'hint' => null,
    'error' => null,
    'rows' => 3,
])

@php
    $hasError = $error !== null;
    $id = $id ?? $name;
    
    $config = config('ecoleplus-ui.components.textarea');
    $baseClasses = $config['base'];
    $errorClasses = $config['error'];
    $labelClasses = $config['label'];
    $hintClasses = $config['hint'];
@endphp

<div>
    @if($label)
        <label for="{{ $id }}" class="{{ $labelClasses }}">
            {{ $label }}
        </label>
    @endif

    <textarea
        {{ $attributes->merge([
            'id' => $id,
            'name' => $name,
            'rows' => $rows,
            'class' => $baseClasses . ($hasError ? ' ' . $errorClasses : '')
        ]) }}
    >{{ $slot }}</textarea>

    @if($hint && !$hasError)
        <p class="{{ $hintClasses }}">{{ $hint }}</p>
    @endif

    @if($hasError)
        <p class="{{ $hintClasses }} text-red-600 dark:text-red-400">{{ $error }}</p>
    @endif
</div> 