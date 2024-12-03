@props([
    'src' => null,
    'alt' => null,
    'size' => 'md',
    'status' => null,
])

@php
$sizes = [
    'xs' => 'h-6 w-6',
    'sm' => 'h-8 w-8',
    'md' => 'h-10 w-10',
    'lg' => 'h-12 w-12',
    'xl' => 'h-14 w-14',
    '2xl' => 'h-16 w-16',
];

$statusColors = [
    'online' => 'bg-green-400',
    'offline' => 'bg-gray-400',
    'busy' => 'bg-red-400',
    'away' => 'bg-yellow-400',
];

$sizeClass = $sizes[$size] ?? $sizes['md'];
$statusClass = $statusColors[$status] ?? null;

// Get initials from alt text
$initials = $alt ? collect(explode(' ', $alt))
    ->map(fn($segment) => strtoupper(substr($segment, 0, 1)))
    ->take(2)
    ->join('') : null;
@endphp

<span class="relative inline-block">
    <div class="{{ $sizeClass }} relative">
        @if($src)
            <img
                src="{{ $src }}"
                alt="{{ $alt }}"
                class="rounded-full object-cover w-full h-full {{ $attributes->get('class') }}"
                {{ $attributes->except('class') }}
            />
        @else
            <div class="rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center w-full h-full">
                <span class="font-medium text-gray-600 dark:text-gray-300" style="font-size: {{ (int) substr($sizeClass, 2, 2) / 2.5 }}px">
                    {{ $initials }}
                </span>
            </div>
        @endif
    </div>

    @if($status)
        <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white dark:ring-gray-800 {{ $statusClass }}"></span>
    @endif
</span> 