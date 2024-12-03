# Badge Component

The Badge component is used to highlight and display small amounts of information, such as statuses, counts, or labels.

## Basic Usage

```blade
<x-eplus::badge>New</x-eplus::badge>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | `'primary'` | Visual style variant |
| `size` | string | `'md'` | Size of the badge |
| `rounded` | boolean | `true` | Whether to use fully rounded corners |

### Available Variants

- `primary` - Blue theme
- `secondary` - Gray theme
- `success` - Green theme
- `danger` - Red theme
- `warning` - Yellow theme
- `info` - Indigo theme

### Available Sizes

- `sm` - Small (px-2 py-0.5 text-xs)
- `md` - Medium (px-2.5 py-0.5 text-sm)
- `lg` - Large (px-3 py-1 text-base)

## Examples

### Different Variants

```blade
<div class="space-x-2">
    <x-eplus::badge variant="primary">Primary</x-eplus::badge>
    <x-eplus::badge variant="secondary">Secondary</x-eplus::badge>
    <x-eplus::badge variant="success">Success</x-eplus::badge>
    <x-eplus::badge variant="danger">Danger</x-eplus::badge>
    <x-eplus::badge variant="warning">Warning</x-eplus::badge>
    <x-eplus::badge variant="info">Info</x-eplus::badge>
</div>
```

### Different Sizes

```blade
<div class="space-x-2">
    <x-eplus::badge size="sm">Small</x-eplus::badge>
    <x-eplus::badge size="md">Medium</x-eplus::badge>
    <x-eplus::badge size="lg">Large</x-eplus::badge>
</div>
```

### Square Corners

```blade
<x-eplus::badge :rounded="false">Square Badge</x-eplus::badge>
```

### With Icons

```blade
<x-eplus::badge>
    <x-heroicon-m-check class="h-4 w-4 mr-1 inline" />
    Verified
</x-eplus::badge>
```

## Styling

The component includes:
- Multiple color variants with appropriate contrast
- Dark mode support
- Consistent padding and text sizes
- Flexible corner rounding options
- Support for icons and text
- Proper text alignment
- Responsive design
