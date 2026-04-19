<?php
include("session.php");

if (!isset($_COOKIE['status'])) {
    header('location: login.php');
    exit();
}

if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}

$username = $_SESSION['username'];
$user = $_SESSION['users'][$username];
$msg = "";

if (isset($_POST['submit'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $retypePassword = $_POST['retypePassword'];

    if ($currentPassword != "" && $newPassword != "" && $retypePassword != "") {
        if ($user['password'] == $currentPassword) {
            if ($newPassword == $retypePassword) {
                $_SESSION['users'][$username]['password'] = $newPassword;
                $user = $_SESSION['users'][$username];
                $msg = "Password changed";
            } else {
                $msg = "New password and retype password do not match";
            }
        } else {
            $msg = "Current password is wrong";
        }
    } else {
        $msg = "Please fill all fields";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>

<div class="main">

    <div class="top">
        <div class="logo">XCompany</div>
        <div class="menu">
            Logged in as <a href="viewProfile.php"><?php echo $username; ?></a> |
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div>
        <div class="left">
            <b>Account</b>
            <hr>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="viewProfile.php">View Profile</a></li>
                <li><a href="editProfile.php">Edit Profile</a></li>
                <li><a href="changeProfilePicture.php">Change Profile Picture</a></li>
                <li><a href="changePassword.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="right">
            <form method="post">
                <fieldset>
                    <legend><h3>CHANGE PASSWORD</h3></legend>

                    Current Password<br>
                    <input type="password" name="currentPassword">
                    <hr>

                    New Password<br>
                    <input type="password" name="newPassword">
                    <hr>

                    Retype New Password<br>
                    <input type="password" name="retypePassword">
                    <hr>

                    <input type="submit" name="submit" value="Submit">

                    <br><br>
                    <?php echo $msg; ?>
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