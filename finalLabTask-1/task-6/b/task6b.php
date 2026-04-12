<?php
if (isset($_POST['blood_group'])) {
    $blood_group = $_POST['blood_group'];
    echo "<p>Your selected blood group is: " . $blood_group . "</p>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Task 6 - b</title>
  </head>
  <body>
    <form action="" method="post">
      <fieldset>
        <legend><b>Blood Group</b></legend>
        
        <label for="blood_group">Blood Group</label>
        <select name="blood_group" id="blood_group">
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="O+">O+</option>
        </select>
        
        <br><br>
        <input type="submit" value="Submit" />
      </fieldset>
    </form>
  </body>
</html>
