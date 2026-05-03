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

<form method="post" action="loginCheck.php" onsubmit="makeJson()">

    <fieldset>
        <legend>Login</legend>

        User Name<br>
        <input type="text" id="username"><br><br>

        Password<br>
        <input type="password" id="password"><br><br>

        <input type="hidden" name="data" id="data">

        <input type="submit" value="Login">

        <a href="registration.php">Registration</a>
    </fieldset>

</form>

<script>
function makeJson() {
    let user = {
        username: document.getElementById('username').value,
        password: document.getElementById('password').value
    };

    document.getElementById('data').value = JSON.stringify(user);
}
</script>

</body>
</html>