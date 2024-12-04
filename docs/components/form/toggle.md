# Toggle

A switch component that toggles between on and off states with smooth animation.

## Usage

```blade
<x-eplus-toggle 
    name="notifications"
    label="Enable notifications"
/>
```

## Examples

### Basic Toggle
```blade
<x-eplus-toggle name="darkMode" />
```

### With Label
```blade
<x-eplus-toggle 
    name="notifications" 
    label="Enable notifications"
/>
```

### Different Sizes
```blade
<!-- Small -->
<x-eplus-toggle 
    name="toggle1" 
    size="sm"
    label="Small toggle"
/>

<!-- Default -->
<x-eplus-toggle 
    name="toggle2" 
    label="Default toggle"
/>

<!-- Large -->
<x-eplus-toggle 
    name="toggle3" 
    size="lg"
    label="Large toggle"
/>
```

### With Description
```blade
<x-eplus-toggle 
    name="notifications"
    label="Enable notifications"
    description="You will receive notifications for important updates"
/>
```

### With Error
```blade
<x-eplus-toggle 
    name="terms"
    label="Accept terms"
    error="You must accept the terms"
/>
```

### Disabled State
```blade
<x-eplus-toggle 
    name="feature"
    label="Beta feature"
    disabled
/>
```

### Required Field
```blade
<x-eplus-toggle 
    name="terms"
    label="Accept terms"
    required
/>
```

### With Livewire
```blade
<!-- Basic binding -->
<x-eplus-toggle 
    wire:model="notifications"
    name="notifications"
    label="Enable notifications"
/>

<!-- With confirmation -->
<x-eplus-toggle 
    wire:model="notifications"
    wire:confirm="Are you sure you want to toggle notifications?"
    name="notifications"
    label="Enable notifications"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | null | The name attribute of the toggle |
| `id` | string | null | The ID of the toggle. If not provided, will use the name or a random string |
| `label` | string | null | The label text |
| `description` | string | null | Additional descriptive text |
| `size` | string | 'default' | The size of the toggle (sm, default, lg) |
| `required` | boolean | false | Whether the toggle is required |
| `disabled` | boolean | false | Whether the toggle is disabled |
| `readonly` | boolean | false | Whether the toggle is readonly |
| `error` | string | null | Error message to display |

## Styling

The toggle uses semantic color tokens for consistent theming:

- `border-input` for the unchecked state
- `bg-primary` and `text-primary-foreground` for the checked state
- `ring-ring` for the focus ring
- `border-destructive` and `ring-destructive` for error states

## Animation

The toggle includes smooth transitions for:

- Background color change
- Thumb movement
- Focus ring
- Opacity changes for disabled state

## Accessibility

The toggle component follows WAI-ARIA guidelines:

- Uses proper `role="switch"` attribute
- Associates labels using `for` attribute
- Supports keyboard navigation (Space and Enter)
- Provides descriptive text through `aria-describedby`
- Maintains proper focus states
- Includes proper ARIA attributes for checked state

## Livewire Integration

The toggle component fully supports Livewire:

- Works with `wire:model` and `wire:model.live`
- Shows loading indicator during requests
- Shows dirty state indicator
- Maintains state across re-renders
- Supports confirmation dialogs
- Handles real-time validation 