<?php
ini_set('display_errors', 0);

if (!isset($_SESSION)) {
    $lifetime=36000;
    session_set_cookie_params($lifetime);
    session_start();
}

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'butchery';
$db_port = 3306;

// online DB config
//$db_user = 'u784869084_HomeRepairsUSR';
//$db_pass = 'p3xH9b&N~5';
//$db_name = 'u784869084_HomeRepairsDB';

// Try and connect using the info above.
try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
}
catch (Exception $e) {
    echo 'Failed to connect to MySql';
    echo '<pre>';
    print_r($e);
    echo '</pre>';
}
