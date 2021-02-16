<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
      'client_id' => '966776997049384',
      'client_secret' => 'ae3f3fb71e84304dcb394af55e38e9d4',
      'redirect' => 'https://gowala.maxproit.solutions/login/facebook/callback',
    ],


    'google' => [
      'client_id' => 'GOOGLE_CLIENT_ID',
      'client_secret' => 'GOOGLE_SECRET_KEY',
      'redirect' => 'http://localhost:8000/login/google/callback',
    ],

];
