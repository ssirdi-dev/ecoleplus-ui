# Icon

A flexible icon component with built-in support for Heroicons and extensibility for other icon libraries.

## Usage

```blade
<x-eplus-icon name="o-check" />
```

## Examples

### Basic Icons
```blade
<!-- Outline variant (default) -->
<x-eplus-icon name="o-check" />

<!-- Solid variant -->
<x-eplus-icon name="s-check" />
```

### Using Full Heroicon Names
```blade
<x-eplus-icon name="heroicon-o-check" />
<x-eplus-icon name="heroicon-s-check" />
```

### Custom Styling
```blade
<x-eplus-icon 
    name="o-check" 
    class="w-6 h-6 text-success"
/>
```

### With Other Icon Libraries
```blade
<x-eplus-icon 
    name="fa-check" 
    type="fontawesome"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | The icon name (e.g., 'o-check', 's-check', 'heroicon-o-check') |
| `type` | string | 'heroicon' | The icon library type |

## Icon Name Prefixes

When using Heroicons:
- `o-` prefix for outline variant (e.g., `o-check`)
- `s-` prefix for solid variant (e.g., `s-check`)
- Full name also supported (e.g., `heroicon-o-check`)

## Default Styling

The icon component comes with sensible defaults:

- Default size: `h-5 w-5`
- Proper vertical alignment
- Inherits current text color
- Maintains aspect ratio

## Accessibility

The icon component follows accessibility best practices:

- Includes `aria-hidden="true"` by default
- Should be accompanied by proper labels when used in interactive elements
- Maintains proper contrast ratios

## Extending

To use other icon libraries:

1. Set up the icon library in your application
2. Pass the library name in the `type` prop
3. Use the appropriate icon name format for that library

Example with Font Awesome:
```blade
<!-- In your layout -->
<link rel="stylesheet" href="path/to/fontawesome.css">

<!-- In your component -->
<x-eplus-icon 
    name="fa-solid fa-check" 
    type="fontawesome"
/>
```

## Best Practices

1. Use semantic icon names that match their purpose
2. Provide proper labels for interactive elements
3. Maintain consistent sizing within your application
4. Consider using outline variants for UI elements and solid variants for emphasis
5. Use appropriate color contrast for accessibility 