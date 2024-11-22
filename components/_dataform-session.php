<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: test-login.php"); // Redirect if not logged in
    exit;
}
?>