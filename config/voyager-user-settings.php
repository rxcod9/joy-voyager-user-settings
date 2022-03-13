<?php

return [

    /*
     * If enabled for voyager-user-settings package.
     */
    'enabled' => env('VOYAGER_USER_SETTINGS_ENABLED', true),

    /*
    | Here you can specify for which data type slugs user-settings is enabled
    | 
    | Supported: "*", or data type slugs "users", "roles"
    |
    */

    'allowed_slugs' => array_filter(explode(',', env('VOYAGER_USER_SETTINGS_ALLOWED_SLUGS', '*'))),

    /*
    | Here you can specify for which data type slugs user-settings is not allowed
    | 
    | Supported: "*", or data type slugs "users", "roles"
    |
    */

    'not_allowed_slugs' => array_filter(explode(',', env('VOYAGER_USER_SETTINGS_NOT_ALLOWED_SLUGS', ''))),

    /*
     * The config_key for voyager-user-settings package.
     */
    'config_key' => env('VOYAGER_USER_SETTINGS_CONFIG_KEY', 'joy-voyager-user-settings'),

    /*
     * The route_prefix for voyager-user-settings package.
     */
    'route_prefix' => env('VOYAGER_USER_SETTINGS_ROUTE_PREFIX', 'joy-voyager-user-settings'),

    /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify voyager controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Joy\\VoyagerUserSettings\\Http\\Controllers',
    ],
];
