# Dropdown Component

The Dropdown component provides a toggleable menu that can contain links, buttons, or any other content.

## Basic Usage

```blade
<x-eplus::dropdown>
    <x-slot:trigger>
        <x-eplus::button>
            Open Menu
        </x-eplus::button>
    </x-slot:trigger>

    <x-slot:content>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
            Profile
        </a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
            Settings
        </a>
    </x-slot:content>
</x-eplus::dropdown>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `align` | string | `'right'` | Alignment of the dropdown (`'left'`, `'right'`) |
| `width` | string | `'48'` | Width of the dropdown (`'48'`, `'96'`) |
| `contentClasses` | string | `'py-1 bg-white dark:bg-gray-700'` | Additional classes for the content wrapper |

## Examples

### Left Alignment

```blade
<x-eplus::dropdown align="left">
    <x-slot:trigger>
        <x-eplus::button>Menu</x-eplus::button>
    </x-slot:trigger>

    <x-slot:content>
        <div class="px-4 py-3">
            <p class="text-sm">Signed in as</p>
            <p class="text-sm font-medium">example@email.com</p>
        </div>
    </x-slot:content>
</x-eplus::dropdown>
```

### Wide Dropdown

```blade
<x-eplus::dropdown width="96">
    <x-slot:trigger>
        <x-eplus::button>Wide Menu</x-eplus::button>
    </x-slot:trigger>

    <x-slot:content>
        <div class="grid grid-cols-2 gap-4 p-4">
            <div>
                <h3 class="text-sm font-medium">User</h3>
                <ul class="mt-2 space-y-2">
                    <li>Profile</li>
                    <li>Settings</li>
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-medium">Account</h3>
                <ul class="mt-2 space-y-2">
                    <li>Billing</li>
                    <li>Security</li>
                </ul>
            </div>
        </div>
    </x-slot:content>
</x-eplus::dropdown>
```

### Custom Content Classes

```blade
<x-eplus::dropdown contentClasses="py-2 bg-gray-50 dark:bg-gray-800">
    <x-slot:trigger>
        <x-eplus::button>Custom Style</x-eplus::button>
    </x-slot:trigger>

    <x-slot:content>
        <div class="px-4 py-2">Custom styled content</div>
    </x-slot:content>
</x-eplus::dropdown>
```

## Styling

The component includes:
- Alpine.js integration for interactivity
- Smooth transitions and animations
- Dark mode support
- Responsive positioning
- Click away detection
- Keyboard support (Escape to close)
- Shadow and border styling
- Z-index management
- Flexible content area
