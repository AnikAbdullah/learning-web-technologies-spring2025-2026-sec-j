<?php
include("session.php");

if (isset($_REQUEST['submit'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    if (isset($_SESSION['users'][$username])) {
        if ($_SESSION['users'][$username]['password'] == $password) {

            $_SESSION['status'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['current_user'] = $username;

            setcookie('status', 'true', time()+3000, '/');

            if (isset($_REQUEST['remember'])) {
                setcookie('remember_user', $username, time()+3000, '/');
            }

            header('location: dashboard.php');
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Invalid user!";
    }
} else {
    echo "please submit form...";
}
?>