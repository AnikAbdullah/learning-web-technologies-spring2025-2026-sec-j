<?php include("session.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Product Management Login</h2>

<form method="post" action="loginCheck.php">
    <fieldset>
        <legend>LOGIN</legend>

        User Name<br>
        <input type="text" name="username"><br><br>

        Password<br>
        <input type="password" name="password"><br><br>

        <input type="submit" name="submit" value="Login">
    </fieldset>
</form>

<br>

</body>
</html>