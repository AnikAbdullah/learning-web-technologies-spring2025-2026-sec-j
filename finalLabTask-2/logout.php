<?php
include("session.php");

unset($_SESSION['status']);
unset($_SESSION['username']);
unset($_SESSION['current_user']);

setcookie('status', '', time()-3000, '/');
setcookie('remember_user', '', time()-3000, '/');

header('location: login.php');
?>