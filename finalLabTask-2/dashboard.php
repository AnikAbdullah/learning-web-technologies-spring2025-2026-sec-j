<?php
include("session.php");

if (isset($_COOKIE['status'])) {
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        header('location: login.php');
    }
} else {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>

<div class="main">

    <div class="top">
        <div class="logo">XCompany</div>
        <div class="menu">
            Logged in as <a href="dashboard.php"><?php echo $username; ?></a> |
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
            <h3>Welcome <?php echo $username; ?>!</h3>
        </div>
    </div>

    <div class="footer">
        Copyright &copy; 2017
    </div>

</div>

</body>
</html>