<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: test-login.php"); // Redirect if not logged in
    exit;
}

// Allow only admins on this page
if ($_SESSION['role'] != 'admin') {
    header("location: test-dataform.php"); // Redirect normal users to the user page
    exit;
}
?>