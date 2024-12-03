# Form Components

EcolePlus UI provides a set of form components that are styled with Tailwind CSS and follow accessibility best practices.

## Livewire Support

All form components support Livewire's `wire:model` directive out of the box. You can use any of the `wire:model` variants:

```blade
<x-eplus::input wire:model="name" />
<x-eplus::checkbox wire:model="terms" />
<x-eplus::radio wire:model="color" value="red" />
<x-eplus::toggle wire:model="notifications" />
```

The components also support Livewire's real-time validation with error states:

```blade
<x-eplus::input
    wire:model.live="email"
    :error="$errors->first('email')"
/>
```

### Checkbox Groups

When using checkboxes in a group with array values:

```blade
<x-eplus::checkbox
    name="permissions[]"
    value="create"
    wire:model="selectedPermissions"
    label="Create"
/>
<x-eplus::checkbox
    name="permissions[]"
    value="edit"
    wire:model="selectedPermissions"
    label="Edit"
/>
```

### Radio Groups

When using radio buttons in a group:

```blade
<x-eplus::radio
    name="color"
    value="red"
    wire:model="selectedColor"
    label="Red"
/>
<x-eplus::radio
    name="color"
    value="blue"
    wire:model="selectedColor"
    label="Blue"
/>
```

### Toggle with Livewire

The toggle component supports two-way binding with Livewire:

```blade
<x-eplus::toggle
    wire:model.live="notifications"
    label="Enable notifications"
    description="Receive email notifications"
/>
```

### Available wire:model Modifiers

All components support these Livewire modifiers:

- `wire:model` - Updates on change/input
- `wire:model.live` - Real-time updates
- `wire:model.blur` - Updates on blur
- `wire:model.debounce.Xms` - Debounced updates

## Checkbox

The checkbox component provides a styled checkbox input with support for labels, error states, and dark mode.

```blade
<x-eplus::checkbox
    name="terms"
    label="I agree to the terms"
    value="1"
    :checked="true"
    :disabled="false"
    error="You must accept the terms"
/>
```

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | The name attribute for the checkbox input |
| `id` | string | `null` | The ID attribute for the checkbox input. Defaults to the name if not provided |
| `label` | string | `null` | The label text to display next to the checkbox |
| `value` | string | `null` | The value attribute for the checkbox input |
| `error` | string | `null` | Error message to display below the checkbox |
| `checked` | boolean | `false` | Whether the checkbox is checked |
| `disabled` | boolean | `false` | Whether the checkbox is disabled |

## Radio

The radio component provides a styled radio input with support for labels, error states, and dark mode.

```blade
<x-eplus::radio
    name="color"
    value="red"
    label="Red"
    :checked="true"
    :disabled="false"
    error="Please select a color"
/>
```

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | The name attribute for the radio input |
| `id` | string | `null` | The ID attribute for the radio input. Defaults to `name_value` if not provided |
| `label` | string | `null` | The label text to display next to the radio |
| `value` | string | required | The value attribute for the radio input |
| `error` | string | `null` | Error message to display below the radio |
| `checked` | boolean | `false` | Whether the radio is checked |
| `disabled` | boolean | `false` | Whether the radio is disabled |

## Toggle

The toggle component provides a modern switch/toggle input with support for labels, descriptions, error states, and dark mode.

```blade
<x-eplus::toggle
    name="notifications"
    label="Enable notifications"
    description="Receive email notifications when someone mentions you"
    :checked="true"
    :disabled="false"
    size="md"
    error="This field is required"
/>
```

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | The name attribute for the toggle input |
| `id` | string | `null` | The ID attribute for the toggle input. Defaults to the name if not provided |
| `label` | string | `null` | The label text to display next to the toggle |
| `description` | string | `null` | Additional descriptive text to display below the label |
| `value` | string | `'1'` | The value attribute for the toggle input |
| `error` | string | `null` | Error message to display below the toggle |
| `checked` | boolean | `false` | Whether the toggle is checked |
| `disabled` | boolean | `false` | Whether the toggle is disabled |
| `size` | string | `'md'` | Size of the toggle. One of: `'sm'`, `'md'`, `'lg'` |

### Sizes

The toggle component supports three sizes:

- `sm`: Small (h-4 w-7)
- `md`: Medium (h-6 w-11)
- `lg`: Large (h-8 w-14)

### Dark Mode

All form components support dark mode out of the box. They will automatically adapt their styles when the parent element or `html` tag has the `dark` class.

### Accessibility

All form components are built with accessibility in mind:

- Proper `aria` attributes
- Keyboard navigation support
- Focus states
- Label associations
- Error message announcements

### TypeScript Support

Type definitions are available for all form components:

```typescript
import type { CheckboxProps, RadioProps, ToggleProps } from '@ecoleplus/ui';

// Example usage
const checkbox: CheckboxProps = {
    name: 'terms',
    label: 'I agree to the terms',
    checked: true
};

const radio: RadioProps = {
    name: 'color',
    value: 'red',
    label: 'Red'
};

const toggle: ToggleProps = {
    name: 'notifications',
    label: 'Enable notifications',
    size: 'md'
};
``` 