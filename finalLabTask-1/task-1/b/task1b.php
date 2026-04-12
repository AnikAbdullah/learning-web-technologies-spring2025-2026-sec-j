<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    echo "<p>Your name is: <b>" . $name . "</b></p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task 1 - b</title>
</head>
<body>

<form action="" method="post">
    <fieldset>
        <legend><b>NAME</b></legend>
        <input type="text" name="name">
        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

</body>
</html>
