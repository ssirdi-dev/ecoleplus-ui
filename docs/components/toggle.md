# Toggle Component

The Toggle component provides a styled switch input with support for labels, descriptions, sizes, and error states. It includes animated icons for on/off states and uses Alpine.js for interactivity.

## Basic Usage

```blade
<x-eplus::toggle
    name="notifications"
    label="Enable Notifications"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | Input name attribute |
| `id` | string\|null | `null` | Input ID (defaults to name) |
| `label` | string\|null | `null` | Label text |
| `description` | string\|null | `null` | Description text below label |
| `value` | string | `'1'` | Input value when checked |
| `error` | string\|null | `null` | Error message |
| `checked` | boolean | `false` | Whether the toggle is checked |
| `disabled` | boolean | `false` | Whether the toggle is disabled |
| `size` | string | `'md'` | Size of the toggle ('sm', 'md', 'lg') |

## Examples

### With Label and Description

```blade
<x-eplus::toggle
    name="darkMode"
    label="Dark Mode"
    description="Enable dark mode for better viewing at night"
/>
```

### Different Sizes

```blade
<div class="space-y-4">
    <x-eplus::toggle
        name="small"
        label="Small Toggle"
        size="sm"
    />
    
    <x-eplus::toggle
        name="medium"
        label="Medium Toggle"
        size="md"
    />
    
    <x-eplus::toggle
        name="large"
        label="Large Toggle"
        size="lg"
    />
</div>
```

### With Error State

```blade
<x-eplus::toggle
    name="terms"
    label="Accept Terms"
    error="You must accept the terms"
/>
```

### Disabled State

```blade
<x-eplus::toggle
    name="premium"
    label="Premium Feature"
    description="Available for premium users only"
    :disabled="true"
/>
```

### With Livewire Integration

```blade
<x-eplus::toggle
    name="status"
    label="Active Status"
    wire:model="isActive"
/>
```

### Pre-checked State

```blade
<x-eplus::toggle
    name="newsletter"
    label="Subscribe to Newsletter"
    :checked="true"
/>
```

## Styling

The component includes:
- Modern switch design with smooth transitions
- Three size variants (sm, md, lg)
- Animated icons for on/off states
- Error state styling with red background
- Disabled state with reduced opacity
- Dark mode support
- Focus ring styling
- Label and description text styling
- Proper spacing and alignment
- Accessible design with ARIA attributes
- Interactive hover and focus states
- Customizable through Tailwind classes 