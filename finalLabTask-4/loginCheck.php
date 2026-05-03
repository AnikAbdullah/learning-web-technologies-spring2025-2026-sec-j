<?php
include('session.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (
        isset($_SESSION['users'][$username]) &&
        $_SESSION['users'][$username]['password'] == $password
    ) {
        $_SESSION['status'] = true;
        $_SESSION['username'] = $username;

        header('location: dashboard.php');
        exit();
    } else {
        header('location: login.php');
        exit();
    }
} else {
    header('location: login.php');
    exit();
}
?>