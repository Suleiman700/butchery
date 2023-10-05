<?php

// Redirect to log in if already not logged-in
$Session = new Session();
if (!$Session->isLogged()) {
    header('Location: ../login/index.php');
    die;
}
