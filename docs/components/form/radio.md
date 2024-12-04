# Radio

A control that allows a user to select a single option from a list of predefined options.

## Usage

```blade
<x-eplus-radio 
    name="color" 
    value="red" 
    label="Red"
    description="Choose this for a vibrant red color"
/>
```

## Examples

### Basic Radio
```blade
<x-eplus-radio name="color" value="red" />
```

### Radio Group
```blade
<div class="space-y-2">
    <x-eplus-radio name="color" value="red" label="Red" />
    <x-eplus-radio name="color" value="blue" label="Blue" />
    <x-eplus-radio name="color" value="green" label="Green" />
</div>
```

### Required
```blade
<x-eplus-radio 
    name="color" 
    value="red" 
    label="Red" 
    required 
/>
```

### With Description
```blade
<x-eplus-radio 
    name="color" 
    value="red" 
    label="Red" 
    description="A vibrant red color" 
/>
```

### With Error
```blade
<x-eplus-radio 
    name="color" 
    value="red" 
    label="Red" 
    error="Please select a color" 
/>
```

### Disabled
```blade
<x-eplus-radio 
    name="color" 
    value="red" 
    label="Red" 
    disabled 
/>
```

### With Livewire
```blade
<x-eplus-radio 
    wire:model="selectedColor" 
    name="color" 
    value="red" 
    label="Red" 
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | null | The name attribute of the radio button |
| `id` | string | null | The ID of the radio button. If not provided, will use name-value or a random string |
| `value` | string | null | The value of the radio button |
| `label` | string | null | The label text |
| `description` | string | null | Additional descriptive text |
| `required` | boolean | false | Whether the radio button is required |
| `disabled` | boolean | false | Whether the radio button is disabled |
| `readonly` | boolean | false | Whether the radio button is readonly |
| `error` | string | null | Error message to display |

## Styling

The radio button uses semantic color tokens for consistent theming:

- `border-input` for the border color
- `ring-offset-background` for the focus ring offset
- `ring-ring` for the focus ring
- `bg-primary` and `text-primary-foreground` for the checked state
- `border-destructive` and `ring-destructive` for error states

## Accessibility

The radio component follows WAI-ARIA guidelines:

- Uses native `<input type="radio">` element
- Properly associates labels using `for` attribute
- Supports keyboard navigation
- Includes proper ARIA attributes for error states and descriptions
- Maintains proper focus management within radio groups

## Livewire Integration

The radio component fully supports Livewire:

- Works with `wire:model` and `wire:model.live`
- Shows loading indicator during requests
- Shows dirty state indicator
- Maintains state across re-renders 