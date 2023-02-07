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
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '358343492049538', //Facebook API
        'client_secret' => 'be938d1b4b618697c14a49dfc117a249', //Facebook Secret
        'redirect' => 'http://127.0.0.1:8000/login/facebook/callback',
     ],
     'github' => [
        'client_id' => '36ebe9377c7670ba0434', //Facebook API
        'client_secret' => 'a357481a3adf062440251868b9b62891dd9d8afd', //Facebook Secret
        'redirect' => 'http://127.0.0.1:8000/login/github/callback',
     ],
     'google' => [
        'client_id' => '542036466713-2vsi21cdqgou2nfs02ehoikuaq7c8l3f.apps.googleusercontent.com', //Facebook API
        'client_secret' => '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', //Facebook Secret
        'redirect' => 'http://127.0.0.1:8000/login/google/callback',
     ],
];
