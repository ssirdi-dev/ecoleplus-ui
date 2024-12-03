@props([
    'name',
    'id' => null,
    'label' => null,
    'hint' => null,
    'error' => null,
    'accept' => null,
    'multiple' => false,
    'maxSize' => null, // in MB
    'preview' => true,
    'progress' => false,
])

@php
    $id = $id ?? $name;
    $hasError = $error !== null;
    $baseClasses = 'relative block w-full rounded-lg border-2 border-dashed p-12 text-center focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer transition-colors duration-200 ease-in-out';
    $defaultClasses = 'border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500';
    $errorClasses = 'border-red-300 dark:border-red-600 hover:border-red-400 dark:hover:border-red-500';
    $dragClasses = 'border-primary-300 dark:border-primary-600';
@endphp

<div
    x-data="{ 
        dragging: false,
        files: [],
        progress: 0,
        maxBytes: {{ $maxSize ? $maxSize . ' * 1024 * 1024' : 'null' }},
        handleDrop(e) {
            if (e.dataTransfer.files.length) {
                this.handleFiles(e.dataTransfer.files);
            }
            this.dragging = false;
        },
        handleFiles(fileList) {
            @if(!$multiple)
                this.files = Array.from(fileList).slice(0, 1);
            @else
                this.files = Array.from(fileList);
            @endif

            if (this.maxBytes) {
                this.files = this.files.filter(file => file.size <= this.maxBytes);
            }

            this.$refs.input.files = this.createFileList(this.files);
            this.$refs.input.dispatchEvent(new Event('change'));
        },
        createFileList(files) {
            const dt = new DataTransfer();
            files.forEach(file => dt.items.add(file));
            return dt.files;
        },
        formatSize(bytes) {
            const units = ['B', 'KB', 'MB', 'GB'];
            let size = bytes;
            let unit = 0;
            
            while (size >= 1024 && unit < units.length - 1) {
                size /= 1024;
                unit++;
            }
            
            return `${Math.round(size * 100) / 100} ${units[unit]}`;
        },
        removeFile(index) {
            this.files.splice(index, 1);
            this.$refs.input.files = this.createFileList(this.files);
            this.$refs.input.dispatchEvent(new Event('change'));
        }
    }"
    x-on:dragover.prevent="dragging = true"
    x-on:dragleave.prevent="dragging = false"
    x-on:drop.prevent="handleDrop($event)"
>
    @if($label)
        <label for="{{ $id }}" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
            {{ $label }}
        </label>
    @endif

    <div class="space-y-2">
        <label
            for="{{ $id }}"
            :class="[
                @js($baseClasses),
                dragging ? @js($dragClasses) : (@js($hasError) ? @js($errorClasses) : @js($defaultClasses))
            ]"
        >
            <input
                type="file"
                id="{{ $id }}"
                name="{{ $name }}"
                @if($accept) accept="{{ $accept }}" @endif
                @if($multiple) multiple @endif
                class="sr-only"
                x-ref="input"
                @change="handleFiles($event.target.files)"
                {{ $attributes }}
            />

            <div class="space-y-2">
                <div class="flex justify-center">
                    <x-heroicon-o-cloud-arrow-up class="h-10 w-10 text-gray-400 dark:text-gray-500" />
                </div>
                <div class="flex flex-col space-y-1 text-sm text-gray-500 dark:text-gray-400">
                    <span>
                        <span class="font-medium text-primary-600 dark:text-primary-500">Click to upload</span>
                        or drag and drop
                    </span>
                    @if($accept)
                        <span>{{ $accept }}</span>
                    @endif
                    @if($maxSize)
                        <span>Max file size: {{ $maxSize }}MB</span>
                    @endif
                </div>
            </div>
        </label>

        @if($preview)
            <template x-if="files.length > 0">
                <ul class="mt-4 divide-y divide-gray-200 dark:divide-gray-700 rounded-lg border border-gray-200 dark:border-gray-700">
                    <template x-for="(file, index) in files" :key="index">
                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                            <div class="flex w-0 flex-1 items-center">
                                <x-heroicon-m-document class="h-5 w-5 flex-shrink-0 text-gray-400" />
                                <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                    <span class="truncate font-medium" x-text="file.name"></span>
                                    <span class="flex-shrink-0 text-gray-400" x-text="formatSize(file.size)"></span>
                                </div>
                            </div>
                            <div class="ml-4 flex flex-shrink-0 space-x-2">
                                <button
                                    type="button"
                                    class="rounded text-gray-400 hover:text-gray-500 dark:hover:text-gray-300"
                                    @click="removeFile(index)"
                                >
                                    <span class="sr-only">Remove file</span>
                                    <x-heroicon-m-x-mark class="h-5 w-5" />
                                </button>
                            </div>
                        </li>
                    </template>
                </ul>
            </template>
        @endif

        @if($progress)
            <div
                x-show="progress > 0"
                class="mt-4"
            >
                <x-eplus::progress
                    :value="0"
                    x-bind:value="progress"
                    size="sm"
                />
            </div>
        @endif
    </div>

    @if($hint && !$hasError)
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $hint }}</p>
    @endif

    @if($error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
    @endif
</div> 