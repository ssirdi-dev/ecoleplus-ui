# Textarea

A multi-line text input component with auto-resizing capability.

## Usage

```blade
<x-eplus-textarea 
    name="message"
    label="Message"
    placeholder="Type your message here"
/>
```

## Examples

### Basic Textarea
```blade
<x-eplus-textarea name="message" />
```

### With Label and Placeholder
```blade
<x-eplus-textarea 
    name="message" 
    label="Your Message"
    placeholder="Type your message here..."
/>
```

### Auto-resizing
```blade
<x-eplus-textarea 
    name="message"
    auto-resize
/>
```

### With Custom Rows
```blade
<x-eplus-textarea 
    name="message"
    rows="5"
/>
```

### With Min/Max Rows
```blade
<x-eplus-textarea 
    name="message"
    min-rows="3"
    max-rows="10"
    auto-resize
/>
```

### With Hint Text
```blade
<x-eplus-textarea 
    name="bio"
    label="Bio"
    hint="Tell us about yourself in a few sentences"
/>
```

### With Error
```blade
<x-eplus-textarea 
    name="message"
    label="Message"
    error="Message is required"
/>
```

### Disabled State
```blade
<x-eplus-textarea 
    name="message"
    label="Message"
    disabled
/>
```

### Required Field
```blade
<x-eplus-textarea 
    name="message"
    label="Message"
    required
/>
```

### With Livewire
```blade
<!-- Basic binding -->
<x-eplus-textarea 
    wire:model="message" 
    name="message"
    label="Message"
/>

<!-- Lazy binding -->
<x-eplus-textarea 
    wire:model.lazy="message" 
    name="message"
    label="Message"
/>

<!-- With confirmation -->
<x-eplus-textarea 
    wire:model="message"
    wire:confirm="Are you sure you want to update the message?"
    name="message"
    label="Message"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | null | The name attribute of the textarea |
| `id` | string | null | The ID of the textarea. If not provided, will use the name or a random string |
| `label` | string | null | The label text |
| `placeholder` | string | null | The textarea placeholder text |
| `rows` | integer | null | The number of visible text lines |
| `minRows` | integer | null | The minimum number of rows when auto-resizing |
| `maxRows` | integer | null | The maximum number of rows when auto-resizing |
| `autoResize` | boolean | false | Whether the textarea should automatically resize based on content |
| `required` | boolean | false | Whether the textarea is required |
| `disabled` | boolean | false | Whether the textarea is disabled |
| `readonly` | boolean | false | Whether the textarea is readonly |
| `hint` | string | null | Helper text to display below the textarea |
| `error` | string | null | Error message to display |

## Styling

The textarea uses semantic color tokens for consistent theming:

- `border-input` for the border color
- `bg-background` for the background
- `text-foreground` for the text
- `ring-ring` for the focus ring
- `text-muted-foreground` for placeholder
- `border-destructive` and `ring-destructive` for error states

## Accessibility

The textarea component follows WAI-ARIA guidelines:

- Associates labels using `for` attribute
- Includes proper ARIA attributes for error states
- Provides descriptive text through `aria-describedby`
- Maintains proper focus states
- Supports keyboard navigation

## Auto-resize Behavior

When `auto-resize` is enabled:

1. The textarea automatically adjusts its height based on content
2. Respects `min-rows` and `max-rows` if provided
3. Maintains smooth transitions during resizing
4. Preserves scroll position during editing

## Livewire Integration

The textarea component fully supports Livewire:

- Works with all `wire:model` modifiers (`.lazy`, `.debounce`, `.live`)
- Shows loading indicator during requests
- Shows dirty state indicator
- Maintains state across re-renders
- Supports real-time validation
- Handles confirmation dialogs 