<?php

session_start();

class Session
{
    private string $sessionName = '';

    public function __construct() {
        global $CONSTANTS;

        // Set session prefix
        $this->sessionName = $CONSTANTS['APP_NAME'] . '_SESSION_';
    }

    public function setLogged(bool $_isLogged): void
    {
        $_SESSION[$this->sessionName . 'IS_LOGGED'] = $_isLogged;
    }

    /**
     * Sets the logged user ID in the session.
     *
     * @param int $userId The user ID.
     * @return void
     */
    public function setLoggedUserId(int $userId): void
    {
        // Store the user ID in the session
        $_SESSION[$this->sessionName . 'LOGGED_USER_ID'] = $userId;
    }

    /**
     * Retrieves the logged user ID from the session.
     *
     * @return int The logged user ID.
     */
    public function getLoggedUserId(): int
    {
        // Retrieve the logged user ID from the session
        return $_SESSION[$this->sessionName . 'LOGGED_USER_ID'];
    }

    public function isLogged(): bool
    {
        return isset($_SESSION[$this->sessionName . 'IS_LOGGED']) && $_SESSION[$this->sessionName . 'IS_LOGGED'] === true;
    }

    public function destroy(): void
    {
        // Destroy the session
        session_destroy();
    }
}
