# Avatar Component

The Avatar component displays a user's profile picture or their initials as a fallback, with optional status indicators.

## Basic Usage

```blade
<x-eplus::avatar
    src="https://example.com/avatar.jpg"
    alt="John Doe"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | string\|null | `null` | URL of the avatar image |
| `alt` | string\|null | `null` | Alt text and source for initials fallback |
| `size` | string | `'md'` | Size of the avatar (`'xs'`, `'sm'`, `'md'`, `'lg'`, `'xl'`, `'2xl'`) |
| `status` | string\|null | `null` | Status indicator (`'online'`, `'offline'`, `'busy'`, `'away'`) |

### Size Values

| Size | Dimensions |
|------|------------|
| `xs` | 24px (h-6) |
| `sm` | 32px (h-8) |
| `md` | 40px (h-10) |
| `lg` | 48px (h-12) |
| `xl` | 56px (h-14) |
| `2xl` | 64px (h-16) |

## Examples

### Image Avatar

```blade
<x-eplus::avatar
    src="https://example.com/avatar.jpg"
    alt="John Doe"
    size="lg"
/>
```

### Initials Fallback

```blade
<x-eplus::avatar
    alt="John Doe"
    size="md"
/>
```

### With Status Indicator

```blade
<x-eplus::avatar
    src="https://example.com/avatar.jpg"
    alt="John Doe"
    status="online"
/>
```

### Different Sizes

```blade
<div class="space-x-4">
    <x-eplus::avatar alt="XS User" size="xs" />
    <x-eplus::avatar alt="SM User" size="sm" />
    <x-eplus::avatar alt="MD User" size="md" />
    <x-eplus::avatar alt="LG User" size="lg" />
    <x-eplus::avatar alt="XL User" size="xl" />
    <x-eplus::avatar alt="2XL User" size="2xl" />
</div>
```

### All Status Types

```blade
<div class="space-x-4">
    <x-eplus::avatar alt="Online" status="online" />
    <x-eplus::avatar alt="Offline" status="offline" />
    <x-eplus::avatar alt="Busy" status="busy" />
    <x-eplus::avatar alt="Away" status="away" />
</div>
```

## Styling

The component includes:
- Responsive circular design
- Dark mode support
- Automatic initials generation from alt text
- Proper image object fitting
- Status indicator with appropriate colors
- Ring around status indicator
- Responsive font sizing for initials
- Accessible alt text support
