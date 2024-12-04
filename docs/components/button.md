# Button

A button component with support for multiple variants, sizes, and icons.

## Usage

```blade
<x-eplus-button 
    variant="primary" 
    label="Click me"
    icon="o-arrow-right"
/>
```

## Examples

### Basic Button
```blade
<x-eplus-button label="Click me" />
```

### Button Variants
```blade
<x-eplus-button variant="primary" label="Primary" />
<x-eplus-button variant="secondary" label="Secondary" />
<x-eplus-button variant="danger" label="Danger" />
<x-eplus-button variant="success" label="Success" />
<x-eplus-button variant="warning" label="Warning" />
<x-eplus-button variant="info" label="Info" />
<x-eplus-button variant="dark" label="Dark" />
<x-eplus-button variant="outline" label="Outline" />
<x-eplus-button variant="ghost" label="Ghost" />
<x-eplus-button variant="link" label="Link" />
```

### Button Sizes
```blade
<x-eplus-button size="sm" label="Small" />
<x-eplus-button size="default" label="Default" />
<x-eplus-button size="lg" label="Large" />
<x-eplus-button size="icon" icon="o-plus" />
```

### With Icons
```blade
<!-- Left icon (default) -->
<x-eplus-button 
    label="Add Item" 
    icon="o-plus" 
/>

<!-- Right icon -->
<x-eplus-button 
    label="Next" 
    icon="o-arrow-right" 
    icon-position="right" 
/>

<!-- Icon only -->
<x-eplus-button 
    size="icon"
    icon="o-plus"
    description="Add new item"
/>
```

### With Livewire Actions
```blade
<x-eplus-button 
    wire:click="save"
    label="Save Changes"
/>

<!-- With loading state -->
<x-eplus-button 
    wire:click="save"
    wire:loading.attr="disabled"
    label="Save Changes"
>
    <x-slot:loading>
        Saving...
    </x-slot:loading>
</x-eplus-button>

<!-- With confirmation -->
<x-eplus-button 
    wire:click="delete"
    wire:confirm="Are you sure you want to delete this item?"
    variant="danger"
    label="Delete"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | 'primary' | Button style variant (primary, secondary, danger, success, warning, info, dark, outline, ghost, link) |
| `size` | string | 'default' | Button size (default, sm, lg, icon) |
| `label` | string | null | The button text |
| `icon` | string | null | The icon name (e.g., 'o-plus' for heroicon outline plus) |
| `iconType` | string | 'heroicon' | The icon library type |
| `iconPosition` | string | 'left' | Position of the icon (left, right) |
| `iconClass` | string | 'w-5 h-5' | CSS classes for the icon |
| `description` | string | null | ARIA description for the button |
| `pressed` | boolean | false | Whether the button is in a pressed state |
| `expanded` | boolean | false | Whether the button controls an expanded element |
| `controls` | string | null | ID of the element this button controls |
| `labelledby` | string | null | ID of the element that labels this button |

## Styling

The button uses semantic color tokens for consistent theming:

- Uses variant-specific colors (primary, secondary, etc.)
- Consistent hover and focus states
- Proper disabled styling
- Dark mode support

## Accessibility

The button component follows WAI-ARIA guidelines:

- Uses native `<button>` element
- Supports keyboard navigation
- Includes proper ARIA attributes (pressed, expanded, controls)
- Provides description for icon-only buttons
- Maintains focus states

## Livewire Integration

The button component fully supports Livewire:

- Works with `wire:click` and other wire directives
- Supports loading states
- Handles confirmation dialogs
- Maintains state during requests 