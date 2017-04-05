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
        'region' => 'us-east-1',
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
    'client_id' => '240236309782058',
    'client_secret' => 'afe7e4eb6327ae54e978cbc9d77897cb',
    'redirect' => 'http://localhost/laravel/public/facebook/callback',
    ],
    'google' => [
    'client_id' => '508247514972-13qb88ugumbvpeibj30a5uap657g22tl.apps.googleusercontent.com',
    'client_secret' => 'dDbqcvFNoUGbEZ_f_zVKaD_k',
    'redirect' => 'http://localhost/laravel/public/google/callback',
    ],

];
