<?php

ini_set('display_errors', 1);

require_once "./config/CONSTANTS.php";

$isProduction = false;

$BASE_URL = $CONSTANTS['BASE_PATHS']['DEVELOPMENT'];
if ($isProduction) $BASE_URL = $CONSTANTS['BASE_PATHS']['PRODUCTION'];

require_once $BASE_URL . "/server/config/routes.php";
require_once $BASE_URL . "/server/config/ERROR_CODES.php";

require_once CONFIG_ROUTE."/db-config.php";
require_once CONFIG_ROUTE."/ERRORS.php";
require_once CONFIG_ROUTE."/SECRETS.php";

require_once CLASSES_ROUTE.'/Application.php';
require_once CLASSES_ROUTE."/Response.php";
require_once CLASSES_ROUTE."/Session.php";
require_once CLASSES_ROUTE."/errors/Errors.php";
require_once CLASSES_ROUTE.'/errors/FatalErrors.php';
require_once CLASSES_ROUTE.'/errors/DBErrors.php';
require_once CLASSES_ROUTE.'/DB.php';

require_once CONTROLLERS_ROUTE."/Controller.php";

require_once MODELS_ROUTE."/Model.php";

// catch fatal errors if enabled
if (CONST_FATAL_ERRORS['CATCH_FATAL_ERRORS']) {
    $errorHandler = new FatalErrors();
    $errorHandler->register();
}

$response = new Response();
$Errors = new Errors();
$DBErrors = new DBErrors();
$Session = new Session();

$app = new Application($_REQUEST['controller'], $_REQUEST['method'], $_REQUEST['params']);
$result = $app->execute();

echo $response->setState($result['state'])->setData($result['data'])->setErrors($result['errors'])->renderToEncode();
