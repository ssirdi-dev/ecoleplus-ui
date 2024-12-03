@props([
    'name',
    'id' => null,
    'label' => null,
    'description' => null,
    'value' => '1',
    'error' => null,
    'checked' => false,
    'disabled' => false,
    'size' => 'md',
])

@php
    $id = $id ?? $name;
    $sizes = [
        'sm' => [
            'switch' => 'h-4 w-7',
            'button' => 'h-3 w-3',
            'translate' => 'translate-x-3',
            'label' => 'text-sm',
            'description' => 'text-xs',
        ],
        'md' => [
            'switch' => 'h-6 w-11',
            'button' => 'h-5 w-5',
            'translate' => 'translate-x-5',
            'label' => 'text-base',
            'description' => 'text-sm',
        ],
        'lg' => [
            'switch' => 'h-8 w-14',
            'button' => 'h-7 w-7',
            'translate' => 'translate-x-6',
            'label' => 'text-lg',
            'description' => 'text-base',
        ],
    ];
    $currentSize = $sizes[$size] ?? $sizes['md'];
@endphp

<div x-data="{ checked: {{ $checked ? 'true' : 'false' }} }">
    <input
        type="checkbox"
        {{ $attributes->except(['class', 'wire:model'])->merge([
            'name' => $name,
            'id' => $id,
            'value' => $value,
            'disabled' => $disabled,
            'class' => 'sr-only',
        ]) }}
        :checked="checked"
        @change="checked = $event.target.checked"
        x-ref="input"
    />

    <div class="flex items-start">
        <button
            type="button"
            role="switch"
            :aria-checked="checked"
            @click="if (!@js($disabled)) { checked = !checked }"
            :class="[
                'relative inline-flex shrink-0 {{ $currentSize['switch'] }} rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800',
                @js($disabled) ? 'cursor-not-allowed opacity-50' : 'cursor-pointer',
                @js($error) ? 'bg-red-500' : null,
                { 'bg-primary-600': checked, 'bg-gray-200 dark:bg-gray-700': !checked }
            ]"
        >
            <span
                :class="[
                    'pointer-events-none relative inline-block {{ $currentSize['button'] }} transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out',
                    checked && '{{ $currentSize['translate'] }}'
                ]"
            >
                <span
                    class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                    :class="checked ? 'opacity-0 duration-100 ease-out' : 'opacity-100 duration-200 ease-in'"
                >
                    <x-heroicon-m-x-mark class="h-3 w-3 text-gray-400 dark:text-gray-400" />
                </span>
                <span
                    class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                    :class="checked ? 'opacity-100 duration-200 ease-in' : 'opacity-0 duration-100 ease-out'"
                >
                    <x-heroicon-m-check class="h-3 w-3 text-primary-600" />
                </span>
            </span>
        </button>

        @if($label || $description)
            <div class="ml-3">
                @if($label)
                    <label for="{{ $id }}" class="{{ $currentSize['label'] }} font-medium text-gray-700 dark:text-gray-300 {{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}">
                        {{ $label }}
                    </label>
                @endif

                @if($description)
                    <p class="{{ $currentSize['description'] }} text-gray-500 dark:text-gray-400">
                        {{ $description }}
                    </p>
                @endif
            </div>
        @endif
    </div>

    @if($error)
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
    @endif
</div> 