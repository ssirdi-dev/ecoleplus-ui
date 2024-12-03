# Progress Component

The Progress component provides a visual indicator of progress or loading state with support for different styles and animations.

## Basic Usage

```blade
<x-eplus::progress :value="75" />
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `value` | number | `0` | Current progress value |
| `max` | number | `100` | Maximum progress value |
| `variant` | string | `'primary'` | Visual style variant |
| `size` | string | `'md'` | Size of the progress bar |
| `label` | string\|null | `null` | Optional label text |
| `showValue` | boolean | `false` | Show percentage value |
| `animated` | boolean | `false` | Enable animation |

### Available Variants

- `primary` (default)
- `secondary`
- `success`
- `danger`
- `warning`
- `info`

### Available Sizes

- `xs` (extra small, 0.25rem)
- `sm` (small, 0.5rem)
- `md` (medium, 0.75rem)
- `lg` (large, 1rem)
- `xl` (extra large, 1.25rem)

## Examples

### With Label and Value

```blade
<x-eplus::progress
    :value="75"
    label="Loading..."
    :showValue="true"
/>
```

### Different Variants

```blade
<x-eplus::progress
    :value="75"
    variant="success"
/>

<x-eplus::progress
    :value="75"
    variant="danger"
/>
```

### Different Sizes

```blade
<x-eplus::progress
    :value="75"
    size="xs"
/>

<x-eplus::progress
    :value="75"
    size="xl"
/>
```

### Animated Progress

```blade
<x-eplus::progress
    :value="75"
    :animated="true"
/>
```

### Custom Maximum Value

```blade
<x-eplus::progress
    :value="750"
    :max="1000"
    :showValue="true"
/>
```

## Styling

The component includes:
- Multiple color variants with appropriate contrast
- Dark mode support
- Smooth animations
- Accessible ARIA attributes
- Label and value display options
- Multiple size options
- Rounded corners
- Percentage calculation
- Background track color 