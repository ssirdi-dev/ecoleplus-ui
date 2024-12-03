// Common Types
type Size = 'xs' | 'sm' | 'md' | 'lg' | 'xl' | '2xl';
type Variant = 'primary' | 'secondary' | 'success' | 'danger' | 'warning' | 'info';
type Align = 'left' | 'right' | 'center';

// Checkbox Component
export interface CheckboxProps {
    name: string;
    id?: string;
    label?: string;
    value?: string;
    error?: string;
    checked?: boolean;
    disabled?: boolean;
}

// Radio Component
export interface RadioProps {
    name: string;
    id?: string;
    label?: string;
    value: string;
    error?: string;
    checked?: boolean;
    disabled?: boolean;
}

// Toggle Component
export interface ToggleProps {
    name: string;
    id?: string;
    label?: string;
    description?: string;
    value?: string;
    error?: string;
    checked?: boolean;
    disabled?: boolean;
    size?: 'sm' | 'md' | 'lg';
}

// Button Component
export interface ButtonProps {
    type?: 'button' | 'submit' | 'reset';
    variant?: Variant;
    size?: Size;
    disabled?: boolean;
    iconLeft?: string;
    iconRight?: string;
}

// Input Component
export interface InputProps {
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

// Select Component
export interface SelectProps {
    name: string;
    id?: string;
    label?: string;
    hint?: string;
    error?: string;
    placeholder?: string;
    required?: boolean;
    disabled?: boolean;
    options: Record<string, string>;
}

// Textarea Component
export interface TextareaProps {
    name: string;
    id?: string;
    label?: string;
    hint?: string;
    error?: string;
    rows?: number;
    required?: boolean;
    disabled?: boolean;
}

// Modal Component
export interface ModalProps {
    name: string;
    title?: string;
    maxWidth?: Size;
    show?: boolean;
}

// Dropdown Component
export interface DropdownProps {
    align?: 'left' | 'right';
    width?: '48' | '96';
    contentClasses?: string;
}

// Alert Component
export interface AlertProps {
    type?: 'info' | 'success' | 'warning' | 'error';
    title?: string;
    dismissible?: boolean;
    icon?: string;
}

// Badge Component
export interface BadgeProps {
    variant?: Variant;
    size?: Exclude<Size, '2xl'>;
    rounded?: boolean;
}

// Progress Component
export interface ProgressProps {
    value: number;
    max?: number;
    variant?: Variant;
    size?: Exclude<Size, '2xl'>;
    label?: string;
    showValue?: boolean;
    animated?: boolean;
}

// Avatar Component
export interface AvatarProps {
    src?: string;
    alt?: string;
    size?: Size;
    status?: 'online' | 'offline' | 'busy' | 'away';
}

// Card Component
export interface CardProps {
    header?: boolean;
    footer?: boolean;
    padding?: boolean;
    shadow?: boolean;
}

// Card Section Component
export interface CardSectionProps {
    title?: string;
    description?: string;
    noDivider?: boolean;
} 