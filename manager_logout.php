<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Destroy all session variables
$_SESSION = array();
session_destroy();

// Redirect to the manager login page
header("Location: manager_login.php");
exit();
?>
