<?php

class Application
{
    private $controller;
    private string $method;
    public array $errors = array();
    public bool $state = false;
    public array $data = [];

    /**
     * @param string $_controllerName E.g. session_controller
     * @param string $_method E.g. clearSessions
     * @param array $_params E.g. {'id': 0}
     */
    function __construct($_controllerName, $_method, $_params)
    {
        global $CONSTANTS, $Errors, $ERROR_CODES;

        if (is_null($_params)) {
            $_params = [];
        }

        $controllerFilePath = CONTROLLERS_ROUTE . '/' . $_controllerName . ".php"; // E.g. /MyProject/server/controllers/Cars_Controller.php

        // check if system controller and its file exists
        if (in_array($_controllerName, $CONSTANTS['SYS_CONTROLLERS']) && file_exists($controllerFilePath)) {
            require_once $controllerFilePath;
            $this->controller = new $_controllerName($_params);


            if (method_exists($this->controller, $_method)) {
                $this->method = $_method;
            }
            else {
                // generate error
                $this->errors[] = $Errors->setErrorData($ERROR_CODES['APPLICATION']['METHOD']['NOT_FOUND'])->setErrorVariable($_method)->setErrorDetails('Method does not exists')->gen();
            }
        }
        else {
            // generate error
            $this->errors[] = $Errors->setErrorData($ERROR_CODES['APPLICATION']['CONTROLLER']['NOT_FOUND'])->setErrorVariable($_controllerName)->setErrorDetails('Controller does not exists')->gen();
        }
    }

    public function execute()
    {
        if (empty($this->errors)) {
            $method = $this->method;
            $this->controller->$method();

            // check controller errors
            if (!empty($this->controller->errors)) {
                // get errors from controller
                $this->errors = $this->controller->errors;
            }

            // get state from controller
            $this->state = $this->controller->state;

            // get data from controller
            $this->data = $this->controller->data;
        }

        return array(
            "data" => $this->data,
            "state" => $this->state,
            'errors' => $this->errors,
        );
    }
}
