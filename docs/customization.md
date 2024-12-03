# Customizing Components

EcolePlus UI components are highly customizable through configuration and Tailwind CSS classes.

## Configuration

All components can be customized through the `config/ecoleplus-ui.php` configuration file. After installing the package, publish the configuration:

```bash
php artisan vendor:publish --provider="EcolePlus\EcolePlusUi\EcolePlusUiServiceProvider"
```

## Theme Configuration

The theme configuration allows you to define global color schemes and styles:

```php
'theme' => [
    'primary' => [
        'background' => 'bg-primary-600',
        'hover' => 'hover:bg-primary-700',
        'text' => 'text-white',
        'focus' => 'focus:ring-primary-500',
        'border' => 'border-primary-500',
    ],
    'secondary' => [
        'background' => 'bg-gray-600',
        'hover' => 'hover:bg-gray-700',
        'text' => 'text-white',
        'focus' => 'focus:ring-gray-500',
        'border' => 'border-gray-500',
    ],
],
```

## Component Classes

Each component has its own configuration section that defines its base styles, variants, and states:

### Button Component

```php
'button' => [
    'base' => 'inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-50 disabled:cursor-not-allowed',
    'variants' => [
        'primary' => 'bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500',
        'secondary' => 'bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
    ],
],
```

### Form Components (Input, Textarea, Select)

These components share similar configuration patterns:

```php
'input' => [
    'base' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200',
    'error' => 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500',
    'label' => 'block text-sm font-medium text-gray-700 dark:text-gray-200',
    'hint' => 'mt-2 text-sm text-gray-500 dark:text-gray-400',
],
```

### Badge Component

```php
'badge' => [
    'base' => 'inline-flex items-center font-medium',
    'variants' => [
        'primary' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300',
        'secondary' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        // ... more variants
    ],
    'sizes' => [
        'sm' => 'px-2 py-0.5 text-xs',
        'md' => 'px-2.5 py-0.5 text-sm',
        'lg' => 'px-3 py-1 text-base',
    ],
],
```

## Dark Mode Support

All components include dark mode variants by default. To customize dark mode styles, use the `dark:` prefix in your Tailwind classes:

```php
'base' => 'bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100'
```

## Adding New Variants

You can add new variants to any component by extending its configuration:

```php
// config/ecoleplus-ui.php
'button' => [
    'variants' => [
        'custom' => 'bg-purple-600 text-white hover:bg-purple-700 focus:ring-purple-500',
    ],
],
```

Then use it in your templates:

```blade
<x-eplus::button variant="custom">Custom Button</x-eplus::button>
```

## Overriding Components

You can override any component's view by publishing the views and modifying them:

```bash
php artisan vendor:publish --provider="EcolePlus\EcolePlusUi\EcolePlusUiServiceProvider" --tag="ecoleplus-ui-views"
```

The views will be published to `resources/views/vendor/ecoleplus-ui/components/`.
