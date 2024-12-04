# Theming

EcolePlus UI uses CSS variables for theming, making it easy to customize the look and feel of your application.

## Default Theme

The default theme is defined using CSS variables with HSL color values. Here's the complete list of variables:

```css
@layer base {
  :root {
    /* Background colors */
    --background: 0 0% 100%;
    --foreground: 222.2 84% 4.9%;

    /* Card colors */
    --card: 0 0% 100%;
    --card-foreground: 222.2 84% 4.9%;
 
    /* Popover colors */
    --popover: 0 0% 100%;
    --popover-foreground: 222.2 84% 4.9%;
 
    /* Primary colors */
    --primary: 222.2 47.4% 11.2%;
    --primary-foreground: 210 40% 98%;
 
    /* Secondary colors */
    --secondary: 210 40% 96.1%;
    --secondary-foreground: 222.2 47.4% 11.2%;
 
    /* Muted colors */
    --muted: 210 40% 96.1%;
    --muted-foreground: 215.4 16.3% 46.9%;
 
    /* Accent colors */
    --accent: 210 40% 96.1%;
    --accent-foreground: 222.2 47.4% 11.2%;
 
    /* Status colors */
    --destructive: 0 84.2% 60.2%;
    --destructive-foreground: 210 40% 98%;
    --success: 142.1 76.2% 36.3%;
    --success-foreground: 355.7 100% 97.3%;
    --warning: 38 92% 50%;
    --warning-foreground: 48 96% 89%;
    --info: 199 89% 48%;
    --info-foreground: 202 100% 95%;

    /* Border and input colors */
    --border: 214.3 31.8% 91.4%;
    --input: 214.3 31.8% 91.4%;
    --ring: 222.2 84% 4.9%;
 
    /* Border radius */
    --radius: 0.5rem;
  }
}
```

## Dark Mode

Dark mode colors are automatically applied when the `dark` class is present on the HTML element:

```css
.dark {
  --background: 222.2 84% 4.9%;
  --foreground: 210 40% 98%;
  /* ... other dark mode variables ... */
}
```

## Customizing the Theme

### Method 1: CSS Variables

The easiest way to customize the theme is by overriding the CSS variables:

```css
@layer base {
  :root {
    --primary: 240 100% 50%; /* Change primary color to blue */
    --radius: 0.25rem; /* Change border radius */
  }
}
```

### Method 2: Tailwind Config

You can also customize the theme by modifying your `tailwind.config.js`:

```js
module.exports = {
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: 'hsl(var(--primary))',
          foreground: 'hsl(var(--primary-foreground))',
        },
        // ... other colors
      },
      borderRadius: {
        lg: 'var(--radius)',
        md: 'calc(var(--radius) - 2px)',
        sm: 'calc(var(--radius) - 4px)',
      },
    },
  },
}
```

## Color Tokens

The library uses semantic color tokens for consistent theming:

- `background/foreground`: Base page colors
- `card/card-foreground`: Card component colors
- `popover/popover-foreground`: Popover component colors
- `primary/primary-foreground`: Primary action colors
- `secondary/secondary-foreground`: Secondary action colors
- `muted/muted-foreground`: Muted/subtle UI elements
- `accent/accent-foreground`: Accent/highlighted elements
- `destructive/destructive-foreground`: Error/danger states
- `success/success-foreground`: Success states
- `warning/warning-foreground`: Warning states
- `info/info-foreground`: Information states
- `border`: Border colors
- `input`: Form input borders
- `ring`: Focus rings

## Best Practices

1. **Use Semantic Tokens**: Instead of using raw colors, use semantic tokens like `bg-primary` or `text-muted-foreground`.

2. **Dark Mode**: Always test your customizations in both light and dark modes.

3. **Contrast**: Ensure sufficient contrast between foreground and background colors for accessibility.

4. **Consistency**: Use the same color tokens consistently across your application.

5. **HSL Values**: When defining custom colors, use HSL values for better compatibility with the theming system. 