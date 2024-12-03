@props([
    'type' => 'info',
    'title' => null,
    'dismissible' => false,
    'icon' => null,
])

@php
$variants = [
    'info' => [
        'base' => 'bg-blue-50 dark:bg-blue-900/50',
        'icon' => 'text-blue-400 dark:text-blue-300',
        'title' => 'text-blue-800 dark:text-blue-200',
        'text' => 'text-blue-700 dark:text-blue-200',
        'button' => 'bg-blue-50 dark:bg-blue-900/50 text-blue-500 dark:text-blue-300 hover:bg-blue-100 dark:hover:bg-blue-900 focus:ring-blue-600 dark:focus:ring-blue-500',
        'default-icon' => 'heroicon-o-information-circle'
    ],
    'success' => [
        'base' => 'bg-green-50 dark:bg-green-900/50',
        'icon' => 'text-green-400 dark:text-green-300',
        'title' => 'text-green-800 dark:text-green-200',
        'text' => 'text-green-700 dark:text-green-200',
        'button' => 'bg-green-50 dark:bg-green-900/50 text-green-500 dark:text-green-300 hover:bg-green-100 dark:hover:bg-green-900 focus:ring-green-600 dark:focus:ring-green-500',
        'default-icon' => 'heroicon-o-check-circle'
    ],
    'warning' => [
        'base' => 'bg-yellow-50 dark:bg-yellow-900/50',
        'icon' => 'text-yellow-400 dark:text-yellow-300',
        'title' => 'text-yellow-800 dark:text-yellow-200',
        'text' => 'text-yellow-700 dark:text-yellow-200',
        'button' => 'bg-yellow-50 dark:bg-yellow-900/50 text-yellow-500 dark:text-yellow-300 hover:bg-yellow-100 dark:hover:bg-yellow-900 focus:ring-yellow-600 dark:focus:ring-yellow-500',
        'default-icon' => 'heroicon-o-exclamation-triangle'
    ],
    'error' => [
        'base' => 'bg-red-50 dark:bg-red-900/50',
        'icon' => 'text-red-400 dark:text-red-300',
        'title' => 'text-red-800 dark:text-red-200',
        'text' => 'text-red-700 dark:text-red-200',
        'button' => 'bg-red-50 dark:bg-red-900/50 text-red-500 dark:text-red-300 hover:bg-red-100 dark:hover:bg-red-900 focus:ring-red-600 dark:focus:ring-red-500',
        'default-icon' => 'heroicon-o-x-circle'
    ],
];

$variant = $variants[$type] ?? $variants['info'];
$iconComponent = $icon ?? $variant['default-icon'];
@endphp

<div 
    x-data="{ show: true }" 
    x-show="show" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-1"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    {{ $attributes->merge(['class' => "rounded-lg p-4 {$variant['base']}"]) }}
    role="alert"
    aria-live="polite"
>
    <div class="flex">
        <div class="flex-shrink-0">
            @if(str_starts_with($iconComponent, 'heroicon-'))
                <x-dynamic-component 
                    :component="$iconComponent" 
                    class="h-5 w-5 {{ $variant['icon'] }}"
                    aria-hidden="true"
                />
            @else
                {!! $iconComponent !!}
            @endif
        </div>

        <div class="ml-3 w-full">
            @if($title)
                <h3 class="text-sm font-medium {{ $variant['title'] }}">
                    {{ $title }}
                </h3>
            @endif

            <div class="text-sm {{ $variant['text'] }} {{ $title ? 'mt-2' : '' }}">
                {{ $slot }}
            </div>
        </div>

        @if($dismissible)
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button 
                        type="button" 
                        @click="show = false"
                        class="inline-flex rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $variant['button'] }}"
                        aria-label="{{ __('Dismiss') }}"
                    >
                        <x-heroicon-o-x-mark class="h-5 w-5" aria-hidden="true"/>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div> 