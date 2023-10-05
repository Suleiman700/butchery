<?php

class DBErrors
{
    public string $traceID;
    public array $errors;
    private string $logFilePath = '/server/logs/db_errors.txt';

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

    public function saveError(): void
    {
        global $BASE_URL;
        $errorLoggingFile = $BASE_URL.$this->logFilePath;

        // write error message
        $logMessage = "\n--------------- Error -------------\n";
        $logMessage .= "Trace ID: $this->traceID\n";
        $logMessage .= 'Date: '. date('d/m/Y H:i:s') ."\n";
        $logMessage .= 'details: ' . json_encode($this->errors) . "\n";
        $logMessage .= "-----------------------------------\n";

        $error_file = fopen($errorLoggingFile, "a");
        fwrite($error_file, $logMessage);
        fclose($error_file);
    }
}
