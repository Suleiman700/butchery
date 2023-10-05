<?php
class Controller
{
    public $model;
    public array $errors = [];
    public array $data = [];
    public bool $state = false;

    protected array $params = [];

    public function __construct($_model)
    {
        $this->setModel($_model);
    }

    function setModel($_modelClassName): void
    {
        global $CONSTANTS, $Errors, $ERROR_CODES;

        $modelFile = MODELS_ROUTE.'/'.$_modelClassName.".php";

        // check if model file exists
        if (file_exists($modelFile)) {
            require_once $modelFile;

            $this->model = new $_modelClassName();
        }
        else
        {
            $this->errors[] = $Errors->setErrorData($ERROR_CODES['APPLICATION']['MODEL']['NOT_FOUND'])->setErrorVariable('model')->setErrorDetails('Model does not exists')->gen();
        }
    }
}
?>
