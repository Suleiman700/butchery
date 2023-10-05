<?php

$ERROR_CODES = [
    'AUTH' => [
        'NO_USER_FOUND_BY_GIVEN_USERNAME' => [
            "NAME" => "Wrong username or password",
            "HE_NAME" => "שם משתמש או סיסמה שגויים",
            "CODE" => "AW.1001",
            "CAUSE" => "No user found by given username.",
            "FIX" => "Check if username exists in database.",
        ],
        'WRONG_PASSWORD' => [
            "NAME" => "Wrong username or password",
            "HE_NAME" => "שם משתמש או סיסמה שגויים",
            "CODE" => "AW.1002",
            "CAUSE" => "Wrong password for given username.",
            "FIX" => "Check if given password matches user hashed password.",
        ]
    ],
    'MISSING_REQUEST_PARAMS' => [
        'USERNAME' => [
            "NAME" => "Missing username Parameter",
            "HE_NAME" => "חסר שם משתמש",
            "CODE" => "MU.1001",
            "CAUSE" => "Found out that param is missing from the request.",
            "FIX" => "Make sure that the param exists in the request data.",
        ],
        'PASSWORD' => [
            "NAME" => "Missing password Parameter",
            "HE_NAME" => "חסר סיסמה",
            "CODE" => "MP.1002",
            "CAUSE" => "Found out that param is missing from the request.",
            "FIX" => "Make sure that the param exists in the request data.",
        ],
    ],
];
