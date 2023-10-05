<?php

$CONSTANTS = [
    'APP_NAME' => 'Butchery',
    'IS_PROD' => false,
    'DEBUG' => false,
    'BASE_PATHS' => [
        'DEVELOPMENT' => $_SERVER['DOCUMENT_ROOT'].'/butchery', // (DON'T add `/` in the end, Example: www.domain.com/MyApp)
        'PRODUCTION' => $_SERVER['DOCUMENT_ROOT'].'/projects/butchery', // (DON'T add `/` in the end, Example: www.domain.com/MyApp)
    ],
    'SYS_CONTROLLERS' => [
        'Login_Controller',
    ],
    'SYS_MODELS' => [
        'Users_Model',
    ],
];
