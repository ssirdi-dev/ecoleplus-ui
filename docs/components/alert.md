# Alert Component

The Alert component is used to display important messages or feedback to users, with support for different types, icons, and dismissible functionality.

## Basic Usage

```blade
<x-eplus::alert>
    This is a default alert message
</x-eplus::alert>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | string | `'info'` | Alert type (`'info'`, `'success'`, `'warning'`, `'error'`) |
| `title` | string\|null | `null` | Optional title text |
| `dismissible` | boolean | `false` | Whether the alert can be dismissed |
| `icon` | string\|null | `null` | Optional custom icon component name |

## Examples

### Different Types

```blade
<x-eplus::alert type="success">
    Operation completed successfully!
</x-eplus::alert>

<x-eplus::alert type="warning">
    Please review your input.
</x-eplus::alert>

<x-eplus::alert type="error">
    An error occurred while processing your request.
</x-eplus::alert>
```

### With Title

```blade
<x-eplus::alert
    type="info"
    title="Information"
>
    Here's some important information you should know.
</x-eplus::alert>
```

### Dismissible Alert

```blade
<x-eplus::alert
    type="success"
    :dismissible="true"
>
    This alert can be dismissed.
</x-eplus::alert>
```

### Custom Icon

```blade
<x-eplus::alert
    type="info"
    :icon="'heroicon-m-information-circle'"
>
    Alert with custom icon.
</x-eplus::alert>
```

## Styling

The component includes:
- Color variants for different alert types
- Dark mode support
- Smooth transitions for dismissible alerts
- Proper icon spacing and alignment
- Accessible ARIA attributes
- Focus management for dismiss button
- Responsive design
- Proper text contrast ratios
