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
            'base' => 'inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150',
            'primary' => 'border-transparent text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-500',
            'secondary' => 'border-gray-300 text-gray-700 bg-white hover:bg-gray-50 focus:ring-primary-500',
            'danger' => 'border-transparent text-white bg-red-600 hover:bg-red-700 focus:ring-red-500',
        ],
        'input' => [
            'base' => 'border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm',
        ],
        'select' => [
            'base' => 'border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm',
        ],
        'checkbox' => [
            'base' => 'rounded border-gray-300 text-primary-600 shadow-sm focus:ring-primary-500',
        ],
        'radio' => [
            'base' => 'border-gray-300 text-primary-600 shadow-sm focus:ring-primary-500',
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
