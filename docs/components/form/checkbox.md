# Checkbox

A control that allows the user to toggle between checked and unchecked states.

## Usage

```blade
<x-eplus-checkbox 
    name="terms" 
    label="I agree to the terms and conditions"
    description="By checking this box, you agree to our Terms of Service and Privacy Policy"
/>
```

## Examples

### Basic Checkbox
```blade
<x-eplus-checkbox name="terms" />
```

### With Label
```blade
<x-eplus-checkbox 
    name="terms" 
    label="I agree to the terms" 
/>
```

### Required
```blade
<x-eplus-checkbox 
    name="terms" 
    label="I agree to the terms" 
    required 
/>
```

### With Description
```blade
<x-eplus-checkbox 
    name="terms" 
    label="I agree to the terms" 
    description="By checking this box, you agree to our Terms of Service" 
/>
```

### With Error
```blade
<x-eplus-checkbox 
    name="terms" 
    label="I agree to the terms" 
    error="You must agree to the terms" 
/>
```

### Disabled
```blade
<x-eplus-checkbox 
    name="terms" 
    label="I agree to the terms" 
    disabled 
/>
```

### Indeterminate State
```blade
<x-eplus-checkbox 
    name="select_all" 
    label="Select All" 
    indeterminate 
/>
```

### With Livewire
```blade
<x-eplus-checkbox 
    wire:model="accepted" 
    label="Accept terms" 
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | null | The name attribute of the checkbox |
| `id` | string | null | The ID of the checkbox. If not provided, will use the name or a random string |
| `label` | string | null | The label text |
| `description` | string | null | Additional descriptive text |
| `required` | boolean | false | Whether the checkbox is required |
| `disabled` | boolean | false | Whether the checkbox is disabled |
| `readonly` | boolean | false | Whether the checkbox is readonly |
| `indeterminate` | boolean | false | Whether the checkbox is in an indeterminate state |
| `error` | string | null | Error message to display |

## Styling

The checkbox uses semantic color tokens for consistent theming:

- `border-input` for the border color
- `ring-offset-background` for the focus ring offset
- `ring-ring` for the focus ring
- `bg-primary` and `text-primary-foreground` for the checked state
- `border-destructive` and `ring-destructive` for error states

## Accessibility

The checkbox component follows WAI-ARIA guidelines:

- Uses native `<input type="checkbox">` element
- Properly associates labels using `for` attribute
- Supports keyboard navigation
- Includes proper ARIA attributes for error states and descriptions
- Handles indeterminate state with `aria-checked="mixed"`

## Livewire Integration

The checkbox component fully supports Livewire:

- Works with `wire:model` and `wire:model.live`
- Shows loading indicator during requests
- Shows dirty state indicator
- Maintains state across re-renders 