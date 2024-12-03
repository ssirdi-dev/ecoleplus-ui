# Breadcrumb Component

The Breadcrumb component helps users understand their current location within a hierarchical navigation structure.

## Basic Usage

```blade
<x-eplus::breadcrumb :items="[
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Users', 'url' => '/users'],
    ['label' => 'Details']
]" />
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `items` | array | `[]` | Array of breadcrumb items |
| `separator` | string\|null | `null` | Custom separator between items (defaults to chevron icon) |

### Item Properties

Each item in the `items` array can have the following properties:

| Property | Type | Description |
|----------|------|-------------|
| `label` | string | The text to display |
| `url` | string | Optional URL for the item (omit for current page) |
| `icon` | string | Optional Heroicon component name |

## Examples

### With Icons

```blade
<x-eplus::breadcrumb :items="[
    [
        'label' => 'Home',
        'url' => '/',
        'icon' => 'heroicon-m-home'
    ],
    [
        'label' => 'Users',
        'url' => '/users',
        'icon' => 'heroicon-m-users'
    ],
    [
        'label' => 'Details',
        'icon' => 'heroicon-m-user'
    ]
]" />
```

### Custom Separator

```blade
<x-eplus::breadcrumb 
    :items="[
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Users', 'url' => '/users'],
        ['label' => 'Details']
    ]"
    separator="/"
/>
```

### Current Page (Last Item)

```blade
<x-eplus::breadcrumb :items="[
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Users', 'url' => '/users'],
    ['label' => 'John Doe'] // No URL for current page
]" />
```

## Styling

The component includes:
- Responsive design with proper spacing
- Dark mode support with appropriate text colors
- Hover states for clickable items
- Icon support with consistent sizing (h-4 w-4)
- Visual distinction for the current (last) item
- Accessible navigation structure with ARIA labels
- Customizable separators