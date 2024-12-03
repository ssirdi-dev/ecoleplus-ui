# Radio Component

The Radio component provides a styled radio input with support for labels, error states, and disabled states.

## Basic Usage

```blade
<x-eplus::radio
    name="color"
    value="red"
    label="Red"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | Input name attribute |
| `id` | string\|null | `null` | Input ID (defaults to name_value) |
| `label` | string\|null | `null` | Label text |
| `value` | string\|null | `null` | Input value attribute |
| `error` | string\|null | `null` | Error message |
| `checked` | boolean | `false` | Whether the radio is checked |
| `disabled` | boolean | `false` | Whether the radio is disabled |

## Examples

### Radio Group

```blade
<div class="space-y-2">
    <x-eplus::radio
        name="size"
        value="small"
        label="Small"
        :checked="true"
    />
    <x-eplus::radio
        name="size"
        value="medium"
        label="Medium"
    />
    <x-eplus::radio
        name="size"
        value="large"
        label="Large"
    />
</div>
```

### With Error Message

```blade
<x-eplus::radio
    name="required_choice"
    value="option1"
    label="Required Option"
    error="Please select an option"
/>
```

### Disabled State

```blade
<x-eplus::radio
    name="unavailable"
    value="premium"
    label="Premium Option"
    :disabled="true"
/>
```

### With Livewire Integration

```blade
<div>
    <x-eplus::radio
        name="plan"
        value="basic"
        label="Basic Plan"
        wire:model="selectedPlan"
    />
    <x-eplus::radio
        name="plan"
        value="pro"
        label="Pro Plan"
        wire:model="selectedPlan"
    />
</div>
```

### Inline Layout

```blade
<div class="flex space-x-4">
    <x-eplus::radio
        name="alignment"
        value="left"
        label="Left"
    />
    <x-eplus::radio
        name="alignment"
        value="center"
        label="Center"
    />
    <x-eplus::radio
        name="alignment"
        value="right"
        label="Right"
    />
</div>
```

## Styling

The component includes:
- Modern radio design with circular shape
- Primary color accent for checked state
- Error state with red borders and text
- Disabled state with reduced opacity
- Dark mode support
- Focus ring for accessibility
- Proper label alignment
- Consistent spacing
- Error message styling
- Cursor handling for disabled state 