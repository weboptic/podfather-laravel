<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Podfather API Base URL
    |--------------------------------------------------------------------------
    */
    'base_url' => env('PODFATHER_BASE_URL', 'https://external-api.aws.thepodfather.com/v1'),

    /*
    |--------------------------------------------------------------------------
    | Podfather API Key
    |--------------------------------------------------------------------------
    | Used as a Bearer token to authenticate with the Podfather API.
    */
    'api_key' => env('PODFATHER_API_KEY', ''),
];