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
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Profile</title>
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
                <li><a href="view_profile.php">View Profile</a></li>
                <li><a href="edit_profile.php">Edit Profile</a></li>
                <li><a href="change_picture.php">Change Profile Picture</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="right">
            <h3>PROFILE</h3>
            <hr>

            <div class="profile-info">
                Name : <?php echo $user['name']; ?>
                <hr>

                Email : <?php echo $user['email']; ?>
                <hr>

                Gender : <?php echo $user['gender']; ?>
                <hr>

                Date of Birth : <?php echo $user['dob']; ?>
                <hr>

                <a href="edit_profile.php">Edit Profile</a>
            </div>

            <div class="profile-pic-box">
                <?php
                if ($user['picture'] != "") {
                    echo '<img src="'.$user['picture'].'" alt="Profile Picture">';
                } else {
                    echo '<img src="uploads/default.png" alt="Profile Picture">';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        Copyright &copy; 2017
    </div>

</div>

</body>
</html>