# EcolePlus UI

A modern UI component library for Laravel 11 applications, built with the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire).

## Overview

EcolePlus UI provides a comprehensive set of pre-built components that follow Laravel and Tailwind CSS best practices. Built specifically for Laravel 11, it offers:

- 🎨 Modern, consistent design system
- 🌙 Dark mode support with proper contrast ratios
- ♿ WCAG 2.1 compliant components
- 📱 Mobile-first responsive design
- ⚡ Alpine.js powered interactions
- 🔧 Laravel 11 optimized
- 🎯 TypeScript support
- 🔍 100% test coverage
- 📚 Comprehensive documentation

## Requirements

- PHP 8.2+
- Laravel 11.x
- Node.js & NPM
- Tailwind CSS 3.x
- Alpine.js 3.x

## Quick Start

1. Install via Composer:

```bash
composer require amsaid/ecoleplus-ui
```

2. Publish assets and config:

```bash
php artisan vendor:publish --provider="EcolePlus\EcolePlusUi\EcolePlusUiServiceProvider"
```

3. Install frontend dependencies:

```bash
npm install -D @tailwindcss/forms @tailwindcss/typography alpinejs @alpinejs/focus
```

4. Configure Tailwind CSS:

```js
// tailwind.config.js
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './vendor/amsaid/ecoleplus-ui/resources/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: colors.blue,
                secondary: colors.gray,
                success: colors.green,
                warning: colors.yellow,
                danger: colors.red,
                info: colors.indigo,
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
```

5. Import styles:

```css
/* resources/css/app.css */
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import '@vendor/amsaid/ecoleplus-ui/resources/css/components.css';
@import 'tailwindcss/utilities';
```

## Available Components

### Form Components
- [Button](docs/components/button.md) - Versatile button component
- [Input](docs/components/input.md) - Text input with validation
- [Textarea](docs/components/textarea.md) - Multi-line text input
- [Select](docs/components/select.md) - Dropdown select component
- [Checkbox](docs/components/form.md#checkbox) - Checkbox input with label
- [Radio](docs/components/form.md#radio) - Radio input with label
- [Toggle](docs/components/form.md#toggle) - Switch/toggle input with label

### Layout Components
- [Card](docs/components/card.md) - Content container
- [Card Section](docs/components/card-section.md) - Card content organizer

### Interactive Components
- [Modal](docs/components/modal.md) - Dialog windows
- [Dropdown](docs/components/dropdown.md) - Dropdown menus

### Feedback Components
- [Alert](docs/components/alert.md) - Status messages
- [Badge](docs/components/badge.md) - Labels and counts
- [Progress](docs/components/progress.md) - Progress indicators

### Display Components
- [Avatar](docs/components/avatar.md) - User avatars

## Documentation

- [Getting Started](docs/getting-started.md)
- [Customization](docs/customization.md)
- [Components](docs/components)
- [TypeScript](docs/typescript.md)
- [Testing](docs/testing.md)
- [Contributing](CONTRIBUTING.md)

## Configuration

Components can be customized through the config file:

```php
// config/ecoleplus-ui.php
return [
    'theme' => [
        'primary' => [
            'background' => 'bg-primary-600',
            'hover' => 'hover:bg-primary-700',
            'text' => 'text-white',
        ],
        // ...
    ],
    'components' => [
        'button' => [
            'base' => 'inline-flex items-center justify-center...',
            'variants' => [
                'primary' => 'bg-primary-600 text-white...',
                // ...
            ],
        ],
        // ...
    ],
];
```

## Testing

```bash
# Run tests
composer test

# Run tests with coverage
composer test-coverage

# Run static analysis
composer analyse

# Format code
composer format
```

## Security

If you discover any security-related issues, please email security@ecoleplus.com instead of using the issue tracker.

## Credits

- [Said](https://github.com/amsaid)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [LICENSE.md](LICENSE.md) for more information.
