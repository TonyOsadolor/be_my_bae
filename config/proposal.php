<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Proposal Configuration
    |--------------------------------------------------------------------------
    |
    | This file is for storing the configuration for proposals.
    |
    */
    
    /**
     * The names of the people to whom proposals will be sent.
     */
    'names' => env('PROPOSAL_NAMES', 'Alice Darwin, Bob Smith, Charlie Johnson'),

    /**
     * The message to be sent to each person.
     */
    'message' => env('PROPOSAL_MESSAGE', null),

    /**
     * The welcome message to be sent to each person.
     */
    'welcome_message' => env('PROPOSAL_WELCOME_MESSAGE', null),

    /**
     * The full name of the host.
     */
    'host_full_name' => env('PROPOSAL_HOST_FULL_NAME', 'Brown Bear'),

    /**
     * The email address of the host.
     */
    'host_email' => env('PROPOSAL_HOST_EMAIL', 'brown.bear@example.com'),

];
