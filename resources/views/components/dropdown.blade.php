@props([
    'align' => 'right',
    'width' => '48',
    'contentClasses' => 'py-1 bg-white dark:bg-gray-700',
])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'left-0';
        break;
    case 'right':
    default:
        $alignmentClasses = 'right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
    case '96':
        $width = 'w-96';
        break;
}
@endphp

<div class="relative" x-data="{ open: false }">
    <div @click="open = !open" x-ref="trigger">
        {{ $trigger }}
    </div>

    <div 
        x-show="open" 
        x-anchor.bottom-start.offset.5="$refs.trigger"
        @click.away="open = false"
        @keydown.escape.window="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute z-50 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
        style="display: none;"
        @click="open = false"
    >
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div> 