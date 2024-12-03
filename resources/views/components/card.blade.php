@props([
    'header' => null,
    'footer' => null,
    'padding' => true,
    'shadow' => true,
])

<div {{ 
    $attributes->merge([
        'class' => 'bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700' . 
            ($shadow ? ' shadow-sm dark:shadow-gray-900/20' : '')
    ]) 
}}>
    @if($header)
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">
            {{ $header }}
        </div>
    @endif

    <div class="{{ $padding ? 'p-4 sm:p-6' : '' }} text-gray-900 dark:text-gray-100">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="px-4 py-4 sm:px-6 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 text-gray-900 dark:text-gray-100">
            {{ $footer }}
        </div>
    @endif
</div> 