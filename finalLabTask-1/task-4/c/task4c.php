<?php
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    echo "<p>Your gender is: " . $gender . "</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task 4 - c</title>
</head>
<body>

<form action="" method="post">
    <fieldset>
        <legend><b>Gender</b></legend>
        
        <input type="radio" name="gender" id="male" value="Male" <?php if (isset($gender) && $gender == "Male") echo "checked"; ?> />
        <label for="male">Male</label>

        <input type="radio" name="gender" id="female" value="Female" <?php if (isset($gender) && $gender == "Female") echo "checked"; ?> />
        <label for="female">Female</label>

        <input type="radio" name="gender" id="other" value="Other" <?php if (isset($gender) && $gender == "Other") echo "checked"; ?> />
        <label for="other">Other</label>

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

</body>
</html>