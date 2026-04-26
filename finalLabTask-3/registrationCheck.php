<?php
include('session.php');

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if ($username != "" && $password != "" && $email != "") {

        if (!isset($_SESSION['users'][$username])) {

            $_SESSION['users'][$username] = array(
                'username' => $username,
                'password' => $password,
                'email' => $email
            );

            header('location: login.php');
            exit();

        } else {

            header('location: registration.php');
            exit();
        }

    } else {
        header('location: registration.php');
        exit();
    }

} else {
    header('location: registration.php');
    exit();
}
?>