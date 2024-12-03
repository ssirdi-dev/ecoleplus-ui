# Card Section Component

The Card Section component provides a structured way to organize content within a card, with optional title, description, and divider.

## Basic Usage

```blade
<x-eplus::card-section>
    Content goes here
</x-eplus::card-section>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string\|null | `null` | Section title |
| `description` | string\|null | `null` | Section description |
| `noDivider` | boolean | `false` | Whether to hide the bottom border |

## Examples

### With Title and Description

```blade
<x-eplus::card-section
    title="Account Information"
    description="Update your account details and email preferences."
>
    <form>
        <!-- Form content -->
    </form>
</x-eplus::card-section>
```

### Without Divider

```blade
<x-eplus::card-section :noDivider="true">
    This section won't have a bottom border
</x-eplus::card-section>
```

### Multiple Sections in a Card

```blade
<x-eplus::card>
    <x-eplus::card-section
        title="Personal Information"
        description="Your personal details."
    >
        <!-- Personal info content -->
    </x-eplus::card-section>

    <x-eplus::card-section
        title="Privacy Settings"
        description="Manage your privacy preferences."
    >
        <!-- Privacy settings content -->
    </x-eplus::card-section>

    <x-eplus::card-section
        title="Notifications"
        description="Configure your notification settings."
        :noDivider="true"
    >
        <!-- Notification settings content -->
    </x-eplus::card-section>
</x-eplus::card>
```

### Custom Styling

```blade
<x-eplus::card-section
    class="bg-gray-50 dark:bg-gray-800"
    title="Custom Section"
>
    Content with custom background
</x-eplus::card-section>
```

## Styling

The component includes:
- Consistent padding with responsive adjustments
- Title with proper font weight and size
- Description text in muted color
- Optional bottom border with dark mode support
- Proper spacing between title, description, and content
- Dark mode text color handling
- Flexible content area
- Responsive design 