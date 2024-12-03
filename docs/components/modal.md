# Modal Component

A flexible and accessible modal dialog component that supports multiple sizes, dark mode, keyboard navigation, and proper focus management.

## Features

- 🎯 Multiple sizes (sm, md, lg, xl, 2xl)
- 🌙 Dark mode support out of the box
- ⌨️ Keyboard navigation (Escape to close)
- 🖱️ Click outside to dismiss
- 🎭 Smooth transitions and animations
- ♿ ARIA compliant and accessible
- 📱 Responsive design
- 🔝 Automatically portals to body
- 🔍 Focus trap support
- 🎨 Highly customizable through config

## Installation

This component is part of the EcolePlus UI library. Make sure you have installed and configured the library first:

```bash
composer require amsaid/ecoleplus-ui
```

## Basic Usage

```blade
<!-- Trigger -->
<x-eplus::button @click="$dispatch('open-modal', 'my-modal')">
    Open Modal
</x-eplus::button>

<!-- Modal -->
<x-eplus::modal name="my-modal" title="Modal Title">
    <p>Modal content goes here.</p>

    <x-slot:footer>
        <div class="flex justify-end space-x-3">
            <x-eplus::button 
                variant="secondary" 
                @click="$dispatch('close-modal', 'my-modal')"
            >
                Cancel
            </x-eplus::button>
            <x-eplus::button variant="primary">
                Confirm
            </x-eplus::button>
        </div>
    </x-slot:footer>
</x-eplus::modal>
```

## Props

| Name | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | Unique identifier for the modal |
| `title` | string | null | Optional title shown in the header |
| `maxWidth` | string | '2xl' | Maximum width ('sm', 'md', 'lg', 'xl', '2xl') |
| `show` | boolean | false | Initial visibility state |

## Slots

| Name | Description |
|------|-------------|
| default | Main content of the modal |
| `title` | Custom title content (alternative to title prop) |
| `footer` | Optional footer content |

## Events

| Name | Description |
|------|-------------|
| `open-modal` | Opens the modal when dispatched with the modal's name |
| `close-modal` | Closes the modal when dispatched with the modal's name |

## Examples

### Confirmation Dialog

```blade
<x-eplus::modal name="confirm-delete" maxWidth="sm">
    <div class="sm:flex sm:items-start">
        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 dark:bg-red-900 sm:mx-0 sm:h-10 sm:w-10">
            <x-heroicon-o-exclamation-triangle class="h-6 w-6 text-red-600 dark:text-red-400" />
        </div>
        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Delete Item
            </h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Are you sure you want to delete this item? This action cannot be undone.
                </p>
            </div>
        </div>
    </div>

    <x-slot:footer>
        <div class="flex justify-end space-x-3">
            <x-eplus::button 
                variant="secondary" 
                @click="$dispatch('close-modal', 'confirm-delete')"
            >
                Cancel
            </x-eplus::button>
            <x-eplus::button variant="danger">
                Delete
            </x-eplus::button>
        </div>
    </x-slot:footer>
</x-eplus::modal>
```

### Form Modal

```blade
<x-eplus::modal name="create-item" title="Create Item">
    <form class="space-y-4">
        <x-eplus::input
            name="name"
            label="Name"
            required
        />

        <x-eplus::textarea
            name="description"
            label="Description"
            rows="3"
        />

        <x-eplus::select
            name="category"
            label="Category"
            :options="$categories"
        />
    </form>

    <x-slot:footer>
        <div class="flex justify-end space-x-3">
            <x-eplus::button 
                variant="secondary" 
                @click="$dispatch('close-modal', 'create-item')"
            >
                Cancel
            </x-eplus::button>
            <x-eplus::button variant="primary">
                Create
            </x-eplus::button>
        </div>
    </x-slot:footer>
</x-eplus::modal>
```

## Customization

### Through Config

You can customize the modal's default styles in your `config/ecoleplus-ui.php`:

```php
'components' => [
    'modal' => [
        'base' => 'relative bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl',
        'overlay' => 'fixed inset-0 bg-gray-500 dark:bg-gray-900 bg-opacity-75',
        'title' => 'text-lg font-medium text-gray-900 dark:text-gray-100',
        'content' => 'px-6 py-4',
        'footer' => 'px-6 py-4 bg-gray-100 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700',
    ],
],
```

### Through Classes

You can customize individual instances using standard Blade component class merging:

```blade
<x-eplus::modal 
    name="custom-modal" 
    class="my-custom-modal"
    contentClass="my-custom-content"
    footerClass="my-custom-footer"
>
    <!-- Content -->
</x-eplus::modal>
```

## Accessibility

The modal component follows WAI-ARIA guidelines for dialogs:

- Uses proper `role="dialog"` and `aria-modal="true"`
- Manages focus when opened/closed
- Traps focus within the modal
- Supports keyboard navigation
- Provides proper ARIA labels
- Handles screen reader announcements

## JavaScript Events

For advanced usage, you can listen to modal events:

```js
// Open modal
$dispatch('open-modal', 'modal-name')

// Close modal
$dispatch('close-modal', 'modal-name')

// Listen for modal events
window.addEventListener('modal-opened', (e) => {
    console.log('Modal opened:', e.detail)
})

window.addEventListener('modal-closed', (e) => {
    console.log('Modal closed:', e.detail)
})
```

## Best Practices

1. Always provide a way to close the modal (close button or cancel action)
2. Use appropriate sizes for different content types
3. Keep modals focused on a single task or piece of content
4. Provide clear feedback for actions
5. Use proper heading hierarchy within modals
6. Consider mobile viewports when designing modal content
7. Use appropriate variants for different actions (danger, success, etc.)

## Related Components

- [Dialog](dialog.md) - For simpler dialog boxes
- [SlideOver](slideover.md) - For side panel interactions
- [Drawer](drawer.md) - For mobile-first side panels 