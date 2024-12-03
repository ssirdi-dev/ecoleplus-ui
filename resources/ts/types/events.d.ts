declare global {
    interface WindowEventMap {
        'modal-opened': CustomEvent<{ name: string }>;
        'modal-closed': CustomEvent<{ name: string }>;
        'dropdown-opened': CustomEvent<{ name: string }>;
        'dropdown-closed': CustomEvent<{ name: string }>;
        'alert-dismissed': CustomEvent<{ id: string }>;
    }
}

export interface EcolePlusEvents {
    'open-modal': { name: string };
    'close-modal': { name: string };
    'open-dropdown': { name: string };
    'close-dropdown': { name: string };
    'dismiss-alert': { id: string };
}

export type EcolePlusEventName = keyof EcolePlusEvents;
export type EcolePlusEventPayload<T extends EcolePlusEventName> = EcolePlusEvents[T]; 