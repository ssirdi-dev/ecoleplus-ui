@props([
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'prefix' => null,
    'suffix' => null,
    'rows' => 3,
    'multiple' => false,
    'dragAndDrop' => false,
    'autoResize' => false,
    'maxChars' => null,
])

<div class="{{ $wrapperClasses() }}">
    @if($prefix)
        <div class="{{ $prefixClasses() }}">
            {{ $prefix }}
        </div>
    @endif

    @if($type === 'textarea')
        <div class="relative">
            <textarea
                {{ $attributes->merge(['class' => $classes()]) }}
                rows="{{ $rows }}"
                placeholder="{{ $placeholder }}"
                @if($maxChars)
                    maxlength="{{ $maxChars }}"
                @endif
                @if($autoResize)
                    x-data="{ resize: function(el) { el.style.height = '0px'; el.style.height = el.scrollHeight + 'px' } }"
                    x-init="resize($el)"
                    @input="resize($el)"
                @endif
            >{{ $value }}</textarea>
            
            @if($maxChars)
                <div class="{{ $charCountClasses() }}" x-data="{ count: 0 }" x-init="count = $el.previousElementSibling.value.length">
                    <span x-text="count"></span>/<span>{{ $maxChars }}</span>
                </div>
            @endif
        </div>
    @elseif($type === 'file')
        @if($dragAndDrop)
            <div class="{{ $dragZoneClasses() }}"
                x-data="{ 
                    files: [],
                    dragging: false,
                    handleDrop(e) {
                        e.preventDefault();
                        this.dragging = false;
                        this.handleFiles(e.dataTransfer.files);
                    },
                    handleFiles(fileList) {
                        if (!$el.querySelector('input').multiple && fileList.length > 1) {
                            fileList = [fileList[0]];
                        }
                        this.files = Array.from(fileList);
                        const input = $el.querySelector('input');
                        const dataTransfer = new DataTransfer();
                        this.files.forEach(file => dataTransfer.items.add(file));
                        input.files = dataTransfer.files;
                        input.dispatchEvent(new Event('change'));
                    }
                }"
                @dragover.prevent="dragging = true"
                @dragleave.prevent="dragging = false"
                @drop="handleDrop"
                :class="{ 'border-primary-500': dragging }"
            >
                <input
                    type="file"
                    {{ $attributes->merge(['class' => $classes()]) }}
                    @if($multiple) multiple @endif
                />
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="mt-1 text-sm text-gray-600">
                        <span>Drop files here or click to upload</span>
                        @if($multiple)
                            <span class="text-xs">(multiple files allowed)</span>
                        @endif
                    </p>
                </div>
                <template x-if="files.length > 0">
                    <ul class="mt-4 divide-y divide-gray-200">
                        <template x-for="file in files" :key="file.name">
                            <li class="py-2 flex items-center justify-between">
                                <div class="flex items-center">
                                    <span x-text="file.name" class="text-sm text-gray-700"></span>
                                    <span x-text="(file.size/1024/1024).toFixed(2) + 'MB'" class="ml-2 text-xs text-gray-500"></span>
                                </div>
                                <button type="button" @click="files = files.filter(f => f !== file)" class="text-red-600 hover:text-red-900">
                                    <span class="sr-only">Remove file</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                        </li>
                        </template>
                    </ul>
                </template>
            </div>
        @else
            <input
                type="file"
                {{ $attributes->merge(['class' => $classes()]) }}
                @if($multiple) multiple @endif
            />
        @endif
    @else
        <input
            type="{{ $type }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => $classes()]) }}
        />
    @endif

    @if($suffix)
        <div class="{{ $suffixClasses() }}">
            {{ $suffix }}
        </div>
    @endif
</div>
