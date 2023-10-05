<?php

class Errors
{
    public string $traceId;
    public array $errorData;
    public string $errorVariable; // the variable that found error in
    public $errorDetails;

    private string $logFilePath = '/server/logs/errors.txt';

    public function __construct() {
        global $BASE_URL;

        // create .txt logging file if not found
        $logDirectory = dirname($BASE_URL.$this->logFilePath);
        if (!file_exists($logDirectory)) {
            if (!mkdir($logDirectory, 0777, true) && !is_dir($logDirectory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $logDirectory));
            }
        }

        if (!file_exists($BASE_URL.$this->logFilePath)) {
            $errorFile = fopen($BASE_URL.$this->logFilePath, 'w');
            fclose($errorFile);
            chmod($BASE_URL.$this->logFilePath, 0777);
        }
    }

    /**
     * set error data
     * @param array $_errorText E.g. ["NAME" => "", "CODE" => ""]
     * @return $this
     */
    public function setErrorData(array $_errorData): Errors
    {
        $this->errorData = $_errorData;
        return $this;
    }

    public function setErrorVariable($_errorVariable): Errors
    {
        $this->errorVariable = $_errorVariable;
        return $this;
    }

    /**
     * set error details
     * @param array $_errorDetails E.g. error happened because xyz...etc
     * @return $this
     */
    public function setErrorDetails($_errorDetails): Errors
    {
        $this->errorDetails = $_errorDetails;
        return $this;
    }

    /**
     * generate error array
     * @return array
     */
    public function gen(): array
    {
        $this->traceId = round(microtime(true)*1000);

        $errorArray = [
            'errorText' => $this->errorData["HE_NAME"],
            'errorCode' => $this->errorData["CODE"],
            'errorTraceId' => $this->traceId
        ];

        // check if errorVariable contains data and push it to the error array
        if (!empty($this->errorVariable)) {
            $errorArray['errorVariable'] = $this->errorVariable;
        }

        $this->saveError();

        return $errorArray;
    }

    public function saveError(): void
    {
        global $BASE_URL;
        $errorLoggingFile = $BASE_URL.$this->logFilePath;

        // write error message
        $logMessage = "\n--------------- Error -------------\n";
        $logMessage .= "Trace ID: $this->traceId\n";
        $logMessage .= 'Date: '. date('d/m/Y H:i:s') ."\n";
        $logMessage .= 'Error text:'.$this->errorData['NAME']."\n";
        if (!empty($this->errorCode)) $logMessage .= 'Error code:'.$this->errorData['CODE']."\n";
        $logMessage .= 'Request type: ' . $_SERVER['REQUEST_METHOD'] . "\n";
        $logMessage .= json_encode($_REQUEST, JSON_THROW_ON_ERROR) . "\n";
        $logMessage .= "Error:\n";
        if (!empty($this->errorVariable)) $logMessage .= "Variable: $this->errorVariable\n";
        if (!empty($this->errorDetails)) $logMessage .= 'details: ' . json_encode($this->errorDetails) . "\n";
        $logMessage .= "-----------------------------------\n";

        $error_file = fopen($errorLoggingFile, "a");
        fwrite($error_file, $logMessage);
        fclose($error_file);
    }
}
