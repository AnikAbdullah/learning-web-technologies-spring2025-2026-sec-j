<?php
include('session.php');

if (isset($_SESSION['status']) && $_SESSION['status'] == true) {
    header('location: dashboard.php');
    exit();
}
?>

<html>
<head>
    <title>Login</title>
</head>
<body>

<h3>LOGIN</h3>

<form method="post" action="loginCheck.php">
    <fieldset>
        <legend>Login</legend>

        User Name<br>
        <input type="text" name="username"><br><br>

        Password<br>
        <input type="password" name="password"><br><br>

        <input type="submit" name="submit" value="Login">
        <a href="registration.php">Registration</a>
    </fieldset>
</form>

</body>
</html>