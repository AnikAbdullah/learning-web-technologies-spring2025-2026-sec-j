<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    echo "<p>Your email is: " . $email . "</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task 2 - c</title>
</head>
<body>

<form action="" method="post">
    <fieldset>
        <legend><b>EMAIL</b></legend>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

</body>
</html>
