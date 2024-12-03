@props([
    'title' => null,
    'description' => null,
    'noDivider' => false
])

<div {{ 
    $attributes->merge([
        'class' => 'px-4 py-5 sm:p-6' . 
            (!$noDivider ? ' border-b border-gray-200 dark:border-gray-700' : '')
    ]) 
}}>
    @if($title)
        <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">
            {{ $title }}
        </h3>
    @endif

    @if($description)
        <div class="mt-2 max-w-xl text-sm text-gray-500 dark:text-gray-400">
            <p>{{ $description }}</p>
        </div>
    @endif

    <div class="{{ ($title || $description) ? 'mt-5' : '' }} text-gray-900 dark:text-gray-100">
        {{ $slot }}
    </div>
</div> 