# Input

A form input component with support for various types, icons, and states.

## Usage

```blade
<x-eplus-input 
    type="email"
    name="email"
    label="Email Address"
    placeholder="Enter your email"
/>
```

## Examples

### Basic Input
```blade
<x-eplus-input name="username" />
```

### With Label and Placeholder
```blade
<x-eplus-input 
    name="email" 
    label="Email Address"
    placeholder="name@example.com"
/>
```

### Input Types
```blade
<!-- Text input (default) -->
<x-eplus-input type="text" name="name" />

<!-- Email input -->
<x-eplus-input type="email" name="email" />

<!-- Password input -->
<x-eplus-input type="password" name="password" />

<!-- Number input -->
<x-eplus-input type="number" name="age" />

<!-- Search input -->
<x-eplus-input 
    type="search" 
    name="search"
    leading-icon="magnifying-glass"
/>
```

### With Icons
```blade
<!-- Leading icon -->
<x-eplus-input 
    name="email"
    leading-icon="envelope"
/>

<!-- Trailing icon -->
<x-eplus-input 
    type="password"
    name="password"
    trailing-icon="eye"
/>

<!-- Both icons -->
<x-eplus-input 
    name="search"
    leading-icon="magnifying-glass"
    trailing-icon="x-mark"
/>
```

### With Hint Text
```blade
<x-eplus-input 
    type="password"
    name="password"
    label="Password"
    hint="Must be at least 8 characters long"
/>
```

### With Error
```blade
<x-eplus-input 
    name="email"
    label="Email"
    error="Please enter a valid email address"
/>
```

### Disabled State
```blade
<x-eplus-input 
    name="username"
    label="Username"
    disabled
/>
```

### Required Field
```blade
<x-eplus-input 
    name="email"
    label="Email"
    required
/>
```

### With Livewire
```blade
<!-- Basic binding -->
<x-eplus-input 
    wire:model="email" 
    name="email"
    label="Email"
/>

<!-- Lazy binding -->
<x-eplus-input 
    wire:model.lazy="email" 
    name="email"
    label="Email"
/>

<!-- Debounced binding -->
<x-eplus-input 
    wire:model.debounce.500ms="search" 
    name="search"
    label="Search"
    leading-icon="magnifying-glass"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | string | 'text' | The input type (text, email, password, etc.) |
| `name` | string | null | The name attribute of the input |
| `id` | string | null | The ID of the input. If not provided, will use the name or a random string |
| `label` | string | null | The label text |
| `placeholder` | string | null | The input placeholder text |
| `required` | boolean | false | Whether the input is required |
| `disabled` | boolean | false | Whether the input is disabled |
| `readonly` | boolean | false | Whether the input is readonly |
| `hint` | string | null | Helper text to display below the input |
| `error` | string | null | Error message to display |
| `leadingIcon` | string | null | Name of the icon to display before the input |
| `trailingIcon` | string | null | Name of the icon to display after the input |
| `iconType` | string | 'heroicon' | The icon library type |

## Styling

The input uses semantic color tokens for consistent theming:

- `border-input` for the border color
- `bg-background` for the background
- `text-foreground` for the text
- `ring-ring` for the focus ring
- `text-muted-foreground` for placeholder and icons
- `border-destructive` and `ring-destructive` for error states

## Accessibility

The input component follows WAI-ARIA guidelines:

- Associates labels using `for` attribute
- Includes proper ARIA attributes for error states
- Provides descriptive text through `aria-describedby`
- Maintains proper focus states
- Supports keyboard navigation

## Livewire Integration

The input component fully supports Livewire:

- Works with all `wire:model` modifiers (`.lazy`, `.debounce`, `.live`)
- Shows loading indicator during requests
- Shows dirty state indicator
- Maintains state across re-renders
- Supports real-time validation 