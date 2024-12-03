@props([
    'items' => [],
    'separator' => null,
])

<nav class="flex" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-2">
        @foreach($items as $index => $item)
            <li class="flex items-center">
                @if($index > 0)
                    <div class="flex items-center mx-2 text-gray-400 dark:text-gray-500">
                        @if($separator)
                            {{ $separator }}
                        @else
                            <x-heroicon-m-chevron-right class="h-4 w-4" />
                        @endif
                    </div>
                @endif

                @if(isset($item['url']) && $index !== count($items) - 1)
                    <a 
                        href="{{ $item['url'] }}" 
                        class="text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                    >
                        @if(isset($item['icon']))
                            <span class="inline-flex items-center">
                                <x-dynamic-component 
                                    :component="$item['icon']" 
                                    class="mr-1.5 h-4 w-4 text-gray-400"
                                />
                                {{ $item['label'] }}
                            </span>
                        @else
                            {{ $item['label'] }}
                        @endif
                    </a>
                @else
                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
                        @if(isset($item['icon']))
                            <span class="inline-flex items-center">
                                <x-dynamic-component 
                                    :component="$item['icon']" 
                                    class="mr-1.5 h-4 w-4 text-gray-400"
                                />
                                {{ $item['label'] }}
                            </span>
                        @else
                            {{ $item['label'] }}
                        @endif
                    </span>
                @endif
            </li>
        @endforeach
    </ol>
</nav> 