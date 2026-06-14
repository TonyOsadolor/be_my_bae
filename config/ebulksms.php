<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Ebulk SMS Connections
    |--------------------------------------------------------------------------
    |
    | Below are Ebulk SMS Authentication Connections.
    |
    */

    'url' => env('EBULKSMS_URL'),
    'api' => env('EBULKSMS_API'),
    'username' => env('EBULKSMS_USERNAME'),
    'sender' => env('EBULKSMS_SENDER_ID'),
    'flash' => '0',
    'dndsender' => env('EBULKSMS_DND', 1),
];