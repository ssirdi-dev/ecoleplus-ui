# Select

A combobox component with support for single and multiple selection, search, and custom options.

## Usage

```blade
<x-eplus-select 
    name="country"
    label="Country"
    :options="[
        ['value' => 'us', 'label' => 'United States'],
        ['value' => 'uk', 'label' => 'United Kingdom'],
        ['value' => 'ca', 'label' => 'Canada'],
    ]"
/>
```

## Examples

### Basic Select
```blade
<x-eplus-select 
    name="color"
    :options="[
        ['value' => 'red', 'label' => 'Red'],
        ['value' => 'blue', 'label' => 'Blue'],
        ['value' => 'green', 'label' => 'Green'],
    ]"
/>
```

### With Label and Placeholder
```blade
<x-eplus-select 
    name="country"
    label="Select a Country"
    placeholder="Choose a country..."
    :options="$countries"
/>
```

### Multiple Selection
```blade
<x-eplus-select 
    name="skills"
    label="Skills"
    multiple
    :options="$skills"
/>
```

### Searchable
```blade
<x-eplus-select 
    name="country"
    label="Country"
    searchable
    :options="$countries"
/>
```

### With Leading Icon
```blade
<x-eplus-select 
    name="country"
    label="Country"
    leading-icon="globe"
    :options="$countries"
/>
```

### Clearable
```blade
<x-eplus-select 
    name="country"
    label="Country"
    clearable
    :options="$countries"
/>
```

### With Option Groups
```blade
<x-eplus-select 
    name="timezone"
    label="Timezone"
    :options="[
        [
            'label' => 'North America',
            'options' => [
                ['value' => 'america/new_york', 'label' => 'New York'],
                ['value' => 'america/chicago', 'label' => 'Chicago'],
            ]
        ],
        [
            'label' => 'Europe',
            'options' => [
                ['value' => 'europe/london', 'label' => 'London'],
                ['value' => 'europe/paris', 'label' => 'Paris'],
            ]
        ]
    ]"
/>
```

### With Error
```blade
<x-eplus-select 
    name="country"
    label="Country"
    error="Please select a country"
    :options="$countries"
/>
```

### Disabled State
```blade
<x-eplus-select 
    name="country"
    label="Country"
    disabled
    :options="$countries"
/>
```

### Required Field
```blade
<x-eplus-select 
    name="country"
    label="Country"
    required
    :options="$countries"
/>
```

### With Livewire
```blade
<!-- Basic binding -->
<x-eplus-select 
    wire:model="country"
    name="country"
    label="Country"
    :options="$countries"
/>

<!-- With async search -->
<x-eplus-select 
    wire:model="country"
    wire:search="searchCountries"
    name="country"
    label="Country"
    searchable
    :options="$filteredCountries"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | null | The name attribute of the select |
| `id` | string | null | The ID of the select. If not provided, will use the name or a random string |
| `label` | string | null | The label text |
| `placeholder` | string | null | The select placeholder text |
| `options` | array | [] | Array of options or option groups |
| `multiple` | boolean | false | Whether multiple selection is allowed |
| `searchable` | boolean | false | Whether to enable search functionality |
| `clearable` | boolean | false | Whether to show a clear button |
| `required` | boolean | false | Whether the select is required |
| `disabled` | boolean | false | Whether the select is disabled |
| `readonly` | boolean | false | Whether the select is readonly |
| `leadingIcon` | string | null | Name of the icon to display before the select |
| `iconType` | string | 'heroicon' | The icon library type |
| `hint` | string | null | Helper text to display below the select |
| `error` | string | null | Error message to display |

## Option Format

Options can be provided in two formats:

### Simple Options
```php
[
    ['value' => 'red', 'label' => 'Red'],
    ['value' => 'blue', 'label' => 'Blue'],
]
```

### Option Groups
```php
[
    [
        'label' => 'Colors',
        'options' => [
            ['value' => 'red', 'label' => 'Red'],
            ['value' => 'blue', 'label' => 'Blue'],
        ]
    ]
]
```

## Styling

The select uses semantic color tokens for consistent theming:

- `border-input` for the border color
- `bg-background` for the background
- `text-foreground` for the text
- `ring-ring` for the focus ring
- `text-muted-foreground` for placeholder
- `border-destructive` and `ring-destructive` for error states

## Accessibility

The select component follows WAI-ARIA guidelines:

- Uses proper ARIA roles and attributes for combobox
- Supports keyboard navigation
- Provides descriptive text through `aria-describedby`
- Maintains proper focus states
- Handles screen reader announcements

## Livewire Integration

The select component fully supports Livewire:

- Works with `wire:model` and `wire:model.live`
- Supports async search with `wire:search`
- Shows loading indicator during requests
- Shows dirty state indicator
- Maintains state across re-renders
- Supports real-time validation 