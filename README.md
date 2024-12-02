# Ecoleplus UI

A highly customizable TALL stack (TailwindCSS, Alpine.js, Laravel, Livewire) Blade component library for Laravel 11+.

## Installation

You can install the package via composer:

```bash
composer require amsaid/ecoleplus-ui
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="ecoleplus-ui-config"
```

## Usage

### Basic Components

#### Button Component

The button component is highly customizable and supports various variants, sizes, and icons:

```blade
<x-ecp::button>
    Default Button
</x-ecp::button>

<x-ecp::button variant="primary" size="lg">
    Large Primary Button
</x-ecp::button>

<x-ecp::button variant="secondary" icon="heroicon-o-plus">
    Button with Icon
</x-ecp::button>
```

Available props:
- `type`: button type (default: 'button')
- `variant`: primary, secondary, danger (default: 'primary')
- `size`: xs, sm, md, lg, xl (default: 'md')
- `disabled`: boolean (default: false)
- `icon`: icon component name
- `iconPosition`: left, right (default: 'left')

#### Input Component

The input component includes support for labels, error messages, and prefix/suffix elements:

```blade
<x-ecp::input
    label="Email"
    type="email"
    placeholder="Enter your email"
/>

<x-ecp::input
    label="Price"
    type="number"
    prefix="$"
    suffix=".00"
/>

<x-ecp::input
    label="Username"
    error="This username is already taken"
/>
```

Available props:
- `type`: input type (default: 'text')
- `label`: optional label text
- `error`: optional error message
- `prefix`: optional prefix text/element
- `suffix`: optional suffix text/element

## Customization

The configuration file (`config/ecoleplus-ui.php`) allows you to customize:
- Component prefix
- Default classes for each component
- Color palette
- And more...

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ecoleplus](https://github.com/amsaid)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
