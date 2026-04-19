<?php
include("session.php");

$username = "";

if (isset($_COOKIE['status'])) {
    if (isset($_COOKIE['remember_user'])) {
        $username = $_COOKIE['remember_user'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>

<div class="main">

    <div class="top">
        <div class="logo">XCompany</div>
        <div class="menu">
            <a href="index.php">Home</a> |
            <a href="login.php">Login</a> |
            <a href="registration.php">Registration</a>
        </div>
    </div>

    <div class="body">
        <div class="form-area">
            <form method="post" action="loginCheck.php">
                <fieldset>
                    <legend>LOGIN</legend>

                    User Name<br>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                    <hr>

                    Password<br>
                    <input type="password" name="password">
                    <hr>

                    <input type="checkbox" name="remember"> Remember Me
                    <br><br>

                    <input type="submit" name="submit" value="Submit">
                    <a href="forgot_password.php">Forgot Password?</a>
                </fieldset>
            </form>
        </div>
    </div>

    <div class="footer">
        Copyright &copy; 2017
    </div>

</div>

</body>
</html>