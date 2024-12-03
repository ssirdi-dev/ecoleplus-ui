@props([
    'items' => [],
    'variant' => 'default', // default, primary, secondary
    'divided' => true,
    'hoverable' => true,
])

@php
    $variants = [
        'default' => [
            'base' => 'bg-white dark:bg-gray-800',
            'item' => 'text-gray-900 dark:text-gray-100',
            'hover' => 'hover:bg-gray-50 dark:hover:bg-gray-700',
            'active' => 'bg-gray-50 dark:bg-gray-700',
            'divider' => 'border-gray-200 dark:border-gray-700',
        ],
        'primary' => [
            'base' => 'bg-primary-50 dark:bg-primary-900/50',
            'item' => 'text-primary-900 dark:text-primary-100',
            'hover' => 'hover:bg-primary-100 dark:hover:bg-primary-800/50',
            'active' => 'bg-primary-100 dark:bg-primary-800/50',
            'divider' => 'border-primary-200 dark:border-primary-700',
        ],
        'secondary' => [
            'base' => 'bg-gray-50 dark:bg-gray-900/50',
            'item' => 'text-gray-900 dark:text-gray-100',
            'hover' => 'hover:bg-gray-100 dark:hover:bg-gray-800/50',
            'active' => 'bg-gray-100 dark:bg-gray-800/50',
            'divider' => 'border-gray-200 dark:border-gray-700',
        ],
    ];

    $currentVariant = $variants[$variant] ?? $variants['default'];
@endphp

<div {{ 
    $attributes->merge([
        'class' => 'divide-y rounded-lg border ' . 
            $currentVariant['base'] . ' ' . 
            $currentVariant['divider']
    ]) 
}}>
    @foreach($items as $item)
        @php
            $isLink = isset($item['url']);
            $isActive = isset($item['active']) && $item['active'];
            $tag = $isLink ? 'a' : 'div';
            $itemClasses = collect([
                'flex items-center justify-between px-4 py-4',
                $currentVariant['item'],
                $hoverable ? $currentVariant['hover'] : '',
                $isActive ? $currentVariant['active'] : '',
            ])->filter()->join(' ');
        @endphp

        <{{ $tag }} 
            @if($isLink) href="{{ $item['url'] }}" @endif
            class="{{ $itemClasses }}"
        >
            <div class="flex items-center min-w-0">
                @if(isset($item['icon']))
                    <x-dynamic-component 
                        :component="$item['icon']" 
                        class="mr-3 h-5 w-5 flex-shrink-0 text-gray-400 dark:text-gray-500 {{ isset($item['iconClass']) ? $item['iconClass'] : '' }}"
                    />
                @endif

                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium truncate">
                        {{ $item['label'] }}
                    </p>
                    @if(isset($item['description']))
                        <p class="text-sm text-gray-500 dark:text-gray-400 truncate">
                            {{ $item['description'] }}
                        </p>
                    @endif
                </div>
            </div>

            @if(isset($item['badge']))
                <div class="ml-4 flex-shrink-0">
                    <x-eplus::badge
                        variant="{{ $item['badge']['variant'] ?? 'primary' }}"
                        size="sm"
                    >
                        {{ $item['badge']['label'] }}
                    </x-eplus::badge>
                </div>
            @endif
        </{{ $tag }}>
    @endforeach
</div> 