<?php
include("session.php");

$msg = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $dob = $day . "/" . $month . "/" . $year;

    $_SESSION['users'][$username] = [
        "name" => $name,
        "email" => $email,
        "username" => $username,
        "password" => $password,
        "gender" => $gender,
        "dob" => $dob,
        "picture" => ""
    ];

    $msg = "Registration completed";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
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
                    <legend>REGISTRATION</legend>

                    Name<br>
                    <input type="text" name="name">
                    <hr>

                    Email<br>
                    <input type="text" name="email">
                    <hr>

                    User Name<br>
                    <input type="text" name="username">
                    <hr>

                    Password<br>
                    <input type="password" name="password">
                    <hr>

                    Confirm Password<br>
                    <input type="password" name="confirm">
                    <hr>

                    <fieldset>
                        <legend>Gender</legend>
                        <input type="radio" name="gender" value="Male"> Male
                        <input type="radio" name="gender" value="Female"> Female
                        <input type="radio" name="gender" value="Other"> Other
                    </fieldset>

                    <br>

                    <fieldset>
                        <legend>Date of Birth</legend>
                        <input type="text" name="day" size="2"> /
                        <input type="text" name="month" size="2"> /
                        <input type="text" name="year" size="4">
                        <span>(dd/mm/yyyy)</span>
                    </fieldset>

                    <br>

                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" value="Reset">

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