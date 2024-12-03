# Card Component

The Card component provides a flexible container for displaying content with optional header and footer sections.

## Basic Usage

```blade
<x-eplus::card>
    This is the card content
</x-eplus::card>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `header` | mixed | `null` | Content for the card header |
| `footer` | mixed | `null` | Content for the card footer |
| `padding` | boolean | `true` | Whether to apply padding to the content area |
| `shadow` | boolean | `true` | Whether to show a shadow effect |

## Examples

### With Header and Footer

```blade
<x-eplus::card>
    <x-slot:header>
        <h3 class="text-lg font-medium">Card Title</h3>
    </x-slot:header>

    <p>This is the main content of the card.</p>

    <x-slot:footer>
        <div class="flex justify-end">
            <x-eplus::button>Action</x-eplus::button>
        </div>
    </x-slot:footer>
</x-eplus::card>
```

### Without Padding

```blade
<x-eplus::card :padding="false">
    <img src="image.jpg" alt="Full width image" class="rounded-t-lg">
    <div class="p-4">
        <p>Content with custom padding</p>
    </div>
</x-eplus::card>
```

### Without Shadow

```blade
<x-eplus::card :shadow="false">
    Flat card without shadow
</x-eplus::card>
```

### Complex Header

```blade
<x-eplus::card>
    <x-slot:header>
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-medium">Users</h3>
            <x-eplus::button size="sm">Add User</x-eplus::button>
        </div>
    </x-slot:header>

    <div class="divide-y">
        <div class="py-3">User 1</div>
        <div class="py-3">User 2</div>
        <div class="py-3">User 3</div>
    </div>
</x-eplus::card>
```

## Styling

The component includes:
- Clean, modern design with rounded corners
- Optional shadow effect
- Responsive padding
- Dark mode support
- Border styling
- Header and footer with distinct backgrounds
- Proper text colors in all sections
- Flexible content areas
