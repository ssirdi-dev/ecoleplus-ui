<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Theme Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can specify default theme settings for your UI components.
    |
    */
    'theme' => [
        'primary' => [
            'background' => 'bg-primary-600',
            'hover' => 'hover:bg-primary-700',
            'text' => 'text-white',
            'focus' => 'focus:ring-primary-500',
            'border' => 'border-primary-500',
        ],
        'secondary' => [
            'background' => 'bg-gray-600',
            'hover' => 'hover:bg-gray-700',
            'text' => 'text-white',
            'focus' => 'focus:ring-gray-500',
            'border' => 'border-gray-500',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Icons Configuration
    |--------------------------------------------------------------------------
    |
    | Configure the default icon set and classes.
    |
    */
    'icons' => [
        'style' => 'heroicon',
        'class' => 'w-5 h-5',
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Classes
    |--------------------------------------------------------------------------
    |
    | Default classes for components.
    |
    */
    'components' => [
        'button' => [
            'base' => 'inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-50 disabled:cursor-not-allowed',
            'variants' => [
                'primary' => 'bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500',
                'secondary' => 'bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500',
                'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
            ],
        ],
        'input' => [
            'base' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200',
            'error' => 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 dark:border-red-600 dark:text-red-200 dark:placeholder-red-400',
            'label' => 'block text-sm font-medium text-gray-700 dark:text-gray-200',
            'hint' => 'mt-2 text-sm text-gray-500 dark:text-gray-400',
        ],
        'textarea' => [
            'base' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200',
            'error' => 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 dark:border-red-600 dark:text-red-200 dark:placeholder-red-400',
            'label' => 'block text-sm font-medium text-gray-700 dark:text-gray-200',
            'hint' => 'mt-2 text-sm text-gray-500 dark:text-gray-400',
        ],
        'select' => [
            'base' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200',
            'error' => 'border-red-300 text-red-900 focus:border-red-500 focus:ring-red-500 dark:border-red-600 dark:text-red-200',
            'label' => 'block text-sm font-medium text-gray-700 dark:text-gray-200',
            'hint' => 'mt-2 text-sm text-gray-500 dark:text-gray-400',
        ],
        'card' => [
            'base' => 'bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700',
            'header' => 'px-4 py-5 sm:px-6 border-b border-gray-200 dark:border-gray-700',
            'body' => 'p-4 sm:p-6',
            'footer' => 'px-4 py-4 sm:px-6 border-t border-gray-200 dark:border-gray-700',
        ],
        'card-section' => [
            'base' => 'px-4 py-5 sm:p-6',
            'divider' => 'border-b border-gray-200 dark:border-gray-700',
            'title' => 'text-base font-semibold leading-6 text-gray-900 dark:text-gray-100',
            'description' => 'mt-2 max-w-xl text-sm text-gray-500 dark:text-gray-400',
            'content' => 'mt-5',
        ],
        'badge' => [
            'base' => 'inline-flex items-center font-medium',
            'variants' => [
                'primary' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300',
                'secondary' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
                'success' => 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300',
                'danger' => 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300',
                'warning' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300',
                'info' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-300',
            ],
            'sizes' => [
                'sm' => 'px-2 py-0.5 text-xs',
                'md' => 'px-2.5 py-0.5 text-sm',
                'lg' => 'px-3 py-1 text-base',
            ],
        ],
        'alert' => [
            'base' => 'rounded-md p-4',
            'variants' => [
                'success' => 'bg-green-50 text-green-800 dark:bg-green-900/50 dark:text-green-300',
                'error' => 'bg-red-50 text-red-800 dark:bg-red-900/50 dark:text-red-300',
                'warning' => 'bg-yellow-50 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300',
                'info' => 'bg-blue-50 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300',
            ],
            'title' => 'text-sm font-medium',
            'content' => 'mt-2 text-sm',
            'icon' => 'h-5 w-5',
            'dismiss' => 'inline-flex rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2',
        ],
    ],
]; 