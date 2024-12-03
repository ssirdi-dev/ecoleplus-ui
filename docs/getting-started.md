# Getting Started with EcolePlus UI

## Introduction

EcolePlus UI is a modern UI component library built specifically for Laravel 11 applications. It leverages the power of the TALL stack (Tailwind CSS, Alpine.js, Laravel, and Livewire) to provide a seamless development experience.

## Prerequisites

Before you begin, ensure you have:

- PHP 8.2 or higher
- Laravel 11.x installed
- Node.js and NPM
- Composer

## Installation

1. Install the package via Composer:

```bash
composer require amsaid/ecoleplus-ui
```

2. Install the required NPM packages:

```bash
npm install -D tailwindcss @tailwindcss/forms @tailwindcss/typography alpinejs @alpinejs/focus
```

3. Publish the package assets:

```bash
php artisan vendor:publish --provider="EcolePlus\EcolePlusUi\EcolePlusUiServiceProvider"
```

## Configuration

1. Update your `tailwind.config.js`:

```js
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/amsaid/ecoleplus-ui/resources/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
```

2. Import the CSS in your main stylesheet (`resources/css/app.css`):

```css
@import 'vendor/amsaid/ecoleplus-ui/resources/css/components.css';
```

3. Initialize Alpine.js in your JavaScript (`resources/js/app.js`):

```js
import Alpine from 'alpinejs'
import Focus from '@alpinejs/focus'
 
Alpine.plugin(Focus)
window.Alpine = Alpine
Alpine.start()
```

## Basic Usage

### Button Component

```blade
<x-eplus-button>
    Click me
</x-eplus-button>

<x-eplus-button variant="primary" icon-left="heroicon-o-plus">
    Create New
</x-eplus-button>

<x-eplus-button variant="secondary" disabled>
    Disabled
</x-eplus-button>
```

### Input Component

```blade
<x-eplus-input 
    name="email"
    label="Email Address"
    type="email"
    placeholder="john@example.com"
/>

<x-eplus-input 
    name="password"
    label="Password"
    type="password"
    icon="heroicon-o-lock-closed"
/>
```

### Alert Component

```blade
<x-eplus-alert 
    type="success"
    title="Success!"
    dismissible
>
    Your changes have been saved.
</x-eplus-alert>

<x-eplus-alert 
    type="error"
    title="Error!"
>
    Please fix the following errors.
</x-eplus-alert>
```

## Working with Forms

Example of a login form using multiple components:

```blade
<x-eplus-card>
    <form action="/login" method="POST">
        @csrf
        
        <x-eplus-input 
            name="email"
            label="Email"
            type="email"
            required
        />

        <x-eplus-input 
            name="password"
            label="Password"
            type="password"
            required
            class="mt-4"
        />

        <div class="mt-6">
            <x-eplus-button type="submit" variant="primary" class="w-full">
                Login
            </x-eplus-button>
        </div>
    </form>
</x-eplus-card>
```

## Dark Mode Support

All components support dark mode out of the box. To enable dark mode:

1. Add the dark mode class to your root HTML element:

```blade
<html class="dark">
```

2. Or use Alpine.js for dynamic switching:

```blade
<html x-data="{ dark: false }" :class="{ 'dark': dark }">
```

## Next Steps

- Check out the [Customization Guide](customization.md) to learn how to customize components
- Explore individual component documentation in the [components](components) directory
- Learn about [advanced features](advanced-features.md) like extending components and creating custom variants

## Troubleshooting

### Common Issues

1. **Components not showing up**
   - Make sure you've published the assets
   - Check if Tailwind is processing the component files
   - Verify your CSS imports

2. **Styles not applying**
   - Clear your views cache: `php artisan view:clear`
   - Rebuild your assets: `npm run build`
   - Check for CSS conflicts

3. **JavaScript features not working**
   - Ensure Alpine.js is properly initialized
   - Check browser console for errors
   - Verify component event handlers

### Getting Help

- Check the [GitHub Issues](https://github.com/amsaid/ecoleplus-ui/issues)
- Join our [Discord Community](https://discord.gg/your-discord)
- Read the [FAQ](faq.md)
