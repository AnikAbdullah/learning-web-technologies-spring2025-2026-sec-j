<?php
include("session.php");

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $password && $username != "") {

        $_SESSION['status'] = true;
        $_SESSION['username'] = $username;

        header("Location: productDashboard.php");
        exit();

    } else {
        echo "Invalid login! Username and password must match.";
    }

} else {
    echo "Please submit form.";
}
?>