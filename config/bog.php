<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Endpoint Environment
    |--------------------------------------------------------------------------
    |
    | BlueOceanGaming API Endpoint Environment staging or production (default)
    | By default, the API Endpoint is set to staging.
    */

    'sandbox' => env('BOG_SANDBOX', true),

    /*
    |--------------------------------------------------------------------------
    | API Endpoint
    |--------------------------------------------------------------------------
    |
    | BlueOceanGaming API Endpoint
    | There are two options: staging and production (default)
    | You can change this value in config/blueoceangaming.php
    | Stage: https://stage.game-program.com/api/seamless/provider
    | Production: https://api.thegameprovider.com/api/seamless/provider
    */

    'api_endpoint' => env('BOG_ENDPOINT', 'https://stage.game-program.com/api/seamless/provider'),


    /*
    |--------------------------------------------------------------------------
    | API Password
    |--------------------------------------------------------------------------
    |
    | BlueOceanGaming API Password
    | You can change this value in config/blueoceangaming.php
    |
    */

    'api_password' => env('BOG_PASSWORD', null),

    /*
    |--------------------------------------------------------------------------
    | API Login
    |--------------------------------------------------------------------------
    |
    | BlueOceanGaming API Login
    | You can change this value in config/blueoceangaming.php
    |
    */

    'api_login' =>  env('BOG_USERNAME', null),
];
