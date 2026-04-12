<?php
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    echo "<p>Your gender is: " . $gender . "</p>";
} else {
?>

<!doctype html>
<html>
  <head>
    <title>Task 4 - a</title>
  </head>
  <body>
    <form action="" method="post">
      <fieldset>
        <legend><b>Gender</b></legend>
        <input type="radio" name="gender" id="male" value="Male" />
        <label for="male">Male</label>
        <input type="radio" name="gender" id="female" value="Female" />
        <label for="female">Female</label>
        <input type="radio" name="gender" id="other" value="Other" />
        <label for="other">Other</label>
        <br /><br />
      </fieldset>

      <input type="submit" value="Submit" />
    </form>
  </body>
</html>

<?php
}
?>