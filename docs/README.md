# EcolePlus UI Components

A beautiful and accessible UI component library for Laravel Blade, inspired by shadcn/ui.

## Features

- 🎨 Beautiful and modern design
- ♿ Fully accessible (ARIA compliant)
- 🌙 Dark mode support
- ⚡ Livewire integration
- 🎯 Type-safe with PHP 8.1+
- 📱 Responsive and mobile-friendly
- 🎭 Customizable with Tailwind CSS

## Installation

```bash
composer require ecoleplus/ecoleplus-ui
```

Then publish the assets:

```bash
php artisan vendor:publish --tag="ecoleplus-ui-assets"
```

## Components

### Form Components
- [Button](./components/button.md)
- [Input](./components/form/input.md)
- [Textarea](./components/form/textarea.md)
- [Select](./components/form/select.md)
- [Checkbox](./components/form/checkbox.md)
- [Radio](./components/form/radio.md)
- [Toggle](./components/form/toggle.md)

### Other Components
- [Icon](./components/icon.md)

## Theming

EcolePlus UI uses CSS variables for theming. You can customize the theme by modifying the variables in your CSS:

```css
@layer base {
  :root {
    --background: 0 0% 100%;
    --foreground: 222.2 84% 4.9%;
    /* ... other variables ... */
  }
}
```

See [theming documentation](./theming.md) for more details.

## Contributing

Please see [CONTRIBUTING.md](../CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](../LICENSE.md) for more information. 