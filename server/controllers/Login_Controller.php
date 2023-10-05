<?php

class Login_Controller extends Controller
{
    public function __construct($_params) {
        $this->params = $_params;
    }


    /**
     * Validates the user login credentials
     * Required params: username, password
     */
    function validateUserLogin()
    {
        global $ERROR_CODES, $Errors, $Session;

        // Check required params
        $requiredParams = [
            'username' => [
                'ERROR' => $ERROR_CODES['MISSING_REQUEST_PARAMS']['USERNAME'],
            ],
            'password' => [
                'ERROR' => $ERROR_CODES['MISSING_REQUEST_PARAMS']['PASSWORD'],
            ],
        ];
        foreach ($requiredParams as $key => $value) {
            if (empty($this->params[$key])) {
                $this->errors[] = $Errors->setErrorData($value['ERROR'])->setErrorVariable('')->setErrorDetails("Missing param: {$key}")->gen();
                $this->state = false;
                return $this;
            }
        }

        // Get data by given username
        $this->setModel('Users_Model');
        $filter = [
            'username' => $this->params['username'],
        ];
        $userData = $this->model->filter($filter);

        // If no user found by given username
        if (empty($userData)) {
            $this->errors[] = $Errors->setErrorData($ERROR_CODES['AUTH']['NO_USER_FOUND_BY_GIVEN_USERNAME'])->setErrorVariable('')->setErrorDetails("No user found in database by given username: {$this->params['username']}")->gen();
            $this->state = false;
            return $this;
        }
        else {
            // Validate password
            $hashedPassword = $userData[0]['password'];
            if (!password_verify($this->params['password'], $hashedPassword)) {
                $this->errors[] = $Errors->setErrorData($ERROR_CODES['AUTH']['WRONG_PASSWORD'])->setErrorVariable('')->setErrorDetails("Wrong password for given username: {$this->params['username']}")->gen();
                $this->state = false;
                return $this;
            }
        }

        // Set login session
        $Session->setLogged(true);
        $Session->setLoggedUserId($userData[0]['id']);

        $this->state = true;
        return $this;
    }
}
