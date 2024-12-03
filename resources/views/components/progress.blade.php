@props([
    'value' => 0,
    'max' => 100,
    'variant' => 'primary',
    'size' => 'md',
    'label' => null,
    'showValue' => false,
    'animated' => false,
])

@php
$variants = [
    'primary' => 'bg-primary-600',
    'secondary' => 'bg-gray-600',
    'success' => 'bg-green-600',
    'danger' => 'bg-red-600',
    'warning' => 'bg-yellow-600',
    'info' => 'bg-blue-600',
];

$sizes = [
    'xs' => 'h-1',
    'sm' => 'h-2',
    'md' => 'h-3',
    'lg' => 'h-4',
    'xl' => 'h-5',
];

$percentage = min(100, max(0, ($value / $max) * 100));
$sizeClass = $sizes[$size] ?? $sizes['md'];
$variantClass = $variants[$variant] ?? $variants['primary'];
@endphp

<div>
    @if($label)
        <div class="flex justify-between items-center mb-1">
            <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ $label }}</span>
            @if($showValue)
                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ $percentage }}%</span>
            @endif
        </div>
    @endif

    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 {{ $sizeClass }}">
        <div
            class="rounded-full {{ $variantClass }} {{ $sizeClass }} {{ $animated ? 'animate-[progress_1s_ease-in-out]' : '' }}"
            style="width: {{ $percentage }}%"
            role="progressbar"
            aria-valuenow="{{ $value }}"
            aria-valuemin="0"
            aria-valuemax="{{ $max }}"
        ></div>
    </div>
</div>

@once
@push('styles')
<style>
@keyframes progress {
    0% { width: 0%; }
}
</style>
@endpush
@endonce 