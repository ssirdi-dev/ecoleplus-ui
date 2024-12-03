@props([
    'name' => null,
    'id' => null,
    'label' => null,
    'hint' => null,
    'error' => null,
    'icon' => null,
    'type' => 'text',
])

@php
    $hasError = $error !== null;
    $id = $id ?? $name;
    
    $config = config('ecoleplus-ui.components.input');
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

    <div class="relative">
        <input
            type="{{ $type }}"
            {{ $attributes->class([
                $baseClasses,
                $errorClasses => $hasError,
                'pl-10' => $icon
            ])->merge([
                'id' => $id,
                'name' => $name,
            ]) }}
        />

        @if($icon)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <x-dynamic-component 
                    :component="$icon" 
                    class="h-5 w-5 text-gray-400"
                />
            </div>
        @endif
    </div>

    @if($hint && !$hasError)
        <p class="{{ $hintClasses }}">{{ $hint }}</p>
    @endif

    @if($hasError)
        <p class="{{ $hintClasses }} text-red-600 dark:text-red-400">{{ $error }}</p>
    @endif
</div> 