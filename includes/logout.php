<?php 
    session_start();
    session_unset();
    session_destroy();
    if (isset($_COOKIE['username'])) {
        setcookie('username', '', time() - 3600, "/"); // Remove 'username' cookie
    }
    if (isset($_COOKIE['password'])) { // Remove password cookie (if used, not recommended)
        setcookie('password', '', time() - 3600, "/"); 
    }    
    header('Location: ../index.php');
    exit();
?>