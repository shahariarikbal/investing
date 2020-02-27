<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

        'blog' => [
            'driver' => 'local',
            'root' => public_path('/blogs/images'),
            'url' => env('APP_URL').'/blogs',
            'visibility' => 'public',
        ],

        'analysis' => [
            'driver' => 'local',
            'root' => public_path('/analyses/images'),
            'url' => env('APP_URL').'/analyses',
            'visibility' => 'public',
        ],

        'knowledgebase' => [
            'driver' => 'local',
            'root' => public_path('/knowledgebases/images'),
            'url' => env('APP_URL').'/knowledgebase',
            'visibility' => 'public',
        ],

        'support-ticket' => [
            'driver' => 'local',
            'root' => storage_path('app/public/support-ticket'),
            'url' => env('APP_URL').'/storage/support-ticket',
            'visibility' => 'public',
        ],

        'signal' => [
            'driver' => 'local',
            'root' => public_path('/signal/images'),
            'url' => env('APP_URL').'/signal/images',
            'visibility' => 'public',
        ],

        'currency' => [
            'driver' => 'local',
            'root' => public_path('/currency/images'),
            'url' => env('APP_URL').'/currency/images',
            'visibility' => 'public',
        ],

        'user' => [
            'driver' => 'local',
            'root' => storage_path('app/public/user'),
            'url' => env('APP_URL').'/storage/user',
            'visibility' => 'public',
        ],

        'broker-logo' => [
            'driver' => 'local',
            'root' => public_path().'/broker/logo',
            'url' => env('APP_URL').'/broker/logo',
            'visibility' => 'public',
        ],

        'broker-screenshot' => [
            'driver' => 'local',
            'root' => public_path().'/broker/screenshot',
            'url' => env('APP_URL').'/broker/screenshot',
            'visibility' => 'public',
        ],

        'advertisement' => [
            'driver' => 'local',
            'root' => public_path().'/advertisement',
            'url' => env('APP_URL').'/advertisement',
            'visibility' => 'public',
        ],
        'transaction' => [
            'driver' => 'local',
            'root' => storage_path('app/public/transaction'),
            'url' => env('APP_URL').'/storage/transaction',
            'visibility' => 'public'
        ],

        'monthly-trade-statement' => [
            'driver' => 'local',
            'root' => storage_path('app/public/monthly-trade-statement'),
            'url' => env('APP_URL').'/storage/monthly-trade-statement',
            'visibility' => 'public',
        ],

    ],

];
