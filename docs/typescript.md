# TypeScript Support

EcolePlus UI provides TypeScript definitions for all its JavaScript interactions, making it easier to work with the components in a type-safe way.

## Installation

1. Install TypeScript dependencies:

```bash
npm install -D typescript @types/alpinejs
```

2. Create a `tsconfig.json` file:

```json
{
    "compilerOptions": {
        "target": "ES2020",
        "module": "ESNext",
        "moduleResolution": "node",
        "strict": true,
        "jsx": "preserve",
        "sourceMap": true,
        "resolveJsonModule": true,
        "esModuleInterop": true,
        "lib": ["ESNext", "DOM", "DOM.Iterable"],
        "baseUrl": ".",
        "paths": {
            "@/*": ["resources/js/*"]
        },
        "types": ["vite/client", "alpinejs"]
    },
    "include": [
        "resources/**/*.ts",
        "resources/**/*.d.ts",
        "resources/**/*.vue",
        "node_modules/@ecoleplus/ui/types/**/*.d.ts"
    ]
}
```

## Type Definitions

### Component Events

```typescript
// types/events.d.ts
declare global {
    interface WindowEventMap {
        'modal-opened': CustomEvent<{ name: string }>;
        'modal-closed': CustomEvent<{ name: string }>;
        'dropdown-opened': CustomEvent<{ name: string }>;
        'dropdown-closed': CustomEvent<{ name: string }>;
    }
}

// Component Events
interface EcolePlusEvents {
    'open-modal': { name: string };
    'close-modal': { name: string };
    'open-dropdown': { name: string };
    'close-dropdown': { name: string };
}
```

### Component Props

```typescript
// types/components.d.ts
interface ButtonProps {
    type?: 'button' | 'submit' | 'reset';
    variant?: 'primary' | 'secondary' | 'danger' | 'warning' | 'info';
    size?: 'xs' | 'sm' | 'md' | 'lg' | 'xl';
    disabled?: boolean;
    iconLeft?: string;
    iconRight?: string;
}

interface InputProps {
    type?: string;
    name: string;
    id?: string;
    value?: string;
    label?: string;
    hint?: string;
    error?: string;
    icon?: string;
    required?: boolean;
    disabled?: boolean;
}

interface ModalProps {
    name: string;
    title?: string;
    maxWidth?: 'sm' | 'md' | 'lg' | 'xl' | '2xl';
    show?: boolean;
}

interface DropdownProps {
    align?: 'left' | 'right';
    width?: '48' | '96';
    contentClasses?: string;
}

// ... other component props
```

### Alpine.js Data Types

```typescript
// types/alpine.d.ts
interface AlpineDataModal {
    show: boolean;
    init(): void;
    open(): void;
    close(): void;
}

interface AlpineDataDropdown {
    open: boolean;
    init(): void;
    toggle(): void;
}

// Extend Alpine global
declare global {
    interface Window {
        Alpine: import('alpinejs').Alpine & {
            data(name: string, callback: () => any): void;
        };
    }
}
```

## Usage with Alpine.js

```typescript
// resources/js/components/modal.ts
interface ModalData extends AlpineDataModal {
    name: string;
}

export function modal(name: string): ModalData {
    return {
        show: false,
        name,
        
        init() {
            window.addEventListener('open-modal', ((e: CustomEvent<{ name: string }>) => {
                if (e.detail.name === this.name) {
                    this.open();
                }
            }) as EventListener);
        },
        
        open() {
            this.show = true;
            window.dispatchEvent(new CustomEvent('modal-opened', {
                detail: { name: this.name }
            }));
        },
        
        close() {
            this.show = false;
            window.dispatchEvent(new CustomEvent('modal-closed', {
                detail: { name: this.name }
            }));
        }
    };
}
```

## Usage in Blade Templates

The TypeScript definitions will provide autocompletion and type checking when using Alpine.js directives:

```blade
<div
    x-data="modal('my-modal')"
    x-show="show"
    @keydown.escape.window="close"
>
    <!-- TypeScript will validate the event names and data structure -->
</div>
```

## Vite Configuration

Update your `vite.config.js` to handle TypeScript:

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/ts/app.ts'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/ts'
        }
    }
});
```

## Type Checking

Run type checking with:

```bash
# Check types
npx tsc --noEmit

# Watch mode
npx tsc --noEmit --watch
```

## IDE Support

The type definitions provide excellent IDE support in editors like VS Code and PhpStorm:

- Autocomplete for component props
- Type checking for event names and payloads
- IntelliSense for Alpine.js directives
- Error detection for invalid prop values
- Hover documentation

## Best Practices

1. Always define types for component props and events
2. Use strict TypeScript mode
3. Avoid using `any` type
4. Document complex types
5. Use type guards for runtime checks
6. Keep type definitions in sync with PHP component props
7. Use TypeScript for all JavaScript files
8. Add JSDoc comments for better documentation

## Contributing

When adding new components or modifying existing ones:

1. Update type definitions
2. Add tests for TypeScript types
3. Document new types
4. Keep types in sync with PHP components
5. Follow TypeScript best practices 