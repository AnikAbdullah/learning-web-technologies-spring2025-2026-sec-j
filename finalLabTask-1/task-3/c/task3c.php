<?php
if (isset($_POST['dd']) && isset($_POST['mm']) && isset($_POST['yyyy'])) {
    $dd = $_POST['dd'];
    $mm = $_POST['mm'];
    $yyyy = $_POST['yyyy'];
    echo "<p>Your date of birth is: " . $dd . "/" . $mm . "/" . $yyyy . "</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task 3 - c</title>
</head>
<body>

<form action="" method="post">
    <fieldset>
        <legend><h4>Date of birth</h4></legend>
        
        <label for="dd">dd</label>
        <input type="text" name="dd" size="2" maxlength="2" value="<?php echo $dd; ?>"/> 
        
        <label for="mm">mm</label>
        <input type="text" name="mm" size="2" maxlength="2" value="<?php echo $mm; ?>"/> /
        
        <label for="yyyy">yyyy</label>
        <input type="text" name="yyyy" size="4" maxlength="4" value="<?php echo $yyyy; ?>" />
        
        <hr />
        <input type="submit" value="Submit" />
    </fieldset>
</form>

</body>
</html>