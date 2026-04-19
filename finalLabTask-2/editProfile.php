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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    if ($name != "" && $email != "" && $gender != "" && $day != "" && $month != "" && $year != "") {
        $dob = $day . "/" . $month . "/" . $year;

        $_SESSION['users'][$username]['name'] = $name;
        $_SESSION['users'][$username]['email'] = $email;
        $_SESSION['users'][$username]['gender'] = $gender;
        $_SESSION['users'][$username]['dob'] = $dob;

        $user = $_SESSION['users'][$username];
        $msg = "Profile updated";
    } else {
        $msg = "Please fill all fields";
    }
}

$dobParts = explode("/", $user['dob']);
$day = isset($dobParts[0]) ? $dobParts[0] : "";
$month = isset($dobParts[1]) ? $dobParts[1] : "";
$year = isset($dobParts[2]) ? $dobParts[2] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
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
                    <legend><h3>EDIT PROFILE</h3></legend>

                    Name<br>
                    <input type="text" name="name" value="<?php echo $user['name']; ?>">
                    <hr>

                    Email<br>
                    <input type="text" name="email" value="<?php echo $user['email']; ?>">
                    <hr>

                    Gender<br><br>
                    <input type="radio" name="gender" value="Male" <?php if ($user['gender'] == "Male") echo "checked"; ?>> Male
                    <input type="radio" name="gender" value="Female" <?php if ($user['gender'] == "Female") echo "checked"; ?>> Female
                    <input type="radio" name="gender" value="Other" <?php if ($user['gender'] == "Other") echo "checked"; ?>> Other
                    <hr>

                    Date of Birth<br><br>
                    <input type="text" name="day" size="2" value="<?php echo $day; ?>"> /
                    <input type="text" name="month" size="2" value="<?php echo $month; ?>"> /
                    <input type="text" name="year" size="4" value="<?php echo $year; ?>">
                    <span>(dd/mm/yyyy)</span>
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