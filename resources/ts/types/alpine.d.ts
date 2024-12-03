import { Alpine as AlpineType } from 'alpinejs';
import { EcolePlusEventName, EcolePlusEventPayload } from './events';

// Base Alpine Data
interface AlpineData {
    init?(): void;
    destroy?(): void;
}

// Modal Data
export interface AlpineDataModal extends AlpineData {
    show: boolean;
    name: string;
    open(): void;
    close(): void;
}

// Dropdown Data
export interface AlpineDataDropdown extends AlpineData {
    open: boolean;
    toggle(): void;
}

// Alert Data
export interface AlpineDataAlert extends AlpineData {
    show: boolean;
    dismiss(): void;
}

// Event Dispatcher
interface EventDispatcher {
    $dispatch<T extends EcolePlusEventName>(
        event: T,
        detail: EcolePlusEventPayload<T>
    ): void;
}

// Extend Window
declare global {
    interface Window {
        Alpine: AlpineType;
    }
}

// Extend Alpine
declare module 'alpinejs' {
    interface Alpine extends AlpineType {
        data<T extends AlpineData>(
            name: string,
            callback: (params?: any) => T
        ): void;
    }
} 