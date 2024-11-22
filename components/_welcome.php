<?php
session_start();

// Default title
$title = "Welcome";

// Change title based on user type
if (isset($_SESSION['role'])) {
    if ($_SESSION['userid'] == 'admin') {
        $title = "Admin Dashboard";
    } elseif ($_SESSION['userid'] == $username) {
        $title = "User Dashboard";
    }
}
?>