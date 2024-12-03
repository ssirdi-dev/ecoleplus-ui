# Checkbox Component

The Checkbox component provides a styled checkbox input with support for labels, error states, and disabled states.

## Basic Usage

```blade
<x-eplus::checkbox
    name="terms"
    label="I agree to the terms and conditions"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | Input name attribute |
| `id` | string\|null | `null` | Input ID (defaults to name) |
| `label` | string\|null | `null` | Label text |
| `value` | string\|null | `null` | Input value attribute |
| `error` | string\|null | `null` | Error message |
| `checked` | boolean | `false` | Whether the checkbox is checked |
| `disabled` | boolean | `false` | Whether the checkbox is disabled |

## Examples

### Basic Checkbox

```blade
<x-eplus::checkbox
    name="newsletter"
    label="Subscribe to newsletter"
/>
```

### Checked State

```blade
<x-eplus::checkbox
    name="terms"
    label="Accept terms"
    :checked="true"
/>
```

### With Error Message

```blade
<x-eplus::checkbox
    name="privacy"
    label="Accept privacy policy"
    error="You must accept the privacy policy"
/>
```

### Disabled State

```blade
<x-eplus::checkbox
    name="feature"
    label="Premium feature"
    :disabled="true"
/>
```

### With Custom Value

```blade
<x-eplus::checkbox
    name="preferences[]"
    value="updates"
    label="Receive product updates"
/>
```

### With Livewire Integration

```blade
<x-eplus::checkbox
    name="consent"
    label="I give my consent"
    wire:model="userConsent"
/>
```

## Styling

The component includes:
- Modern checkbox design with rounded corners
- Primary color accent for checked state
- Error state with red borders and text
- Disabled state with reduced opacity
- Dark mode support
- Focus ring for accessibility
- Proper label alignment
- Consistent spacing
- Error message styling
- Cursor handling for disabled state 