<?php

const ERRORS = [

];

const CONST_FATAL_ERRORS = [
    'CATCH_FATAL_ERRORS' => true, // if to catch fatal errors and return error code instead of printing it
    'OB_CLEAN_ON_FATAL' => false, // whenever to use ob_end_clean() after catching fatal
    'EMAIL_ADMINS_ON_FATAL' => [
        'ENABLED' => false, // main switch for sending fatal emails - turning it off won't send anything
        'SEND_IN_DEV_ENV' => false, // send fatal emails in development environment
        'SEND_IN_PROD_ENV' => false, // send fatal emails in production environment
        'EMAILS' => ['admin@domain.com']
    ],
];
