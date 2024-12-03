# Textarea Component

The Textarea component provides a styled multi-line text input with support for labels, hints, and error states.

## Basic Usage

```blade
<x-eplus::textarea
    name="description"
    label="Description"
>
    Initial content
</x-eplus::textarea>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string\|null | `null` | Input name attribute |
| `id` | string\|null | `null` | Input ID (defaults to name) |
| `label` | string\|null | `null` | Label text |
| `hint` | string\|null | `null` | Help text below the input |
| `error` | string\|null | `null` | Error message |
| `rows` | number | `3` | Number of visible text rows |

## Examples

### With Label and Hint

```blade
<x-eplus::textarea
    name="bio"
    label="Biography"
    hint="Write a short description about yourself"
    rows="4"
>
</x-eplus::textarea>
```

### With Error State

```blade
<x-eplus::textarea
    name="comments"
    label="Comments"
    error="Comments are required"
>
</x-eplus::textarea>
```

### Custom Height

```blade
<x-eplus::textarea
    name="content"
    label="Article Content"
    rows="10"
>
</x-eplus::textarea>
```

### With Placeholder

```blade
<x-eplus::textarea
    name="feedback"
    label="Feedback"
    placeholder="Tell us what you think..."
>
</x-eplus::textarea>
```

### With Livewire Integration

```blade
<x-eplus::textarea
    name="notes"
    label="Notes"
    wire:model="userNotes"
>
</x-eplus::textarea>
```

### Read-only State

```blade
<x-eplus::textarea
    name="terms"
    label="Terms and Conditions"
    readonly
>
    These are the terms and conditions...
</x-eplus::textarea>
```

## Styling

The component includes:
- Modern textarea design
- Configurable height through rows
- Error state styling
- Help text display
- Dark mode support
- Focus state styling
- Label alignment
- Proper spacing
- Accessible design
- Responsive width
- Consistent font styling 