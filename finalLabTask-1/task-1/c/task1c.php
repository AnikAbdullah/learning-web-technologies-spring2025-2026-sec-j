<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    echo "<p>Your name is: " . $name . "</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task 1 - c</title>
</head>
<body>

<form action="" method="post">
    <fieldset>
        <legend><b>NAME</b></legend>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

</body>
</html>
