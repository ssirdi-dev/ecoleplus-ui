# List Group Component

The List Group component is a versatile component for displaying lists of items with support for icons, badges, descriptions, and various styles.

## Basic Usage

```blade
<x-eplus::list-group :items="[
    ['label' => 'Item 1'],
    ['label' => 'Item 2'],
    ['label' => 'Item 3']
]" />
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `items` | array | `[]` | Array of list items |
| `variant` | string | `'default'` | Visual style (`'default'`, `'primary'`, `'secondary'`) |
| `divided` | boolean | `true` | Show dividers between items |
| `hoverable` | boolean | `true` | Enable hover effects |

### Item Properties

Each item in the `items` array can have the following properties:

| Property | Type | Description |
|----------|------|-------------|
| `label` | string | The text to display |
| `url` | string | Optional URL to make the item clickable |
| `icon` | string | Optional Heroicon component name |
| `iconClass` | string | Optional additional classes for the icon |
| `description` | string | Optional secondary text |
| `badge` | array | Optional badge configuration |
| `active` | boolean | Whether the item is active |

## Examples

### With Icons and URLs

```blade
<x-eplus::list-group :items="[
    [
        'label' => 'Profile',
        'url' => '/profile',
        'icon' => 'heroicon-m-user'
    ],
    [
        'label' => 'Settings',
        'url' => '/settings',
        'icon' => 'heroicon-m-cog'
    ]
]" />
```

### With Descriptions and Badges

```blade
<x-eplus::list-group :items="[
    [
        'label' => 'New Message',
        'description' => 'You have a new message from John',
        'badge' => [
            'label' => 'New',
            'variant' => 'primary'
        ]
    ]
]" />
```

### Different Variants

```blade
<x-eplus::list-group
    variant="primary"
    :items="[
        ['label' => 'Primary Item 1'],
        ['label' => 'Primary Item 2']
    ]"
/>
```

### Active Items

```blade
<x-eplus::list-group :items="[
    [
        'label' => 'Active Item',
        'active' => true
    ],
    [
        'label' => 'Regular Item'
    ]
]" />
```

## Styling

The component includes:
- Multiple color variants (default, primary, secondary)
- Dark mode support
- Hover states
- Active item states
- Divider lines between items
- Support for icons with proper alignment
- Badge integration
- Responsive text truncation
- Description text in muted colors