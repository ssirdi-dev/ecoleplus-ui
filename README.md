# EcolePlus UI

A Laravel 11 UI library supporting TALL stack components with shadcn-inspired design.

## Installation

You can install the package via composer:

```bash
composer require amsaid/ecoleplus-ui
```

## Usage

### Button Component

The Button component offers multiple variants, sizes, and states with full Livewire 3 support:

```blade
{{-- Basic Variants --}}
<x-eplus::button label="Primary" />
<x-eplus::button variant="secondary" label="Secondary" />
<x-eplus::button variant="danger" label="Danger" />

{{-- Livewire Action --}}
<x-eplus::button 
    wire:click="save"
    label="Save Changes"
    icon="heroicon-o-check"
/>

{{-- Livewire Action with Loading State --}}
<x-eplus::button 
    wire:click="processLongAction"
    label="Process"
    icon="heroicon-o-arrow-path"
/>

{{-- Form Submit --}}
<x-eplus::button 
    type="submit"
    wire:loading.attr="disabled"
    label="Submit"
/>
```

#### Dark Mode

The Button component automatically supports dark mode through Tailwind CSS. The design is optimized for both light and dark themes with proper contrast and hover states.

#### Livewire Integration
- Automatic loading states
- Spinner animation during actions
- Disabled state during processing
- Icon swapping during loading
- Compatible with wire:click and wire:submit

#### Variants
- `primary` - Main call-to-action
- `secondary` - Alternative actions
- `danger` - Destructive actions
- `success` - Positive actions
- `warning` - Cautionary actions
- `info` - Informational actions
- `dark` - Dark variant
- `outline` - Bordered button
- `ghost` - Text with hover background
- `link` - Appears as a link

#### Sizes
- `sm` - Small button
- `default` - Standard size
- `lg` - Large button
- `icon` - Square button for icons

## Testing

```bash
composer test
```

## Code Style

```bash
composer format
```

## Static Analysis

```bash
composer analyse
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
