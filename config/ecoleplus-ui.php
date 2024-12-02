<?php

// config for Ecoleplus/EcoleplusUi
return [

    /*
    |--------------------------------------------------------------------------
    | Component Prefix
    |--------------------------------------------------------------------------
    |
    | This value will be used as the default prefix for all components.
    | For example, if set to 'ecp', components will be referenced as 'ecp-button'.
    |
    */
    'prefix' => 'ecp',

    /*
    |--------------------------------------------------------------------------
    | Default Classes
    |--------------------------------------------------------------------------
    |
    | These values will be used as the default classes for component elements.
    | You can override these per component or per instance.
    |
    */
    'defaults' => [
        'button' => [
            'base' => 'inline-flex items-center justify-center font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2',
            'disabled' => 'opacity-50 cursor-not-allowed',
            'icon' => 'shrink-0',
            'size' => [
                'xs' => 'px-2 py-1 text-xs',
                'sm' => 'px-2.5 py-1.5 text-sm',
                'md' => 'px-3 py-2 text-sm',
                'lg' => 'px-4 py-2 text-base',
                'xl' => 'px-5 py-3 text-base',
            ],
            'variant' => [
                'primary' => 'text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-500',
                'secondary' => 'text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:ring-primary-500',
                'success' => 'text-white bg-green-600 hover:bg-green-700 focus:ring-green-500',
                'danger' => 'text-white bg-red-600 hover:bg-red-700 focus:ring-red-500',
                'warning' => 'text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500',
                'info' => 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-500',
                'dark' => 'text-white bg-gray-800 hover:bg-gray-900 focus:ring-gray-500',
                'link' => 'text-primary-600 hover:text-primary-700 underline bg-transparent',
            ],
        ],
        'input' => [
            'wrapper' => 'relative rounded-lg shadow-sm',
            'base' => 'block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white',
            'textarea' => 'block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-y',
            'textarea-auto' => 'overflow-hidden',
            'file' => 'block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 dark:text-gray-400 dark:file:bg-gray-700 dark:file:text-gray-400',
            'file-drag' => 'hidden',
            'drag-zone' => 'p-6 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:border-primary-500 transition-colors duration-200 dark:border-gray-600 dark:hover:border-primary-400',
            'char-count' => 'absolute bottom-2 right-2 text-xs text-gray-500 dark:text-gray-400',
            'prefix' => 'absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500 sm:text-sm',
            'suffix' => 'absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500 sm:text-sm',
        ],
        'select' => [
            'wrapper' => 'relative rounded-lg shadow-sm',
            'base' => 'block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white',
            'prefix' => 'absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500 sm:text-sm',
            'suffix' => 'absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500 sm:text-sm',
        ],
        'form' => [
            'base' => 'space-y-6',
            'group' => 'space-y-2',
            'label' => 'block text-sm font-medium text-gray-700 dark:text-gray-200',
            'help' => 'mt-1 text-sm text-gray-500 dark:text-gray-400',
            'error' => 'mt-1 text-sm text-red-600 dark:text-red-400',
            'actions' => 'flex items-center justify-end space-x-3 mt-6 pt-6 border-t border-gray-200 dark:border-gray-700',
        ],
        'card' => [
            'base' => 'bg-white shadow rounded-lg dark:bg-gray-800',
            'header' => 'px-4 py-5 border-b border-gray-200 sm:px-6 dark:border-gray-700',
            'content' => 'px-4 py-5 sm:p-6',
            'footer' => 'px-4 py-4 sm:px-6 border-t border-gray-200 dark:border-gray-700',
        ],
        'card-section' => [
            'base' => 'divide-y divide-gray-200 dark:divide-gray-700',
            'type' => [
                'header' => 'rounded-t-lg bg-gray-50 dark:bg-gray-800',
                'footer' => 'rounded-b-lg bg-gray-50 dark:bg-gray-800',
                'default' => '',
            ],
            'bordered-type' => [
                'header' => 'border-b border-gray-200 dark:border-gray-700',
                'footer' => 'border-t border-gray-200 dark:border-gray-700',
                'default' => 'border-b border-gray-200 dark:border-gray-700',
            ],
        ],
        'spinner' => [
            'base' => 'animate-spin rounded-full border-2 border-primary-200 border-t-primary-600',
            'size' => [
                'xs' => 'h-3 w-3',
                'sm' => 'h-4 w-4',
                'md' => 'h-6 w-6',
                'lg' => 'h-8 w-8',
                'xl' => 'h-10 w-10',
            ],
        ],
        'popover' => [
            'base' => 'absolute z-50 p-4 bg-white rounded-lg shadow-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700 sm:max-w-sm',
            'placement' => [
                'top' => '',
                'bottom' => '',
                'left' => '',
                'right' => '',
            ],
        ],
        'dropdown' => [
            'base' => 'absolute right-0 z-50 mt-2 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-800 dark:ring-gray-700',
        ],
        'modal' => [
            'base' => 'relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all dark:bg-gray-800 w-full max-w-[90vw] sm:my-8 sm:w-full sm:p-6',
            'size' => [
                'sm' => 'sm:max-w-sm',
                'md' => 'sm:max-w-lg',
                'lg' => 'sm:max-w-xl',
                'xl' => 'sm:max-w-2xl',
                '2xl' => 'sm:max-w-3xl',
                'full' => 'sm:max-w-[90vw]',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Colors
    |--------------------------------------------------------------------------
    |
    | Default color palette for components that support color variations.
    |
    */
    'colors' => [
        'primary' => [
            50 => '#f0f9ff',
            100 => '#e0f2fe',
            200 => '#bae6fd',
            300 => '#7dd3fc',
            400 => '#38bdf8',
            500 => '#0ea5e9',
            600 => '#0284c7',
            700 => '#0369a1',
            800 => '#075985',
            900 => '#0c4a6e',
            950 => '#082f49',
        ],
    ],
];
