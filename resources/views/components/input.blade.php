@props([
    'type' => 'text',
    'label' => null,
    'error' => null,
    'prefix' => null,
    'suffix' => null,
])

@php
    $baseClasses = config('ecoleplus-ui.defaults.input.base', '');
    $hasError = !empty($error);
    $inputClasses = $hasError 
        ? "$baseClasses border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500" 
        : $baseClasses;
@endphp

<div>
    @if($label)
        <label class="{{ $labelClasses() }}">
            {{ $label }}
        </label>
    @endif

    <div class="{{ $containerClasses() }}">
        @if($prefix)
            <div class="{{ $leftAddonClasses() }}">
                <span class="text-gray-500 sm:text-sm">{{ $prefix }}</span>
            </div>
        @endif

        <input 
            type="{{ $type }}"
            {{ $attributes->merge(['class' => $inputClasses]) }}
            @class([
                'pl-7' => $prefix,
                'pr-7' => $suffix,
            ])
        >

        @if($suffix)
            <div class="{{ $rightAddonClasses() }}">
                <span class="text-gray-500 sm:text-sm">{{ $suffix }}</span>
            </div>
        @endif
    </div>

    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>
