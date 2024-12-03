# Button Component

The Button component provides a consistent way to trigger actions or navigation, with support for different styles and icons.

## Basic Usage

```blade
<x-eplus::button>
    Click me
</x-eplus::button>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | string | `'button'` | HTML button type (`'button'`, `'submit'`, `'reset'`) |
| `variant` | string | `'primary'` | Visual style variant |
| `iconLeft` | string\|null | `null` | Heroicon component name for left icon |
| `iconRight` | string\|null | `null` | Heroicon component name for right icon |

### Available Variants

- `primary` - Primary action button
- `secondary` - Secondary action button
- `danger` - Destructive action button
- `warning` - Warning action button
- `info` - Informational action button

## Examples

### Different Types

```blade
<x-eplus::button type="button">Regular Button</x-eplus::button>
<x-eplus::button type="submit">Submit Form</x-eplus::button>
<x-eplus::button type="reset">Reset Form</x-eplus::button>
```

### Different Variants

```blade
<div class="space-x-2">
    <x-eplus::button variant="primary">Primary</x-eplus::button>
    <x-eplus::button variant="secondary">Secondary</x-eplus::button>
    <x-eplus::button variant="danger">Danger</x-eplus::button>
    <x-eplus::button variant="warning">Warning</x-eplus::button>
    <x-eplus::button variant="info">Info</x-eplus::button>
</div>
```

### With Icons

```blade
<x-eplus::button :iconLeft="'heroicon-m-plus'">
    Add Item
</x-eplus::button>

<x-eplus::button :iconRight="'heroicon-m-arrow-right'">
    Next Step
</x-eplus::button>

<x-eplus::button 
    :iconLeft="'heroicon-m-paper-airplane'"
    :iconRight="'heroicon-m-arrow-path'"
>
    Send Message
</x-eplus::button>
```

### Disabled State

```blade
<x-eplus::button disabled>
    Cannot Click
</x-eplus::button>
```

## Styling

The component includes:
- Multiple color variants with hover and focus states
- Consistent padding and text alignment
- Icon support with proper spacing
- Disabled state styling
- Dark mode support
- Focus ring for accessibility
- Transition effects
- Proper button type handling
