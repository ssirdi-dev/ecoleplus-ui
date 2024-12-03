@props([
    'name',
    'id' => null,
    'label' => null,
    'value' => null,
    'error' => null,
    'checked' => false,
    'disabled' => false,
])

@php
    $id = $id ?? $name;
    $baseClasses = 'rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700 dark:checked:border-primary-500 dark:checked:bg-primary-500 dark:focus:ring-primary-600 dark:focus:ring-offset-gray-800';
    $errorClasses = 'border-red-300 focus:border-red-300 focus:ring-red-200';
    $disabledClasses = 'opacity-50 cursor-not-allowed';
@endphp

<div class="flex items-start">
    <div class="flex items-center h-5">
        <input
            type="checkbox"
            {{ $attributes->class([
                $baseClasses,
                $errorClasses => $error,
                $disabledClasses => $disabled,
            ])->merge([
                'name' => $name,
                'id' => $id,
                'value' => $value,
                'disabled' => $disabled,
            ]) }}
            @if(!$attributes->has('wire:model')) @checked($checked) @endif
        />
    </div>

    @if($label)
        <div class="ml-3 text-sm">
            <label for="{{ $id }}" class="font-medium text-gray-700 dark:text-gray-300 {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}">
                {{ $label }}
            </label>
        </div>
    @endif
</div>

@if($error)
    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
@endif 