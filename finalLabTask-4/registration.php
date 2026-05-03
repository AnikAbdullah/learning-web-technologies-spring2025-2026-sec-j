<?php
include('session.php');
?>

<html>
<head>
    <title>Registration</title>
</head>
<body>

<h3>REGISTRATION</h3>

<form method="post" action="registrationCheck.php">
    <fieldset>
        <legend>Registration</legend>

        User Name<br>
        <input type="text" name="username"><br><br>

        Email<br>
        <input type="email" name="email"><br><br>

        Password<br>
        <input type="password" name="password"><br><br>

        <input type="submit" name="submit" value="Register">
        <a href="login.php">Login</a>
    </fieldset>
</form>

</body>
</html>