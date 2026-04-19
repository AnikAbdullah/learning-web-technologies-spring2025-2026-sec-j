<?php
include("session.php");

$msg = "";
$username = "";

if (isset($_COOKIE['user_session'])) {
    $username = $_COOKIE['user_session'];
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_SESSION['users'][$username])) {
        if ($_SESSION['users'][$username]['password'] == $password) {
            $_SESSION['current_user'] = $username;

            if (isset($_POST['remember'])) {
                setcookie("user_session", $username, time() + 3600, "/");
            } else {
                setcookie("user_session", "", time() - 3600, "/");
            }

            header("Location: dashboard.php");
            exit();
        } else {
            $msg = "Invalid password";
        }
    } else {
        $msg = "Invalid username";
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
            <form method="post">
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

                    <div class="form-msg">
                        <?php echo $msg; ?>
                    </div>
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