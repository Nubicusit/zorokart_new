<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AKIAVWE4XVX4B5YIEQEC'),
        'secret' => env('AKIAVWE4XVX4B5YIEQEC'),
        'region' => env('Asia Pacific (Mumbai)', 'ap-south-1'),
     
    ],

    'google' => [
        'client_id' => env('473862940202-9ubhffruh5iiftd8g6tsfcp1pc51ob23.apps.googleusercontent.com'),
        'client_secret' => env('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'),
        'redirect' => 'http://schoolspe.in/schoolspe/parent_login',
      ], 

];
