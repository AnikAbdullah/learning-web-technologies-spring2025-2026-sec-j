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

    if ($_FILES['picture']['name'] != "") {

        $fileName = time() . "_" . $_FILES['picture']['name'];
        $path = "uploads/" . $fileName;

        move_uploaded_file($_FILES['picture']['tmp_name'], $path);

        $_SESSION['users'][$username]['picture'] = $path;
        $user = $_SESSION['users'][$username];

        $msg = "Picture updated";

    } else {
        $msg = "Select a picture";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Profile Picture</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>

<div class="main">

    <div class="top">
        <div class="logo">XCompany</div>
        <div class="menu">
            Logged in as <a href="changeProfilePicture.php"><?php echo $username; ?></a> |
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
                <li><a href="changePicture.php">Change Profile Picture</a></li>
                <li><a href="changePassword.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="right">
            <form method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>PROFILE PICTURE</legend>

                    <br>

                    <div style="width: 150px; border: 1px solid black; padding: 10px; text-align: center;">
                        <?php
                        if ($user['picture'] != "") {
                            echo '<img src="'.$user['picture'].'" width="120" height="120">';
                        } else {
                            echo 'No Picture';
                        }
                        ?>
                    </div>

                    <br><br>

                    <input type="file" name="picture">

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