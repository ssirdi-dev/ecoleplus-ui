# Select Component

The Select component provides a styled dropdown select input with support for options, labels, and error states.

## Basic Usage

```blade
<x-eplus::select
    name="country"
    label="Select Country"
    :options="[
        'us' => 'United States',
        'uk' => 'United Kingdom',
        'ca' => 'Canada'
    ]"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string\|null | `null` | Input name attribute |
| `id` | string\|null | `null` | Input ID (defaults to name) |
| `label` | string\|null | `null` | Label text |
| `hint` | string\|null | `null` | Help text below the input |
| `error` | string\|null | `null` | Error message |
| `placeholder` | string\|null | `null` | Placeholder option text |
| `options` | array | `[]` | Array of options (key-value pairs) |

## Examples

### With Placeholder

```blade
<x-eplus::select
    name="category"
    label="Category"
    placeholder="Select a category"
    :options="[
        'electronics' => 'Electronics',
        'clothing' => 'Clothing',
        'books' => 'Books'
    ]"
/>
```

### With Help Text and Error

```blade
<x-eplus::select
    name="priority"
    label="Priority Level"
    hint="Choose the task priority"
    error="Priority is required"
    :options="[
        'low' => 'Low Priority',
        'medium' => 'Medium Priority',
        'high' => 'High Priority'
    ]"
/>
```

### Using Slot for Custom Options

```blade
<x-eplus::select name="status" label="Status">
    <option value="active" class="text-green-600">● Active</option>
    <option value="pending" class="text-yellow-600">● Pending</option>
    <option value="inactive" class="text-red-600">● Inactive</option>
</x-eplus::select>
```

### With Livewire Integration

```blade
<x-eplus::select
    name="department"
    label="Department"
    wire:model="selectedDepartment"
    :options="$departments"
/>
```

### Grouped Options

```blade
<x-eplus::select name="vehicle" label="Choose Vehicle">
    <optgroup label="Cars">
        <option value="sedan">Sedan</option>
        <option value="suv">SUV</option>
    </optgroup>
    <optgroup label="Motorcycles">
        <option value="sport">Sport</option>
        <option value="cruiser">Cruiser</option>
    </optgroup>
</x-eplus::select>
```

## Styling

The component includes:
- Modern select input design
- Support for option groups
- Placeholder option support
- Error state styling
- Help text display
- Dark mode support
- Focus state styling
- Label alignment
- Proper spacing
- Accessible design
- Responsive width 