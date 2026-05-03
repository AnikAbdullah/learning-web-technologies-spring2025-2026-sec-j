<?php

include('session.php');

$user = json_decode($_POST['data'], true);

$username = $user['username'];
$password = $user['password'];

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

?>