<?php session_start(); 

// If user isn;t logged in and the current web page isnt the login page redirect to the login page
if (!isset($_SESSION['Active']) && basename($_SERVER['PHP_SELF']) !== 'login.php' && basename($_SERVER['PHP_SELF']) !== 'signup.php') {
    header("Location: login.php");
    exit;
}

?>
